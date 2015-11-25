<?php
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");



		class utente {
		private $nome;
		
		public function getNome($email){
			$query = "SELECT nome FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$nome = mysql_fetch_row($risultato);
			return $nome[0];
		}
		
		private $cognome;
		
		public function getCognome($email){
			$query = "SELECT cognome FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$cognome = mysql_fetch_row($risultato);
			return $cognome[0];
		}
		
		private $sesso;
		
		public function getSesso($email){
			$query = "SELECT sesso FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$sesso = mysql_fetch_row($risultato);
			return $sesso[0];
		}
		
		private $altezza;
		
		public function getAltezza($email){
			$query = "SELECT altezza FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$altezza = mysql_fetch_row($risultato);
			return $altezza[0];
		}
		
		private $peso;
		
		public function getPeso($email){
			$query = "SELECT peso FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$peso = mysql_fetch_row($risultato);
			return $peso[0];
		}
		
		private $circonferenza_torace;
	
		public function getCirconferenzaTorace($email){
			$query = "SELECT circonferenza_torace FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_torace = mysql_fetch_row($risultato);
			return $circonferenza_torace[0];
		}
		
		private $girovita;
	
		public function getGirovita($email){
			$query = "SELECT girovita FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$girovita = mysql_fetch_row($risultato);
			return $girovita[0];
		}

		private $circonferenza_fianchi;
		
		public function getCirconferenzaFianchi($email){
			$query = "SELECT circonferenza_fianchi FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_fianchi = mysql_fetch_row($risultato);
			return $circonferenza_fianchi[0];
		}
		
		private $lunghezza_braccio;
		
		public function getLunghezzaBraccio($email){
			$query = "SELECT lunghezza_braccio FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_braccio = mysql_fetch_row($risultato);
			return $lunghezza_braccio[0];
		}
		
		private $lunghezza_gamba;
		
		public function getLunghezzaGamba($email){
			$query = "SELECT lunghezza_gamba FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_gamba = mysql_fetch_row($risultato);
			return $lunghezza_gamba[0];
		}
	
		private $circonferenza_bacino;
	
		public function getCirconferenzaBacino($email){
			$query = "SELECT circonferenza_bacino FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_bacino = mysql_fetch_row($risultato);
			return $circonferenza_bacino[0];
		}
	
		private $circonferenza_coscia_alto;
	
		public function getCirconferenzaCosciaAlto($email){
			$query = "SELECT circonferenza_coscia_a FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_coscia_alto = mysql_fetch_row($risultato);
			return $circonferenza_coscia_alto[0];
		}
	
		private $circonferenza_coscia_ginocchio;
	
		public function getCirconferenzaCosciaGinocchio($email){
			$query = "SELECT circonferenza_coscia_g FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_coscia_ginocchio = mysql_fetch_row($risultato);
			return $circonferenza_coscia_ginocchio[0];
		}
	
		private $lunghezza_coscia;
	
		public function getLunghezzaCoscia($email){
			$query = "SELECT lunghezza_coscia FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_coscia = mysql_fetch_row($risultato);
			return $lunghezza_coscia[0];
		}
	
		private $lunghezza_tibia;
	
		public function getLunghezzaTibia($email){
			$query = "SELECT lunghezza_tibia FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_tibia = mysql_fetch_row($risultato);
			return $lunghezza_tibia[0];
		}
	
		private $circonferenza_bicipite;
	
		public function getCirconferenzaBicipite($email){
			$query = "SELECT circonferenza_bicipite FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$circonferenza_bicipite = mysql_fetch_row($risultato);
			return $circonferenza_bicipite[0];
		}
	
		private $lunghezza_omero;
		
		public function getLunghezzaOmero($email){
			$query = "SELECT lunghezza_omero FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_omero = mysql_fetch_row($risultato);
			return $lunghezza_omero[0];
		}
	
		private $lunghezza_avambraccio;
	
		public function getLunghezzaAvambraccio($email){
			$query = "SELECT lunghezza_avambraccio FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$lunghezza_avambraccio = mysql_fetch_row($risultato);
			return $lunghezza_avambraccio[0];
		}
	
		private $larghezza_spalle;
	
		public function getLarghezzaSpalle($email){
			$query = "SELECT larghezza_spalle FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$larghezza_spalle = mysql_fetch_row($risultato);
			return $larghezza_spalle[0];
		}
	
		private $larghezza_torace;
	
		public function getLarghezzaTorace($email){
			$query = "SELECT larghezza_torace FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$larghezza_torace = mysql_fetch_row($risultato);
			return $larghezza_torace[0];
		}
	
		private $larghezza_girovita;
	
		public function getLarghezzaGirovita($email){
			$query = "SELECT larghezza_girovita FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$larghezza_girovita = mysql_fetch_row($risultato);
			return $larghezza_girovita[0];
		}
	
		private $larghezza_fianchi;
	
		public function getLarghezzaFianchi($email){
			$query = "SELECT larghezza_fianchi FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$larghezza_fianchi = mysql_fetch_row($risultato);
			return $larghezza_fianchi[0];
		}
	
		private $larghezza_bacino;
	
		public function getLarghezzaBacino($email){
			$query = "SELECT larghezza_bacino FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$larghezza_bacino = mysql_fetch_row($risultato);
			return $larghezza_bacino[0];
		}
	
		private $distanza_cresta_iliaca_anca;
		
		public function getDistanzaCrestaIlliaca($email){
			$query = "SELECT distanza_cresta_illiaca FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$distanza_cresta_iliaca_anca = mysql_fetch_row($risultato);
			return $distanza_cresta_iliaca_anca[0];
		}
		
		private $distanza_malleolo_pavimento;
	
		public function getDistanzaMalleoloPavimento($email){
			$query = "SELECT distanza_malleolo FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$distanza_malleolo_pavimento = mysql_fetch_row($risultato);
			return $distanza_malleolo_pavimento[0];
		}
	
		private $id;
		
		public function getId($email){
			$query = "SELECT id FROM utente WHERE email ='$email'";
			$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
			$id = mysql_fetch_row($risultato);
			return $id[0];
		}
		
		/* private $bmi;
		
		public function getBmi($email){
			
		}
		
		private $circonferenza_coscia;
		
		public function getCirconferenzaCoscia($email){
			$circonferenza_coscia_a = getCirconferenzaCosciaAlto($email);
			$circonferenza_coscia_g = getCirconferenzaCosciaGinocchio($email);
			return ($circonferenza_coscia_a + $circonferenza_coscia_g)/2;
			
		} */
	
	
	}

?>