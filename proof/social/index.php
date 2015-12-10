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
	$user_profile = $facebook->api('/me?fields=first_name,last_name,email,gender,id');
	checkuser($user_profile['email'], $user_profile['first_name'], $user_profile['last_name'], $user_profile['gender']);
	$_SESSION['id_utente'] = $utente->getId($user_profile['email']);
}
	
?>
<?php 

	if(isset($user_profile)){ //se ha loggato mediante facebook
		
			?>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="http://localhost/proof/social/">A rest service for the quantified self</a>
					</div>
				<div>
      
				<ul class="nav navbar-nav">
					<li class="active" id="prima_pagina"><a href="#">Informazioni principali</a></li>
					<li id="seconda_pagina"><a href="#">Informazioni derivate</a></li>
				</ul>
      
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://localhost/proof/social/"><span class="glyphicon glyphicon-user"></span><?php echo " " . $user_profile['first_name'] . " " . $user_profile['last_name'];?></a></li>
					<li><a href="http://localhost/proof/social/facebook_login_with_php/logout.php?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
				</div>
				</div>
			</nav>
		
		
		
		
		
			<div class="col-md-3"><br><img src="https://graph.facebook.com/<?php echo $user_profile['id']?>/picture?width=200&height=200"><br><br><a class="btn btn-success" role="button" href="http://localhost/proof/social/edit">Modifica le tue informazioni</a></div>
						
			<div class="prima_pagina">
				<div class="col-md-9">
				<h2>Informazioni principali</h2><br>
			<form id="utenteForm">
				<div class="col-md-4">
				<table class="table">
				<tr>
					<td><b>Id: </b></td>
					<td><?php $_SESSION['id'] = $utente->getId($user_profile['email']); $_SESSION['email'] = $user_profile['email']; echo $_SESSION['id'];?></td>
				</tr>
				<tr>
					<td><b>Nome: </b></td>
					<td><?php echo $utente->getNome($user_profile['email']);?></td>
				</tr>
				<tr>
					<td><b>Cognome: </b></td>
					<td><?php echo $utente->getCognome($user_profile['email']);?></td>
				</tr>			
				<tr>
					<td><b>Sesso: </b></td>
					<td><?php echo $utente->getSesso($user_profile['email']);?></td>
				</tr>			
				<tr>
					<td><b>Peso: </b></td>
					<td><?php echo $utente->getPeso($user_profile['email']);?> kg</td>
				</tr>
				<tr>
					<td><b>Altezza: </b></td>
					<td><?php echo $utente->getAltezza($user_profile['email']);?> cm</td>
				</tr>
				<tr>
					<td><b>Circonferenza torace: </b></td>
					<td><?php echo $utente->getCirconferenzaTorace($user_profile['email']);?></td>
				</tr>
				<tr>
					<td><b>Girovita: </b></td>
					<td><?php echo $utente->getGirovita($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Lunghezza braccio: </b></td>
					<td><?php echo $utente->getLunghezzaBraccio($user_profile['email']);?></td>		
				</tr>
				</table>
				</div>
				<div class="col-md-4">
				<table class="table">
				<tr>
					<td><b>Lunghezza gamba: </b></td>
					<td><?php echo $utente->getLunghezzaGamba($user_profile['email']);?></td>
				</tr>
				<tr>
					<td><b>Circonferenza fianchi: </b></td>
					<td><?php echo $utente->getCirconferenzaFianchi($user_profile['email']);?></td>	
				</tr>
				<tr>
					<td><b>Circonferenza bacino: </b></td>
					<td><?php echo $utente->getCirconferenzaBacino($user_profile['email']);?></td>					
				</tr>
				<tr>
					<td><b>Circonferenza coscia<br>(in alto): </b></td>
					<td><?php echo $utente->getCirconferenzaCosciaAlto($user_profile['email']);?></td>				
				</tr>
				<tr>
					<td><b>Circonferenza coscia<br>(sopra il ginocchio): </b></td>
					<td><?php echo $utente->getCirconferenzaCosciaGinocchio($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Lunghezza coscia: </b></td>
					<td><?php echo $utente->getLunghezzaCoscia($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Lunghezza tibia: </b></td>
					<td><?php echo $utente->getLunghezzaTibia($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Circonferenza bicipite: </b></td>
					<td><?php echo $utente->getCirconferenzaBicipite($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Lunghezza omero: </b></td>
					<td><?php echo $utente->getLunghezzaOmero($user_profile['email']);?></td>		
				</tr>
				</table>
				</div>
				<div class="col-md-4">
				<table class="table">
				<tr>
					<td><b>Lunghezza avambraccio: </b></td>
					<td><?php echo $utente->getLunghezzaAvambraccio($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Larghezza spalle: </b></td>
					<td><?php echo $utente->getLarghezzaSpalle($user_profile['email']);	?></td>		
				</tr>
				<tr>
					<td><b>Larghezza torace: </b></td>
					<td><?php echo $utente->getLarghezzaTorace($user_profile['email']);?></td>
				</tr>
				<tr>
					<td><b>Larghezza girovita: </b></td>
					<td><?php echo $utente->getLarghezzaGirovita($user_profile['email']);?></td>			
				</tr>
				<tr>
					<td><b>Larghezza fianchi: </b></td>
					<td><?php echo $utente->getLarghezzaFianchi($user_profile['email']);?></td>			
				</tr>
				<tr>
					<td><b>Larghezza bacino: </b></td>
					<td><?php echo $utente->getLarghezzaBacino($user_profile['email']);?></td>
				</tr>
				<tr>
					<td><b>Distanza <br>cresta iliaca-anca: </b></td>
					<td><?php echo $utente->getDistanzaCrestaIlliaca($user_profile['email']);?></td>		
				</tr>
				<tr>
					<td><b>Distanza <br>malleolo-pavimento: </b></td>
					<td><?php echo $utente->getDistanzaMalleoloPavimento($user_profile['email']);?></td>
				</tr>
				</table>
				</div>
			</form>	
			</div>
			</div>
			
			
			<div class="seconda_pagina hidden">
			<div class="col-md-9">
			<h2>Informazioni derivate dalle precedenti</h2><br>
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
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Rapporto larghezza torace su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_ta = ($utente->getLarghezzaTorace($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_ta;}?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Rapporto circonferenza torace su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_ta = ($utente->getCirconferenzaTorace($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_ta;}?></td>
			</tr>
			<?php } ?>
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Rapporto larghezza fianchi su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fa = ($utente->getLarghezzaFianchi($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_fa;}?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Rapporto circonferenza fianchi su altezza:</b></td>
			<td><?php if($utente->getAltezza($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fa = ($utente->getCirconferenzaFianchi($user_profile['email'])/$utente->getAltezza($user_profile['email'])); echo $rapporto_fa;}?></td>
			</tr>
			<?php } ?>
			
			<tr>
			<td><b>Rapporto bicipite su lunghezza braccio:</b></td>
			<td><?php if($utente->getLunghezzaBraccio($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_bb = ($utente->getCirconferenzaBicipite($user_profile['email']) / $utente->getLunghezzaBraccio($user_profile['email'])); echo $rapporto_bb;}?></td>
			</tr>
			
			<tr>
			<td><b>Rapporto circonferenza coscia su lunghezza gamba:</b></td>
			<td><?php if($utente->getLunghezzaGamba($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_cg = ((($utente->getCirconferenzaCosciaAlto($user_profile['email']) + $utente->getCirconferenzaCosciaGinocchio($user_profile['email']))/2) / $utente->getLunghezzaGamba($user_profile['email'])); echo $rapporto_cg;}?></td>
			</tr>
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Differenza tra larghezza torace e girovita:</b></td>
			<td><?php $differenza_tg = ($utente->getLarghezzaTorace($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_tg;?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Differenza tra circonferenza torace e girovita:</b></td>
			<td><?php $differenza_tg = ($utente->getCirconferenzaTorace($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_tg;?></td>
			</tr>
			<?php } ?>
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Differenza tra larghezza fianchi e girovita:</b></td>
			<td><?php $differenza_fg = ($utente->getLarghezzaFianchi($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_fg;?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Differenza tra circonferenza fianchi e girovita:</b></td>
			<td><?php $differenza_fg = ($utente->getCirconferenzaFianchi($user_profile['email']) - $utente->getGirovita($user_profile['email'])); echo $differenza_fg;?></td>
			</tr>
			<?php } ?>
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Rapporto larghezza torace su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_tg = ($utente->getLarghezzaTorace($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_tg;}?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Rapporto circonferenza torace su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_tg = ($utente->getCirconferenzaTorace($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_tg;}?></td>
			</tr>
			<?php } ?>
			
			<?php if(($utente->getSesso($user_profile['email'])=='donna')){
			?>
			<tr>
			<td><b>Rapporto larghezza fianchi su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fg = ($utente->getLarghezzaFianchi($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_fg;}?></td>
			</tr><?php
			}else{ ?>
			<tr>
			<td><b>Rapporto circonferenza fianchi su girovita:</b></td>
			<td><?php if($utente->getGirovita($user_profile['email'])==0) echo "le tue informazioni sono da modificare"; else{ $rapporto_fg = ($utente->getCirconferenzaFianchi($user_profile['email']) / $utente->getGirovita($user_profile['email'])); echo $rapporto_fg;}?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
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