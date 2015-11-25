<?php
include_once("config.php");
if(array_key_exists('logout',$_GET))
{
	$facebook->destroySession();
	session_start();
	unset($_SESSION['userdata']);
	unset($_SESSION['id_utente']);
	session_destroy();
	header("Location: http://localhost/proof/social/");
}
?>