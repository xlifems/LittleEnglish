var opcionE1 = "";
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

  //Login mediante enter
  $('#password').keypress(function(e) {
    if(e.which == 13) {
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

  $("#opc1, #opc2, #opc3").click( function () {
    var opc = $(this).text();
    opcionE1 = opc.trim();
    play_numeros(convertir_num(opcionE1));
    $(this).addClass('btn-success');
  });

  $("#calificar-e1").click( function () {
    calificar_e1();
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
  var numeroActual = $('#numero');
  var numeroSiguiente = parseInt(numeroActual.attr('class')) + 1;
  numeroActual.removeClass(numeroActual.attr('class'));

  if (numeroSiguiente > 10){
    numeroSiguiente = 1 ;
    numeroActual.removeClass(numeroActual.attr('class'));
    swal("Lección completada!", "Hemos escuchemos como suenan los números!", "success")
  }
  numeroActual.attr('src','img/numeros/'+numeroSiguiente+'.png');
  numeroActual.addClass(''+numeroSiguiente);
}

function next_e1() {
  var opciones = ['e1','e2','e4','e5','e8'];
  var numeroActual = $('#numero_e1');
  var numeroSiguiente = "";

  for (i = 0; i < opciones.length; i++) {
    if ( numeroActual.attr('class') == opciones[i]) {
      numeroSiguiente = opciones[i+1];
    }
  }
  numeroActual.attr('src','img/numeros/'+numeroSiguiente+'.png');
  numeroActual.removeClass(numeroActual.attr('class'));
  numeroActual.addClass(''+numeroSiguiente);
  asignar_opciones(numeroSiguiente);
}

function calcular_respuesta_e1(){
  var respuesta = "";
  var numeroActual = $('#numero_e1').attr('class');
  if (numeroActual == 'e1') {
    respuesta = "One";
  } else if (numeroActual == 'e2') {
    respuesta = "Two";
  } else if (numeroActual == 'e4') {
    respuesta = "Four";
  } else if (numeroActual == 'e5') {
    respuesta = "Five";
  } else if (numeroActual == 'e8') {
    respuesta = "Eight";
  }
  return respuesta;
}

function calificar_e1() {
  if (calcular_respuesta_e1() === opcionE1 ){
    swal("Ok!", "Respuesta Correcta!", "success");
    next_e1();
  }else {
    sweetAlert("Oops... ", "Respuesta incorrecta!", "error");
  }
}

function asignar_opciones(valor) {
  var opc1 = $('#opc1');
  var opc2 = $('#opc2');
  var opc3 = $('#opc3');
  if (valor == 'e2') {
    opc1.text('One');
    opc2.text('Six');
    opc3.text('Two');
  }else if (valor == 'e4') {
    opc1.text('Four');
    opc2.text('Three');
    opc3.text('Nine');
  }else if (valor == 'e5') {
    opc1.text('Ten');
    opc2.text('Seven');
    opc3.text('Five');
  }else if (valor == 'e8') {
    opc1.text('Eight');
    opc2.text('Three');
    opc3.text('Two');
  }
}

function convertir_num(numero) {
  var num = 0;
  switch (numero) {
    case 'One':
    num = 1;
    break;
    case 'Two':
    num = 2;
    break;
    case 'Three':
    num = 3;
    break;
    case 'Four':
    num = 4;
    break;
    case 'Five':
    num = 5;
    break;
    case 'Six':
    num = 6;
    break;
    case 'Seven':
    num = 7;
    break;
    case 'Eight':
    num = 8;
    break;
    case 'Nine':
    num = 9;
    break;
    case 'Ten':
    num = 10;
    break;
    default:
      num = 0;
  }
  return num;
}


function functionName() {
  sweetAlert("Oops...", "Something went wrong!", "error");
}
