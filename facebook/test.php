<?php
require 'facebook.php';
    
$facebook = new Facebook(array(
  'appId'  => '608546139206835',
  'secret' => 'e07625547d54925100e2b3cc289814c7',
  'cookie' => true,
));

$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


 
if ($me) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $loginUrl = $facebook->getLoginUrl();
}
 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
  </head>
  <body>
    <?php if ($me): ?>
    <?php echo "Welcome, ".$me['first_name']. ".<br />"; ?>
    <a href="<?php echo $logoutUrl; ?>">
      <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
    </a>
    <?php else: ?>
      <a href="<?php echo $loginUrl; ?>">
        <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
      </a>
    <?php endif ?>
  </body>
</html