<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->	
<link href="bootstrap/css/signin.css" rel="stylesheet">
</head>

<body>
<div class="container">
<?php 
	session_start();
	if (isset($_SESSION['id'])){
		include_once("/facebook_login_with_php/config.php");
		include_once("/facebook_login_with_php/includes/functions.php");
		require_once("/facebook_login_with_php/utente.php");	
		$utente = new utente();
		
		$id = $_SESSION['id'];
		$query = "SELECT email FROM utente WHERE id ='$id'";
		$risultato = mysql_query($query) or die("Query non valida: " . mysql_error());
		$poggio = mysql_fetch_row($risultato);
		$email = $poggio[0];
	?>
<br>

<div class="col-md-4">
<b><u>Information for dummies</u></b><br><br>
<label>In questa pagina puoi cambiare i tuoi dati,<br>basta modificare il valore contenuto nelle celle sottostanti.<br><br>Per tornare alla pagina precedente<br><a class="btn btn-danger" role="button" href="http://localhost/proof/social/">Torna indietro</a></label>
</div>

<form id="utenteForm">
	
<div class="mainArea">
<div class="col-md-6">
<table class="table">
<tr><td><label>Id:</label>
<input id="utenteId" value="<?php echo $utente->getId($email);?>" class="form-control" name="id" type="text" disabled />
</td></tr>

<tr><td><label>Nome:</label>
<input type="text" value="<?php echo $utente->getNome($email);?>" class="form-control" id="nome" name="nome" disabled />
</td></tr>

<tr><td>
<label>Cognome:</label>
<input type="text" value="<?php echo $utente->getCognome($email);?>" class="form-control" id="cognome" name="cognome" disabled />
</td></tr>

<tr><td>
<label>Sesso:</label>
<input type="text" value="<?php echo $utente->getSesso($email);?>" class="form-control" id="sesso" name="sesso" disabled />
</td></tr>

<tr><td>
<label>Peso:</label>
<input type="number" value="<?php echo $utente->getPeso($email);?>" class="form-control" value="<?php echo $utente->getPeso($email);?>" id="peso" name="peso"/>
</td></tr>

<tr><td>
<label>Altezza:</label>
<input type="number" value="<?php echo $utente->getAltezza($email);?>" class="form-control" id="altezza" name="altezza"/>
</td></tr>

<tr><td>
<label>Circonferenza torace:</label>
<input type="number" value="<?php echo $utente->getCirconferenzaTorace($email);?>" class="form-control" id="circonferenza_torace" name="circonferenza_torace"/>
</td></tr>

<tr><td>
<label>Girovita:</label>
<input type="number" value="<?php echo $utente->getGirovita($email);?>" class="form-control" id="girovita" name="girovita"/>
</td></tr>

<tr><td>
<label>Lunghezza braccio:</label>
<input type="number" value="<?php echo $utente->getLunghezzaBraccio($email);?>" class="form-control" id="lunghezza_braccio" name="lunghezza_braccio"/>
</td></tr>

<tr><td>
<label>Lunghezza gamba:</label>
<input type="number" value="<?php echo $utente->getLunghezzaGamba($email);?>" class="form-control" id="lunghezza_gamba" name="lunghezza_gamba"/>
</td></tr>

<tr><td>
<label>Circonferenza fianchi:</label>
<input type="number" value="<?php echo $utente->getCirconferenzaFianchi($email);?>" class="form-control" id="circonferenza_fianchi" name="circonferenza_fianchi"/>
</td></tr>

<tr><td>
<label>Circonferenza bacino:</label>
<input type="number" value="<?php echo $utente->getCirconferenzaBacino($email);?>" class="form-control" id="circonferenza_bacino" name="circonferenza_bacino"/>
</td></tr>

<tr><td>
<label>Circonferenza coscia (in alto):</label>
<input type="number" value="<?php echo $utente->getCirconferenzaCosciaAlto($email);?>" class="form-control" id="circonferenza_coscia_a" name="circonferenza_coscia_a"/>
</td></tr>

<tr><td>
<label>Circonferenza coscia (sopra il ginocchio):</label>
<input type="number" value="<?php echo $utente->getCirconferenzaCosciaGinocchio($email);?>" class="form-control" id="circonferenza_coscia_g" name="circonferenza_coscia_g"/>
</td></tr>

<tr><td>
<label>Lunghezza coscia:</label>
<input type="number" value="<?php echo $utente->getLunghezzaCoscia($email);?>" class="form-control" id="lunghezza_coscia" name="lunghezza_coscia"/>
</td></tr>

<tr><td>
<label>Lunghezza tibia:</label>
<input type="number" value="<?php echo $utente->getLunghezzaTibia($email);?>" class="form-control" id="lunghezza_tibia" name="lunghezza_tibia"/>
</td></tr>

<tr><td>
<label>Circonferenza bicipite:</label>
<input type="number" value="<?php echo $utente->getCirconferenzaBicipite($email);?>" class="form-control" id="circonferenza_bicipite" name="circonferenza_bicipite"/>
</td></tr>

<tr><td>
<label>Lunghezza omero:</label>
<input type="number" value="<?php echo $utente->getLunghezzaOmero($email);?>" class="form-control" id="lunghezza_omero" name="lunghezza_omero"/>
</td></tr>

<tr><td>
<label>Lunghezza avambraccio:</label>
<input type="number" value="<?php echo $utente->getLunghezzaAvambraccio($email);?>" class="form-control" id="lunghezza_avambraccio" name="lunghezza_avambraccio"/>
</td></tr>

<tr><td>
<label>Larghezza spalle:</label>
<input type="number" value="<?php echo $utente->getLarghezzaSpalle($email);?>" class="form-control" id="larghezza_spalle" name="larghezza_spalle"/>
</td></tr>

<tr><td>
<label>Larghezza torace:</label>
<input type="number" value="<?php echo $utente->getLarghezzaTorace($email);?>" class="form-control" id="larghezza_torace" name="larghezza_torace"/>
</td></tr>

<tr><td>
<label>Larghezza girovita:</label>
<input type="number" value="<?php echo $utente->getLarghezzaGirovita($email);?>" class="form-control" id="larghezza_girovita" name="larghezza_girovita"/>
</td></tr>

<tr><td>
<label>Larghezza fianchi:</label>
<input type="number" value="<?php echo $utente->getLarghezzaFianchi($email);?>" class="form-control" id="larghezza_fianchi" name="larghezza_fianchi"/>
</td></tr>

<tr><td>
<label>Larghezza bacino:</label>
<input type="number" value="<?php echo $utente->getLarghezzaBacino($email);?>" class="form-control" id="larghezza_bacino" name="larghezza_bacino"/>
</td></tr>

<tr><td>
<label>Distanza cresta iliaca-anca:</label>
<input type="number" value="<?php echo $utente->getDistanzaCrestaIlliaca($email);?>" class="form-control" id="distanza_cresta_illiaca" name="distanza_cresta_illiaca"/>
</td></tr>

<tr><td>
<label>Distanza malleolo-pavimento:</label>
<input type="number" value="<?php echo $utente->getDistanzaMalleoloPavimento($email);?>" class="form-control" id="distanza_malleolo" name="distanza_malleolo"/>
</td></tr>
<tr><td><button class="btn btn-success" id="btnSave">Salva</button> <button class="btn btn-danger" id="btnBack">Torna indietro</button>
</td></tr>
</table>


</div>
</div>

</form>


	<?php } else{ echo "Non puoi accedere a questa pagina"; ?> <br><a class="btn btn-danger" role="button" href="http://localhost/proof/social/">Torna indietro</a> <?php } ?>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/admin.js"></script>
</div>
</body>
</html>