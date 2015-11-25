// The root URL for the RESTful services
var rootURL = "http://localhost/proof/social/api/utenti";

var currentUtente;

// Restituisce la lista degli utenti presenti nel database
findAll();

// Niente da cancellare al primo avvio dell'applicazione
$('#btnDelete').hide();

//Bottone per tornare indietro
$('#btnBack').click(function(){
	parent.history.back();
	return false;	
});

$('#btnLogout').click(function(){
	 $.ajax({
        // set this to the url of your php script for calling the LSC function
        url: 'http://localhost/proof/social/facebook_login_with_php/logout.php?logout',

        // if the result of the ajax request is ok then this function is called
        success: function(response) {
            // the variable 'response' will contain the output from your php script
            // as an example we'll use a javascript alert to show the output of the response
        }
    });
	
	parent.history.back();
	return false;	
});

// barra di cerca, quando si preme il bottone fa la ricerca (findByName) con il valore passato con la label
$('#btnSearch').click(function() {
	search($('#searchKey').val());
	return false;
});

// Trigger search when pressing 'Return' on search key input field
$('#searchKey').keypress(function(e){
	if(e.which == 13) {
		search($('#searchKey').val());
		e.preventDefault();
		return false;
    }
});

//Avvia la creazione di un nuovo utente
$('#btnAdd').click(function() {
	newUtente();
	return false;
});

//Se l'id dell'utente è '', crea un nuovo utente, altrimenti aggiorna i dati dell'utente #utenteId
$('#btnSave').click(function() {
	if ($('#utenteId').val() == '')
		addUtente();
	
	else
		updateUtente();
	return false;
});

//Cancella utente
$('#btnDelete').click(function() {
	deleteUtente();
	location.reload();
	return false;
});

//Se dalla lista degli utenti si sceglie un utente, vengono prelevati i suoi dati e mostrati
$('#utenteList a').live('click', function() {
	findById($(this).data('identity'));
});

//se la label prova è vuota, avvia la ricerca di tutti gli utenti, altrimenti solo dell'utente
function search(searchKey) {
	if (searchKey == '') 
		findAll();
	else
		findByName(searchKey);
}

//Viene nascosto il tasto delete e si resettano i campi del form
function newUtente() {
	$('#btnDelete').hide();
	currentUtente = {};
	renderDetails(currentUtente);
}

//
function findAll() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
}

function findByName(searchKey) {
	console.log('findByName: ' + searchKey);
	$.ajax({
		type: 'GET',
		url: rootURL + '/search/' + searchKey,
		dataType: "json",
		success: renderList 
	});
}

function findById(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			$('#btnDelete').show();
			console.log('findById success: ' + data.name);
			currentUtente = data;
			renderDetails(currentUtente);
		}
	});
}

function addUtente() {
	console.log('addUtente');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL,
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Utente created successfully');
			$('#btnDelete').show();
			$('#utenteId').val(data.id);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addUtente error: ' + textStatus);
		}
	});
}

function updateUtente() {
	console.log('updateUtente');
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: rootURL + '/' + $('#utenteId').val(),
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Utente updated successfully');
			location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updateUtente error: ' + textStatus);
			location.reload();
		}
	});
}

function deleteUtente() {
	console.log('deleteUtente');
	$.ajax({
		type: 'DELETE',
		url: rootURL + '/' + $('#utenteId').val(),
		success: function(data, textStatus, jqXHR){
			alert('Utente deleted successfully');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('deleteUtente error');
		}
	});
}

function renderList(data) {
	// JAX-RS serializes an empty list as null, and a 'collection of one' as an object (not an 'array of one')
	// Serializza una lista vuota come null e una 'collezione di uno' come un oggetto (non un 'array di uno')
	var list = data == null ? [] : (data.utente instanceof Array ? data.utente : [data.utente]);

	$('#utenteList li').remove();
	$.each(list, function(index, utente) {
		$('#utenteList').append('<li class="list-group-item"><a href="#" data-identity="' + utente.id + '">'+utente.nome+' '+utente.cognome+'</a></li>');
	});
}

function renderDetails(utente) {
	$('#utenteId').val(utente.id);
	$('#nome').val(utente.nome);
	$('#cognome').val(utente.cognome);
	$('#sesso').val(utente.sesso);
	$('#peso').val(utente.peso);
	$('#altezza').val(utente.altezza);
	$('#circonferenza_torace').val(utente.circonferenza_torace);
	$('#girovita').val(utente.girovita);
	$('#lunghezza_braccio').val(utente.lunghezza_braccio);
	$('#lunghezza_gamba').val(utente.lunghezza_gamba);
	$('#circonferenza_fianchi').val(utente.circonferenza_fianchi);
	$('#circonferenza_bacino').val(utente.circonferenza_bacino);
	$('#circonferenza_coscia_a').val(utente.circonferenza_coscia_a);
	$('#circonferenza_coscia_g').val(utente.circonferenza_coscia_g);
	$('#lunghezza_coscia').val(utente.lunghezza_coscia);
	$('#lunghezza_tibia').val(utente.lunghezza_tibia);
	$('#circonferenza_bicipite').val(utente.circonferenza_bicipite);
	$('#lunghezza_omero').val(utente.lunghezza_omero);
	$('#lunghezza_avambraccio').val(utente.lunghezza_avambraccio);
	$('#larghezza_spalle').val(utente.larghezza_spalle);
	$('#larghezza_torace').val(utente.larghezza_torace);
	$('#larghezza_girovita').val(utente.larghezza_girovita);
	$('#larghezza_fianchi').val(utente.larghezza_fianchi);
	$('#larghezza_bacino').val(utente.larghezza_bacino);
	$('#distanza_cresta_illiaca').val(utente.distanza_cresta_illiaca);
	$('#distanza_malleolo').val(utente.distanza_malleolo);
	
}

// Funzione di supporto per restituire una stringa JSON 
function formToJSON() {
	return JSON.stringify({
		"id": $('#utenteId').val(), 
		"nome": $('#nome').val(), 
		"cognome": $('#cognome').val(),
		"sesso": $('#sesso').val(),
		"peso": $('#peso').val(),
		"altezza": $('#altezza').val(),
		"circonferenza_torace": $('#circonferenza_torace').val(),
		"girovita": $('#girovita').val(),
		"lunghezza_braccio": $('#lunghezza_braccio').val(),
		"lunghezza_gamba": $('#lunghezza_gamba').val(),
		"circonferenza_fianchi": $('#circonferenza_fianchi').val(),
		"circonferenza_bacino": $('#circonferenza_bacino').val(),
		"circonferenza_coscia_a": $('#circonferenza_coscia_a').val(),
		"circonferenza_coscia_g": $('#circonferenza_coscia_g').val(),
		"lunghezza_coscia": $('#lunghezza_coscia').val(),
		"lunghezza_tibia": $('#lunghezza_tibia').val(),
		"circonferenza_bicipite": $('#circonferenza_bicipite').val(),
		"lunghezza_omero": $('#lunghezza_omero').val(),
		"lunghezza_avambraccio": $('#lunghezza_avambraccio').val(),
		"larghezza_spalle": $('#larghezza_spalle').val(),
		"larghezza_torace": $('#larghezza_torace').val(),
		"larghezza_girovita": $('#larghezza_girovita').val(),
		"larghezza_fianchi": $('#larghezza_fianchi').val(),
		"larghezza_bacino": $('#larghezza_bacino').val(),
		"distanza_cresta_illiaca": $('#distanza_cresta_illiaca').val(),
		"distanza_malleolo": $('#distanza_malleolo').val()
		});
}
