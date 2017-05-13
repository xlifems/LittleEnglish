$(document).ready(function (){

  /**
  * [description]
  * @param  {[type]} ){                                                     var usuario [description]
  * @param  {[type]} cache: false              }).done(function(resp){                               if(resp [description]
  * @return {[type]}        [description]
  */
  $("#ingresar").click(function (){
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    if (usuario == '' || password == ''){
      console.log("error");
    } else {
      $.ajax({
        url: "ajax/ajax_actions.php",
        type: "POST",
        data: {usuario: usuario, password: password, accion: "login_user"},
        cache: false
      }).done(function(resp){
        if(resp == 1){
          window.location.href = "home.php";
        } else {
          console.log("error logueo");
        }
      })
    }
  });

  $("div.flip").click(function(){
    reproducir_sonido($(this).attr('id'));
  });

  $("#play-vocal").click( function () {
    var vocal = $('#vocal').attr('class');    
    play_vocales(vocal);
  });

  $("#play-numero").click( function () {
    var numero = $('#numero').attr('class');
    play_numeros(numero);
  });

  mostrar_vocal();

  $("#next-vocal").click( function () {
    next_vocal();
  });

  $("#next-numero").click( function () {
    next_numero();
  });

});

function reproducir_sonido(animal) {
  console.log(animal);
  var sonido = new Audio('./sound/animals/'+animal+'.mp3');
  sonido.play();

}

function mostrar_vocal() {
  var vocal = $('#vocal');
  vocal.attr('src','img/vocales/a.png');
  vocal.attr('class','a');
}

function play_vocales(vocal) {
  var sonido = new Audio('./sound/vocales/'+vocal+'.mp3');
  sonido.play();
}

function play_numeros(numero) {
  var sonido = new Audio('./sound/numeros/'+numero+'.mp3');
  sonido.play();
}

function next_vocal() {
  var vocales = ['a','e','i','o','u'];
  var vocalActual = $('#vocal');
  var vocalSiguiente = "";
  for (i = 0; i < vocales.length; i++) {
    if (vocales[i] == vocalActual.attr('class')){
        vocalSiguiente = vocales[i+1];
        vocalActual.removeClass(vocales[i]);
    }
    if ( vocalSiguiente == undefined){
        vocalSiguiente = 'a';
        vocalActual.removeClass(vocales[i]);
    }
  }
  vocalActual.attr('src','img/vocales/'+vocalSiguiente+'.png');
  vocalActual.addClass(vocalSiguiente);
}

function next_numero() {
  var numeros = [0,1,2,3,4,5,6,7,8,9,10];
  var numeroActual = $('#numero');

  var numeroSiguiente = parseInt(numeroActual.attr('class')) + 1;
  numeroActual.removeClass(numeroActual.attr('class'));

  if (numeroSiguiente > 10){
    numeroSiguiente = 1 ;
    numeroActual.removeClass(numeroActual.attr('class'));
  }

  numeroActual.attr('src','img/numeros/'+numeroSiguiente+'.png');
  numeroActual.addClass(''+numeroSiguiente);
}
