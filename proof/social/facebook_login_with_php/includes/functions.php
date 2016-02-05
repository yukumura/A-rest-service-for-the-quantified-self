<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');    // DB username
define('DB_PASSWORD', '');    // DB password
define('DB_DATABASE', 'social');      // DB name
require_once('/facebook_login_with_php/utente.php');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");

function checkuser($email, $nome, $cognome, $sesso, $id){
	if($sesso === "male"){ $sesso = "uomo"; }
	else if($sesso === "female"){ $sesso = "donna"; }
	$query="SELECT COUNT(*) as total FROM utente WHERE id_facebook LIKE '$id'";
	$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
	$row = mysql_fetch_assoc($risultato);
			
		if($row['total']!=0){
			
		}else{					
			$query = "INSERT INTO utente (id_facebook, email, nome, cognome, sesso) VALUES ('$id','$email','$nome', '$cognome', '$sesso')";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
		}
}

function checkadmin($email, $password){
	$password = md5($password);
	$query="SELECT COUNT(*) as total FROM admin WHERE nome LIKE '$email' and password LIKE '$password'"; // funzione controllo dati
	$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
	$row = mysql_fetch_assoc($risultato);
	
	if($row['total']!=0){
			return true;
		}else{					
			return false;
	}
	
}
?>