<?php
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");



		class admin {
		
		private $id;
		
		public function getId($email){
			$query = "SELECT id FROM admin WHERE nome ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$id = mysql_fetch_row($risultato);
			return $id[0];
		}
		

	
		}

?>