#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/time.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <stdio.h>
#include <string.h>

int getRunTime(struct timeval, struct timeval);
void generatePrivateKey(char*);
void generatePublicKey(char*);
int signOrVerify(char*, char*, char*, char*, int);

int main() {
	remove("rsapublickey1024.pem");
	remove("rsapublickey2048.pem");

 	generatePrivateKey("rsaprivatekey1024.pem");
 	generatePrivateKey("rsaprivatekey2048.pem");
 	generatePublicKey("rsaprivatekey1024.pem");
 	generatePublicKey("rsaprivatekey2048.pem");

	/* sign with sha1 + privatekey1024 */

 	printf("Signing RSA1024 SHA1...");
	signOrVerify("repository", "1024SHA1", "sha1", "rsaprivatekey1024.pem", 0);

	printf("Verifying RSA1024 SHA1...");
	/* verify with sha1 + publickey1024 */
	signOrVerify("repository", "1024SHA1", "sha1", "rsapublickey1024.pem", 1);

	printf("Signing RSA1024 SHA256...");
	/* sign with sha256 + privatekey1024 */
	signOrVerify("repository", "1024SHA256", "sha256", "rsaprivatekey1024.pem", 0);

	printf("Verifying RSA1024 SHA256...");
	/* verify with sha256 + publickey1024 */
	signOrVerify("repository", "1024SHA256", "sha256", "rsapublickey1024.pem", 1);

	printf("Signing RSA2048 SHA1...");
	/* sign with sha1 + publickey2048 */
	signOrVerify("repository", "2048SHA1", "sha1", "rsaprivatekey2048.pem", 0);

	printf("Verifying RSA2048 SHA1...");
	/* verify with sha1 + publickey2048 */
	signOrVerify("repository", "2048SHA1", "sha1", "rsapublickey2048.pem", 1);
	 
	printf("Signing RSA2048 SHA256...");
	/* sign with sha256 + publickey2048 */
	signOrVerify("repository", "2048SHA256", "sha256", "rsaprivatekey2048.pem", 0);

	printf("Verifying RSA2048 SHA256...");
	/* verify with sha256 + publickey2048 */
	signOrVerify("repository", "2048SHA256", "sha256", "rsapublickey2048.pem", 1);

	exit(0);
}

int getRunTime(struct timeval t1, struct timeval t2) {
 	int runTime = ((t2.tv_usec + 1000000 * t2.tv_sec) - (t1.tv_usec + 1000000 * t1.tv_sec));
 	return runTime;
}

void generatePrivateKey(char* key) {
 	pid_t pid;
 	if((pid = fork()) < 0) {
 		perror("fork error");
 		exit(1);
 	}

 	if(pid == 0) {
 		if (execlp("openssl", "openssl", "genrsa", "-out", key, "1024", (char *)0) < 0) {
 			perror("execlp error");
 			exit(1);
 		}
 	}

 	if(waitpid(pid, NULL, 0) < 0) {
		perror("wait error");
		exit(1);
	}
}

void generatePublicKey(char* key) {
	char *publicKey;
	pid_t pid;
	int fd;
	if(strcmp(key, "rsaprivatekey1024.pem") == 0) {
		publicKey = "rsapublickey1024.pem";
	}
	if(strcmp(key, "rsaprivatekey2048.pem") == 0) {
		publicKey = "rsapublickey2048.pem";
	}
	
	if((pid = fork()) < 0) {
		perror("fork error");
 		exit(1);
	}
	
	if(pid == 0) {
 		if((fd = open(publicKey, O_WRONLY | O_CREAT | O_TRUNC)) == -1) {
			perror("open");
			exit(1);
		}
	
		dup2(fd,STDOUT_FILENO);
		dup2(fd,STDERR_FILENO);
		close(fd);
		if(execlp("openssl", "openssl", "rsa", "-in", key, "-pubout", (char *)0) < 0) {
			perror("execlp error");
			exit(1);
		}
	}
	
	if(waitpid(pid, NULL, 0) < 0) {
		perror("wait error");
		exit(1);
	}
}

/**
 * Feature : Sign or verify the file
 * Param #1: The dir where contains all the original files (msg.1 ..)
 * Param #2: The dir where contains all the signed files (cipher.1 ..)
 * Param #3: The hash function. SHA1 or SHA256
 * Param #4: The private key for sign or the public key for verify
 * Param #5: Feature trigger. flg == 0 means sign, flg == 1 means verify
 * return : The total sign or verify for all the 10 files
**/
 
int signOrVerify(char* inputDir, char* outputDir, char* hashAlg, char* key, int flg) {
	pid_t pid;
	struct timeval t1, t2;
	char inputPrefix[128];
	char outputPrefix[128];
	char suffix[10];
	char inputFile[128];
	char outputFile[128];
	char hashParam[10];
	bzero(inputPrefix, sizeof(inputPrefix));
	bzero(outputPrefix, sizeof(outputPrefix));
	bzero(inputFile, sizeof(inputFile));
	bzero(outputFile, sizeof(outputFile));
	bzero(suffix, sizeof(suffix));
	bzero(hashParam, sizeof(hashParam));

 	int t[10];
 	int totalTime = 0;
	int i;
	strcat(inputPrefix, inputDir);
	strcat(inputPrefix, "/msg.");
 	strcat(outputPrefix, outputDir);
 	strcat(outputPrefix, "/cipher.");
 	strcat(hashParam, "-");
 	strcat(hashParam, hashAlg);
 	for(i = 0; i < 10; i++) {
 		if((pid = fork()) < 0) {
		perror("fork error");
		exit(1);
 	}
 	sprintf(suffix, "%d", i + 1);
 	strcpy(inputFile, inputPrefix);
 	strcpy(outputFile, outputPrefix);
 	strcat(inputFile, suffix);
 	strcat(outputFile, suffix);
 	gettimeofday(&t1, NULL);	
	if (pid == 0) {
 		if (flg == 0) {
 			if (execlp("openssl", "openssl", "dgst", hashParam, "-sign", key,
 			 	"-out", outputFile, inputFile, (char *)0) < 0) {
				perror("execlp error");
				exit(1);
 			}
 		}
 		if (flg == 1) {
			if (execlp("openssl", "openssl", "dgst", hashParam, "-verify", key,
				 "-signature", outputFile, inputFile, (char *)0) < 0) {
				perror("execlp error");
				exit(1);
			 }
 		}
 	}
 	if (waitpid(pid, NULL, 0) < 0) {
		perror("wait error");
		exit(1);
	}
	gettimeofday(&t2, NULL);
	t[i] = getRunTime(t1, t2);
	totalTime += t[i];
	printf("Time for file: %d\n", t[i]);
 }
	printf("Total time: %d\n", totalTime);
	return totalTime;
}