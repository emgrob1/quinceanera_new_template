<?php
session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '593238420809439'; //Facebook App ID
$appSecret = 'd9948f072dbba10fb5c391e98a778317'; // Facebook App Secret
$redirectURL = 'http://localhost/facebook_login_with_php/'; // Callback URL
$fbPermissions = 'emgrob1@yahoo.com';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>
