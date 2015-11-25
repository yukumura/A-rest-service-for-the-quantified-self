// The root URL for the RESTful services
var rootURL = "http://localhost/proof/social/api/utenti";

var currentUtente;

$('#btnSave').click(function() {
	updateUtente();
	location.reload();
	return false;
});

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
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updateUtente error: ' + textStatus);
		}
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

function formToJSONid() {
	return JSON.stringify({
		"id": $('#utenteId').val()
		});
}
