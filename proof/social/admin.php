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
	if (isset($_SESSION['id']) && $_SESSION['id']==0){
	?>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">A rest service for the quantified self</a>
					</div>
				<div>
      
				<ul class="nav navbar-nav">
					<li class="active" id="prima_pagina"><a href="#">Pagina admin</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://localhost/proof/social/facebook_login_with_php/logout.php?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
				</div>
				</div>
			</nav>
<div class="col-md-4">
	<b><u>Information for dummies</u></b><br><br>
	<label>
	In questa pagina puoi cambiare i dati di ogni utente presente nella lista qui a fianco.<br><br>
	E' possibile fare una ricerca fra gli utenti utilizzando la barra sopra la lista.<br><br>
	Selezionare l'utente che si vuole visualizzare e modificare i valori delle celle.<br><br>
	Con il pulsante Nuovo Utente si azzerano le celle, in modo tale da poter creare una voce utente nel database con i dati a piacere.<br><br>
	Attraverso il bottone salva si apportano le modifiche, mentre con il tasto cancella utente si elimina l'utente dal database.<br><br>
	</label>
</div>
<div class="leftArea">
<div class="col-md-8">
<button class="btn btn-primary" id="btnSearch">Cerca</button>
<div class="col-xs-7"><input type="text" placeholder="Inserisci nome utente" class="form-control" id="searchKey"/></div>
<ul class="list-group" id="utenteList"></ul> <!-- vengono visualizzati gli utenti del db -->
</div>
</div>

<form id="utenteForm">
	
<div class="mainArea">
<div class="col-md-12" id="centrato"><button class="btn btn-primary" id="btnAdd">Nuovo Utente</button><br>
<div class="col-md-4">
<table class="table">
<tr><td><label>Id</label>
<input id="utenteId" class="form-control" name="id" type="text" disabled />
</td></tr>

<tr><td><label>Nome</label>
<input type="text" class="form-control" id="nome" name="nome" />
</td></tr>

<tr><td>
<label>Cognome</label>
<input type="text" class="form-control" id="cognome" name="cognome"/>
</td></tr>

<tr><td>
<label>Sesso</label>
<input type="text" class="form-control" id="sesso" name="sesso"/>
</td></tr>

<tr><td>
<label>Peso</label>
<input type="number" class="form-control" id="peso" name="peso"/>
</td></tr>

<tr><td>
<label>Altezza</label>
<input type="number" class="form-control" id="altezza" name="altezza"/>
</td></tr>

<tr><td>
<label>Circonferenza torace</label>
<input type="number" class="form-control" id="circonferenza_torace" name="circonferenza_torace"/>
</td></tr>

<tr><td>
<label>Girovita</label>
<input type="number" class="form-control" id="girovita" name="girovita"/>
</td></tr>

<tr><td>
<label>Lunghezza braccio</label>
<input type="number" class="form-control" id="lunghezza_braccio" name="lunghezza_braccio"/>
</td></tr>
</table>
</div>
<div class="col-md-4">
<table class="table">
<tr><td>
<label>Lunghezza gamba</label>
<input type="number" class="form-control" id="lunghezza_gamba" name="lunghezza_gamba"/>
</td></tr>

<tr><td>
<label>Circonferenza fianchi</label>
<input type="number" class="form-control" id="circonferenza_fianchi" name="circonferenza_fianchi"/>
</td></tr>

<tr><td>
<label>Circonferenza bacino</label>
<input type="number" class="form-control" id="circonferenza_bacino" name="circonferenza_bacino"/>
</td></tr>

<tr><td>
<label>Circonferenza coscia (in alto)</label>
<input type="number" class="form-control" id="circonferenza_coscia_a" name="circonferenza_coscia_a"/>
</td></tr>

<tr><td>
<label>Circonferenza coscia (sopra il ginocchio)</label>
<input type="number" class="form-control" id="circonferenza_coscia_g" name="circonferenza_coscia_g"/>
</td></tr>

<tr><td>
<label>Lunghezza coscia</label>
<input type="number" class="form-control" id="lunghezza_coscia" name="lunghezza_coscia"/>
</td></tr>

<tr><td>
<label>Lunghezza tibia</label>
<input type="number" class="form-control" id="lunghezza_tibia" name="lunghezza_tibia"/>
</td></tr>

<tr><td>
<label>Circonferenza bicipite</label>
<input type="number" class="form-control" id="circonferenza_bicipite" name="circonferenza_bicipite"/>
</td></tr>

<tr><td>
<label>Lunghezza omero</label>
<input type="number" class="form-control" id="lunghezza_omero" name="lunghezza_omero"/>
</td></tr>
</table>
</div>
<div class="col-md-4">
<table class="table">
<tr><td>
<label>Lunghezza avambraccio</label>
<input type="number" class="form-control" id="lunghezza_avambraccio" name="lunghezza_avambraccio"/>
</td></tr>

<tr><td>
<label>Larghezza spalle</label>
<input type="number" class="form-control" id="larghezza_spalle" name="larghezza_spalle"/>
</td></tr>

<tr><td>
<label>Larghezza torace</label>
<input type="number" class="form-control" id="larghezza_torace" name="larghezza_torace"/>
</td></tr>

<tr><td>
<label>Larghezza girovita</label>
<input type="number" class="form-control" id="larghezza_girovita" name="larghezza_girovita"/>
</td></tr>

<tr><td>
<label>Larghezza fianchi</label>
<input type="number" class="form-control" id="larghezza_fianchi" name="larghezza_fianchi"/>
</td></tr>

<tr><td>
<label>Larghezza bacino</label>
<input type="number" class="form-control" id="larghezza_bacino" name="larghezza_bacino"/>
</td></tr>

<tr><td>
<label>Distanza cresta iliaca-anca</label>
<input type="number" class="form-control" id="distanza_cresta_illiaca" name="distanza_cresta_illiaca"/>
</td></tr>

<tr><td>
<label>Distanza malleolo-pavimento</label>
<input type="number" class="form-control" id="distanza_malleolo" name="distanza_malleolo"/>
</td></tr>
<tr><td><button class="btn btn-success" id="btnSave">Salva</button>
<button class="btn btn-danger" id="btnDelete">Cancella utente</button></td></tr>
</table>
</div>
</div>
</div>

</form>


	<?php } else{ echo "<h1>Non puoi accedere a questa pagina!</h1>"; ?> <br><button class="btn btn-danger" id="btnBack">Torna indietro</button> <?php } ?>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/admin.js"></script>
</div>
</body>
</html>