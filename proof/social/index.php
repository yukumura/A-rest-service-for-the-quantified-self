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
include_once("/facebook_login_with_php/config.php");
include_once("/facebook_login_with_php/includes/functions.php");
require_once("/facebook_login_with_php/utente.php");	
$utente = new utente();
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginUrl.'"><img src="facebook_login_with_php/images/logofacebook.png" height="42" width="42"></a>'; 	
}else{
	$user_profile = $facebook->api('/me?fields=first_name,last_name,email,gender');
	checkuser($user_profile['email'], $user_profile['first_name'], $user_profile['last_name'], $user_profile['gender']);
	$_SESSION['id_utente'] = $utente->getId($user_profile['email']);
}
	
?>
<?php 

	if(isset($user_profile)){ //se ha loggato mediante facebook
	
			?>
			<div class="col-md-6">
			<h2>Queste sono le tue informazioni:</h2><br>
			<form id="utenteForm">
			<table class="table">
			<tr>
			<td><b>Id: </b></td>
			<td><?php $_SESSION['id'] = $utente->getId($user_profile['email']); $_SESSION['email'] = $user_profile['email']; echo $_SESSION['id'];?></td>
			</tr>
			
			<td><b>Nome: </b></td>
			
			<td><?php echo $utente->getNome($user_profile['email']);?></td>
			</tr>
			
			<tr><td><b>Cognome: </b></td>
			
			<td><?php echo $utente->getCognome($user_profile['email']);?></td>
			</tr>
			
			<tr><td><b>Sesso: </b></td>
			<td><?php echo $utente->getSesso($user_profile['email']);?></td>
			</tr>
			
			<tr><td><b>Peso: </b></td>
			<td><?php echo $utente->getPeso($user_profile['email']);?> kg</td>
			<!--<td><input type="number" class="form-control" id="peso" value="<?php echo $utente->getPeso($user_profile['email']);?>" name="peso"/></td></tr>-->
			
			<tr><td><b>Altezza: </b></td>
			<td><?php echo $utente->getAltezza($user_profile['email']);?> cm</td>
			<!--<td><input type="number" class="form-control" id="altezza" value="<?php echo $utente->getAltezza($user_profile['email']);?>" name="altezza"/></td></tr>-->
			
			<tr><td><b>Circonferenza torace: </b></td>
			<td><?php echo $utente->getCirconferenzaTorace($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_torace" value="<?php echo $utente->getCirconferenzaTorace($user_profile['email']);?>" name="circonferenza_torace"/></td></tr>-->
			
			<tr><td><b>Girovita: </b></td>
			<td><?php echo $utente->getGirovita($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="girovita" value="<?php echo $utente->getGirovita($user_profile['email']);?>" name="girovita"/></td></tr>-->
			
			<tr><td><b>Lunghezza braccio: </b></td>
			<td><?php echo $utente->getLunghezzaBraccio($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_braccio" value="<?php echo $utente->getLunghezzaBraccio($user_profile['email']);?>" name="lunghezza_braccio"/></td></tr>-->
			
			<tr><td><b>Lunghezza gamba: </b></td>
			<td><?php echo $utente->getLunghezzaGamba($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_gamba" value="<?php echo $utente->getLunghezzaGamba($user_profile['email']);?>" name="lunghezza_gamba"/></td></tr>-->
			
			<tr><td><b>Circonferenza fianchi: </b></td>
			<td><?php echo $utente->getCirconferenzaFianchi($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_fianchi" value="<?php echo $utente->getCirconferenzaFianchi($user_profile['email']);?>" name="circonferenza_fianchi"/></td></tr>-->
			
			<tr><td><b>Circonferenza bacino: </b></td>
			<td><?php echo $utente->getCirconferenzaBacino($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_bacino" value="<?php echo $utente->getCirconferenzaBacino($user_profile['email']);?>" name="circonferenza_bacino"/></td></tr>-->
			
			<tr><td><b>Circonferenza coscia (in alto): </b></td>
			<td><?php echo $utente->getCirconferenzaCosciaAlto($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_coscia_a" value="<?php echo $utente->getCirconferenzaCosciaAlto($user_profile['email']);?>" name="circonferenza_coscia_a"/></td></tr>-->
			
			<tr><td><b>Circonferenza coscia<br>(sopra il ginocchio): </b></td>
			<td><?php echo $utente->getCirconferenzaCosciaGinocchio($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_coscia_g" value="<?php echo $utente->getCirconferenzaCosciaGinocchio($user_profile['email']);?>" name="circonferenza_coscia_g"/></td></tr>-->
			
			<tr><td><b>Lunghezza coscia: </b></td>
			<td><?php echo $utente->getLunghezzaCoscia($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_coscia" value="<?php echo $utente->getLunghezzaCoscia($user_profile['email']);?>" name="lunghezza_coscia"/></td></tr>-->
			
			<tr><td><b>Lunghezza tibia: </b></td>
			<td><?php echo $utente->getLunghezzaTibia($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_tibia" value="<?php echo $utente->getLunghezzaTibia($user_profile['email']);?>" name="lunghezza_tibia"/></td></tr>-->
			
			<tr><td><b>Circonferenza bicipite: </b></td>
			<td><?php echo $utente->getCirconferenzaBicipite($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="circonferenza_bicipite" value="<?php echo $utente->getCirconferenzaBicipite($user_profile['email']);?>" name="circonferenza_bicipite"/></td></tr>-->
			
			<tr><td><b>Lunghezza omero: </b></td>
			<td><?php echo $utente->getLunghezzaOmero($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_omero" value="<?php echo $utente->getLunghezzaOmero($user_profile['email']);?>" name="lunghezza_omero"/></td></tr>-->
			
			<tr><td><b>Lunghezza avambraccio: </b></td>
			<td><?php echo $utente->getLunghezzaAvambraccio($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="lunghezza_avambraccio" value="<?php echo $utente->getLunghezzaAvambraccio($user_profile['email']);?>" name="lunghezza_avambraccio"/></td></tr>-->
			
			<tr><td><b>Larghezza spalle: </b></td>
			<td><?php echo $utente->getLarghezzaSpalle($user_profile['email']);	?></td>
			<!--<td><input type="number" class="form-control" id="larghezza_spalle" value="<?php echo $utente->getLarghezzaSpalle($user_profile['email']);	?>" name="larghezza_spalle"/></td></tr>-->
			
			<tr><td><b>Larghezza torace: </b></td>
			<td><?php echo $utente->getLarghezzaTorace($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="larghezza_torace" value="<?php echo $utente->getLarghezzaTorace($user_profile['email']);?>" name="larghezza_torace"/></td></tr>-->
			
			<tr><td><b>Larghezza girovita: </b></td>
			<td><?php echo $utente->getLarghezzaGirovita($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="larghezza_girovita" value="<?php echo $utente->getLarghezzaGirovita($user_profile['email']);?>" name="larghezza_girovita"/></td></tr>-->
			
			<tr><td><b>Larghezza fianchi: </b></td>
			<td><?php echo $utente->getLarghezzaFianchi($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="larghezza_fianchi" value="<?php echo $utente->getLarghezzaFianchi($user_profile['email']);?>" name="larghezza_fianchi"/></td></tr>-->
			
			<tr><td><b>Larghezza bacino: </b></td>
			<td><?php echo $utente->getLarghezzaBacino($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="larghezza_bacino" value="<?php echo $utente->getLarghezzaBacino($user_profile['email']);?>" name="larghezza_bacino"/></td></tr>-->
			
			<tr><td><b>Distanza cresta iliaca-anca: </b></td>
			<td><?php echo $utente->getDistanzaCrestaIlliaca($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="distanza_cresta_illiaca" value="<?php echo $utente->getDistanzaCrestaIlliaca($user_profile['email']);?>" name="distanza_cresta_illiaca"/></td></tr>-->
			
			<tr><td><b>Distanza malleolo-pavimento: </b></td>
			<td><?php echo $utente->getDistanzaMalleoloPavimento($user_profile['email']);?></td>
			<!--<td><input type="number" class="form-control" id="distanza_malleolo" value="<?php echo $utente->getDistanzaMalleoloPavimento($user_profile['email']);?>" name="distanza_malleolo"/></td></tr>-->
			
			<!--<tr><td></td><td></td><td><button class="btn btn-default" id="btnSave">Apporta modifiche</button></td></tr>-->
			</table>	
			</form>	
			</div>
			<div class="col-md-6">
			<h2>Informazioni derivate dalle precedenti:</h2><br>
			<table class="table">
			<tr>
			<td><b>BMI: </b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $bmi = $utente->getPeso($user_profile['email']) / pow($utente->getAltezza($user_profile['email']) , 2); echo $bmi;}?></td>
			</tr>
			<tr>
			<td><b>Circonferenza coscia <br>(media delle due circonferenze):</b></td>
			<td><?php $circonferenza_coscia = (($utente->getCirconferenzaCosciaAlto($user_profile['email']) + $utente->getCirconferenzaCosciaGinocchio($user_profile['email']))/2); if($circonferenza_coscia==0) echo $circonferenza_coscia;?></td>
			</tr>
			<tr>
			<td><b>Log(BMI):</b></td>
			<td><?php if(isset($bmi)) echo log($bmi); else echo "le tue informazioni sono da modificare";?></td>
			</tr>
			<tr>
			<td><b>Rapporto circonferenza torace su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_ta = ($utente->getCirconferenzaTorace($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_ta;}?></td>
			</tr>
			<tr>
			<td><b>Rapporto circonferenza fianchi su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fa = ($utente->getCirconferenzaFianchi($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_fa;}?></td>
			</tr>
			<tr>
			<td><b>Rapporto bicipite su lunghezza braccio:</b></td>
			<td><?php if($utente->getLunghezzaBraccio($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_bb = ($utente->getCirconferenzaBicipite($user_profile['email']) / $utente->getLunghezzaBraccio($user_profile['email'])); echo $rapporto_bb;}?></td>
			</tr>
			<tr>
			<td><b>Rapporto circonferenza coscia su lunghezza gamba:</b></td>
			<td><?php if($utente->getLunghezzaGamba($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_cg = ((($utente->getCirconferenzaCosciaAlto($user_profile['email']) + $utente->getCirconferenzaCosciaGinocchio($user_profile['email']))/2) / $utente->getLunghezzaGamba($user_profile['email'])); echo $rapporto_cg;}?></td>
			</tr>
			<tr>
			<td><b>Differenza tra circonferenza torace e girovita:</b></td>
			<td><?php $differenza_tg = ($utente->getCirconferenzaTorace($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_tg;?></td>
			</tr>
			<tr>
			<td><b>Differenza tra circonferenza fianchi e girovita:</b></td>
			<td><?php $differenza_fg = ($utente->getCirconferenzaFianchi($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_fg;?></td>
			</tr>
			<tr>
			<td><b>Rapporto circonferenza torace su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_tg = ($utente->getCirconferenzaTorace($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_tg;}?></td>
			</tr>
			<tr>
			<td><b>Rapporto circonferenza fianchi su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fg = ($utente->getCirconferenzaFianchi($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_fg;}?></td>
			</tr>
			<tr>
			<td><b>OSS:</b></td>
			<td><?php ?></td>
			</tr>
			<tr><td><?php if(isset($user_profile)){
				?>
				
				<br><a class="btn btn-success" role="button" href="http://localhost/proof/social/edit.php">Modifica le tue informazioni</a>
				<a class="btn btn-danger" role="button" href="http://localhost/proof/social/facebook_login_with_php/logout.php?logout">Logout</a>
		<?php } ?><td></tr>
			</table>
			</div>

			
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/main.js"></script>
			
<?php } else {
	
	?>
		
		<form method="POST" class="form-signin" action="login.php">
		<h2 class="form-signin-heading">Accesso normale</h2>
		<label for="text" class="sr-only">Username</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Username" required autofocus>
		<label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
		<!-- <input type="text" id="email" placeholder="inserisci email qui" name="email"/> -->
		<!--<input type="password" id="password" placeholder="inserisci password qui" name="password"/> -->
		<button class="btn btn-lg btn-primary btn-block" id="btnAccedi">Accedi</button>
		</form>
	
	<?php
	
	
	
	
	
} ?>


<?php if(!$fbuser){ 
			?><div class="form-signin" id="scritta">Oppure utilizza Facebook <br><?php echo $output; ?></div><?php 
		} 
?>
</div>		
</body>
</html>