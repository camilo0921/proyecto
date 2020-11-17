$(document).ready(function(){



  function validarEje(id,valor){
      let expReg=/^[0-9]{3}$/;//aceptara solo caracteres entre a-z y A-Z(no acepta numeros ni caracteres especiales)
     
      if (valor.match(expReg)) {//aqui validamos que el valor ingresado por el usuario sea valido
        $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
        $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
        $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
           
        return true;
      }else{
        $(`#${id}`).addClass('is-invalid')//
        $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
        $(`span.${id}`).html('Campo numerico, por favor ingrese los 4 digitos del eje vial')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
      
      }
      return false;
}

$(document).on('keypress','.validarEje',function(){
    let id=$(this).attr('id');//tomara el nombre de la id del elemento, en este caso solo sera "nombre" y "apellido"(mirar el formulario)
    let valorCampo=$('#'+id).val();//tomara el valor del campo que tenga la id que hemos mapeado
    // ejecutamos la funcion para validar. (mirar funcion en la parte inferior para entenderla)

    
     validarEje(id,valorCampo)
  });


  $(document).on("keyup",".validar",function(){
    var cadena=$(this).val();
    var cont=0;
    var noValido='°!"#$|<>_%&/()=@?¡¿"[]*^{.,;:}+-``~';
    for(let a=0;a<cadena.length;a++){
      for(let b=0;b<noValido.length;b++){
        if (cadena[a]==noValido[b]) {
          cont++;
        }
      }
    }

    let id=$(this).attr('id');
    $("span."+id).html('No ingrese caracteres especiales');
    if (cont>0 | cadena.length==0) {
      $(this).removeClass('is-valid'); //quitamos el css 'valido' para el campo y despues agregamos el invalido
      $(this).addClass('is-invalid');
      if (cont>0) {
        $("span."+id).html('No ingrese caracteres especiales');
        $('span.'+id).addClass('caracter');// no deja hacer submit al estar erroneos los datos
        $('span.'+id).removeClass('vacio');
      }else{
        $("span."+id).html('El campo no puede estar vacio');
        $('span.'+id).addClass('vacio');// no deja hacer submit al estar erroneos los datos
        $('span.'+id).removeClass('caracter');
      }
    }else{
      $('span.'+id).removeClass('caracter');
      $('span.'+id).removeClass('vacio');
      $('.form').attr('onsubmit','return true');
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
      $("span."+id).html('');
    }
    // $(".validar").bind("cut copy paste",function(e){
    //   e.prevetDefault();
    // });
  });



});
