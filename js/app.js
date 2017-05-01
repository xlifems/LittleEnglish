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

  });


function reproducir_sonido(animal) { 
  console.log(animal);
  var sonido = new Audio('./sound/animals/'+animal+'.mp3');
  sonido.play(); 

}