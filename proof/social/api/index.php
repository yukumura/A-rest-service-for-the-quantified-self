<?php
session_start();
require 'Slim/Slim.php';

$app = new Slim();

$app->get('/utenti', 'getUtenti');
$app->get('/utenti/:id', 'getUtente');
$app->get('/utenti/search/:query', 'findByName');
$app->get('/utenti/:id/peso', 'getPeso');
$app->get('/utenti/:id/altezza', 'getAltezza');
$app->get('/utenti/:id/sesso', 'getSesso');
$app->get('/utenti/:id/circonferenza_torace', 'getCirconferenzaTorace');
$app->get('/utenti/:id/girovita', 'getGirovita');
$app->get('/utenti/:id/lunghezza_braccio', 'getLunghezzaBraccio');
$app->get('/utenti/:id/lunghezza_gamba', 'getLunghezzaGamba');
$app->get('/utenti/:id/circonferenza_fianchi', 'getCirconferenzaFianchi');
$app->get('/utenti/:id/circonferenza_bacino', 'getCirconferenzaBacino');
$app->get('/utenti/:id/circonferenza_coscia_a', 'getCirconferenzaCosciaAlto');
$app->get('/utenti/:id/circonferenza_coscia_g', 'getCirconferenzaCosciaGinocchio');
$app->get('/utenti/:id/lunghezza_coscia', 'getLunghezzaCoscia');
$app->get('/utenti/:id/lunghezza_tibia', 'getLunghezzaTibia');
$app->get('/utenti/:id/circonferenza_bicipite', 'getCirconferenzaBicipite');
$app->get('/utenti/:id/lunghezza_omero', 'getLunghezzaOmero');
$app->get('/utenti/:id/lunghezza_avambraccio', 'getLunghezzaAvambraccio');
$app->get('/utenti/:id/larghezza_spalle', 'getLarghezzaSpalle');
$app->get('/utenti/:id/larghezza_torace', 'getLarghezzaTorace');
$app->get('/utenti/:id/larghezza_girovita', 'getLarghezzaGirovita');
$app->get('/utenti/:id/larghezza_fianchi', 'getLarghezzaFianchi');
$app->get('/utenti/:id/larghezza_bacino', 'getLarghezzaBacino');
$app->get('/utenti/:id/distanza_cresta_illiaca', 'getDistanzaCrestaIlliaca');
$app->get('/utenti/:id/distanza_malleolo', 'getDistanzaMalleoloPavimento');
$app->post('/utenti', 'addUtente');
$app->put('/utenti/:id', 'updateUtente');
$app->delete('/utenti/:id',	'deleteUtente');

$app->run();


//funzione get, prende tutti gli utenti
function getUtenti() {
	$sql = "select * FROM utente ORDER BY nome";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$utenti = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"utente": ' . json_encode($utenti) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//funzione get, prende l'utente che ha $id come id
function getUtente($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT *	 FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getPeso($id) {
	//echo "sessione: " . $_SESSION['id'] . "<br>";
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT peso	FROM utente WHERE id=:id";
		try {
			$db = getConnection();
			$stmt = $db->prepare($sql);  
			$stmt->bindParam("id", $id);
			$stmt->execute();
			$utente = $stmt->fetchObject();  
			$db = null;
			echo json_encode($utente); 
		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	} else { 
		echo "<h1>Non puoi accedere a queste informazioni.</h1>";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getSesso($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT sesso FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getAltezza($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT altezza FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaTorace($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_torace	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getGirovita($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT girovita	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaBraccio($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT lunghezza_braccio FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaGamba($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT lunghezza_gamba FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaFianchi($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_fianchi FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaBacino($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_bacino	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaCosciaAlto($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_coscia_a	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaCosciaGinocchio($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_coscia_g	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaCoscia($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT lunghezza_coscia	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaTibia($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
		$sql = "SELECT lunghezza_tibia	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getCirconferenzaBicipite($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT circonferenza_bicipite	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaOmero($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT lunghezza_omero	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLunghezzaAvambraccio($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT lunghezza_avambraccio	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLarghezzaSpalle($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT larghezza_spalle	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLarghezzaTorace($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT larghezza_torace	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLarghezzaGirovita($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT larghezza_girovita	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLarghezzaFianchi($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT larghezza_fianchi	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getLarghezzaBacino($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT larghezza_bacino	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getDistanzaCrestaIlliaca($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT distanza_cresta_illiaca	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

function getDistanzaMalleoloPavimento($id) {
	if(isset($_SESSION['id']) && $_SESSION['id'] ==$id || $_SESSION['id']==0){
	$sql = "SELECT distanza_malleolo	FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$utente = $stmt->fetchObject();  
		$db = null;
		echo json_encode($utente);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	} else { 
		echo "Non puoi accedere a queste informazioni.";
		?><br><a href='http://localhost/proof/social/'>Torna indietro</a><?php
	}
}

//funzione add, crea l'utente
function addUtente() {
	$request = Slim::getInstance()->request();
	$utente = json_decode($request->getBody());
	$sql = "INSERT INTO utente (nome, cognome, sesso, peso, altezza, circonferenza_torace, girovita, circonferenza_fianchi, circonferenza_bacino, circonferenza_coscia_a, circonferenza_coscia_g, lunghezza_coscia, lunghezza_tibia, circonferenza_bicipite, lunghezza_omero, lunghezza_avambraccio, larghezza_spalle, larghezza_torace, larghezza_girovita, larghezza_fianchi, larghezza_bacino, distanza_cresta_illiaca, distanza_malleolo) 
	VALUES (:nome, :cognome, :sesso, :peso, :altezza, :circonferenza_torace, :girovita, :circonferenza_fianchi,	:circonferenza_bacino, :circonferenza_coscia_a,	:circonferenza_coscia_g, :lunghezza_coscia,	:lunghezza_tibia, :circonferenza_bicipite, :lunghezza_omero, :lunghezza_avambraccio, :larghezza_spalle, :larghezza_torace, :larghezza_girovita, :larghezza_fianchi, :larghezza_bacino, :distanza_cresta_illiaca, :distanza_malleolo)";
	
	
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("nome", $utente->nome);
		$stmt->bindParam("cognome", $utente->cognome);
		$stmt->bindParam("sesso", $utente->sesso);
		$stmt->bindParam("peso", $utente->peso);
		$stmt->bindParam("altezza", $utente->altezza);
		$stmt->bindParam("circonferenza_torace", $utente->circonferenza_torace);
		$stmt->bindParam("girovita", $utente->girovita);
		$stmt->bindParam("lunghezza_braccio", $utente->lunghezza_braccio);
		$stmt->bindParam("lunghezza_gamba", $utente->lunghezza_gamba);
		$stmt->bindParam("circonferenza_fianchi", $utente->circonferenza_fianchi);
		$stmt->bindParam("circonferenza_bacino", $utente->circonferenza_bacino);
		$stmt->bindParam("circonferenza_coscia_a", $utente->circonferenza_coscia_a);
		$stmt->bindParam("circonferenza_coscia_g", $utente->circonferenza_coscia_g);
		$stmt->bindParam("lunghezza_coscia", $utente->lunghezza_coscia);
		$stmt->bindParam("lunghezza_tibia", $utente->lunghezza_tibia);
		$stmt->bindParam("circonferenza_bicipite", $utente->circonferenza_bicipite);
		$stmt->bindParam("lunghezza_omero", $utente->lunghezza_omero);
		$stmt->bindParam("lunghezza_avambraccio", $utente->lunghezza_avambraccio);
		$stmt->bindParam("larghezza_spalle", $utente->larghezza_spalle);
		$stmt->bindParam("larghezza_torace", $utente->larghezza_torace);
		$stmt->bindParam("larghezza_girovita", $utente->larghezza_girovita);
		$stmt->bindParam("larghezza_fianchi", $utente->larghezza_fianchi);
		$stmt->bindParam("larghezza_bacino", $utente->larghezza_bacino);
		$stmt->bindParam("distanza_cresta_illiaca", $utente->distanza_cresta_illiaca);
		$stmt->bindParam("distanza_malleolo", $utente->distanza_malleolo);
		$stmt->execute();
		$utente->id = $db->lastInsertId();
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//funzione update, aggiorna l'utente che ha $id come id
function updateUtente($id) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$utente = json_decode($body);
	$sql = "UPDATE utente SET nome=:nome, cognome=:cognome, sesso=:sesso, peso=:peso, altezza=:altezza, circonferenza_torace=:circonferenza_torace, girovita=:girovita, lunghezza_braccio=:lunghezza_braccio, lunghezza_gamba=:lunghezza_gamba, circonferenza_fianchi=:circonferenza_fianchi, circonferenza_bacino=:circonferenza_bacino, circonferenza_coscia_a=:circonferenza_coscia_a,	circonferenza_coscia_g=:circonferenza_coscia_g, lunghezza_coscia=:lunghezza_coscia,	lunghezza_tibia=:lunghezza_tibia, circonferenza_bicipite=:circonferenza_bicipite, lunghezza_omero=:lunghezza_omero, lunghezza_avambraccio=:lunghezza_avambraccio, larghezza_spalle=:larghezza_spalle, larghezza_torace=:larghezza_torace, larghezza_girovita=:larghezza_girovita, larghezza_fianchi=:larghezza_fianchi, larghezza_bacino=:larghezza_bacino, distanza_cresta_illiaca=:distanza_cresta_illiaca, distanza_malleolo=:distanza_malleolo WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("nome", $utente->nome);
		$stmt->bindParam("cognome", $utente->cognome);
		$stmt->bindParam("sesso", $utente->sesso);
		$stmt->bindParam("peso", $utente->peso);
		$stmt->bindParam("altezza", $utente->altezza);
		$stmt->bindParam("id", $id);
		$stmt->bindParam("circonferenza_torace", $utente->circonferenza_torace);
		$stmt->bindParam("girovita", $utente->girovita);
		$stmt->bindParam("lunghezza_braccio", $utente->lunghezza_braccio);
		$stmt->bindParam("lunghezza_gamba", $utente->lunghezza_gamba);
		$stmt->bindParam("circonferenza_fianchi", $utente->circonferenza_fianchi);
		$stmt->bindParam("circonferenza_bacino", $utente->circonferenza_bacino);
		$stmt->bindParam("circonferenza_coscia_a", $utente->circonferenza_coscia_a);
		$stmt->bindParam("circonferenza_coscia_g", $utente->circonferenza_coscia_g);
		$stmt->bindParam("lunghezza_coscia", $utente->lunghezza_coscia);
		$stmt->bindParam("lunghezza_tibia", $utente->lunghezza_tibia);
		$stmt->bindParam("circonferenza_bicipite", $utente->circonferenza_bicipite);
		$stmt->bindParam("lunghezza_omero", $utente->lunghezza_omero);
		$stmt->bindParam("lunghezza_avambraccio", $utente->lunghezza_avambraccio);
		$stmt->bindParam("larghezza_spalle", $utente->larghezza_spalle);
		$stmt->bindParam("larghezza_torace", $utente->larghezza_torace);
		$stmt->bindParam("larghezza_girovita", $utente->larghezza_girovita);
		$stmt->bindParam("larghezza_fianchi", $utente->larghezza_fianchi);
		$stmt->bindParam("larghezza_bacino", $utente->larghezza_bacino);
		$stmt->bindParam("distanza_cresta_illiaca", $utente->distanza_cresta_illiaca);
		$stmt->bindParam("distanza_malleolo", $utente->distanza_malleolo);
		$stmt->execute();
		$db = null;
		echo json_encode($utente); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//funzione delete, cancella l'utente che ha $id come id
function deleteUtente($id) {
	$sql = "DELETE FROM utente WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//funzione di search, mostra i dati dell'utente che ha come per nome $query
function findByName($query) {
	$sql = "SELECT * FROM utente WHERE UPPER(nome) LIKE :query ORDER BY nome";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$query = "%".$query."%";  
		$stmt->bindParam("query", $query);
		$stmt->execute();
		$utenti = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"utente": ' . json_encode($utenti) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//funzione di connessione al database
function getConnection() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="social";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>