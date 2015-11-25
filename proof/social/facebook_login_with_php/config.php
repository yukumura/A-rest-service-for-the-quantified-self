<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '948890485181573'; //Facebook App ID
$appSecret = 'c92b2124adc7a5abc1a2eca4428a3aff'; // Facebook App Secret
$return_url = 'http://localhost/proof/social/';  //return url (url to script)
$homeurl = 'http://localhost/proof/social/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>