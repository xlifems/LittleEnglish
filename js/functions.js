$(document).ready(function (){

 $("#form_usuario").submit(function(e) {
	e.preventDefault();
	var data = $(this).serializeArray();
	$.post("ajax/ajax_actions.php", {data, accion: "registrar_usuario"}, function(resp){
		console.log(data);	
	});
 });

$("#form_terreno").submit(function(e) {
	e.preventDefault();
	var data = $(this).serializeArray();
	$.post("ajax/ajax_actions.php", {data, accion: "registrar_terreno"}, function(resp){
		console.log(data);	
	});
 });

$("#form_vuelo").submit(function(e) {
	e.preventDefault();
	var data = $(this).serializeArray();
	$.post("ajax/ajax_actions.php", {data, accion: "registrar_vuelo"}, function(resp){
		console.log(data);	
	});
 });


$.getJSON("ajax/ajax_actions.php", {accion: 'cargar_clientes' }, function( data ){
	var items = [];
	$.each( data, function( key, val ) {		 			
   		items.push( "<option value='" + val.usuario_id+ "'>" + val.usuario_nombres+" "+val.usuario_apellidos + "</option>" );
	});
	$("#ins_persona_id").html(items);
});	

$.getJSON("js/departamentos.json", function (data){
	 var items = [];		 
	 $.each( data, function( key, val ) {
	    items.push( "<option value='" + val.id + "'>" + val.value + "</option>" );
	 });
	 $("#usuario_departamento").html(items);
});

$("#usuario_departamento").on("change", function(){
	 	var id = $(this).val();		 	
	 	$.getJSON("ajax/ajax_actions.php", {id:id, accion: 'cargar_municipios' }, function( data ){
	 		var items = [];
	 		$.each( data, function( key, val ) {		 			
			   items.push( "<option value='" + val.id_municipio+ "'>" + val.descripcion + "</option>" );
			});
			$("#usuario_ciudad").html(items);
	 	});		 	
});


});