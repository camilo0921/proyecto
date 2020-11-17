 
$(document).ready(function(){

    $(document).on("click",".modificarAed",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");

      $.ajax({
          url:url,
          data:"edicion_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal").html(datos);
          }
      });

    });

    $(document).on("click",".eliminarAed",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");
      
      $.ajax({
          url:url,
          data:"edicion_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal2").html(datos);
          }
      });

    });

    $(document).on('click','#registrarEdicion',function(){
      let valorEdicion=$('#edicion_desc').val().trim();

      if (validar('edicion_desc',valorEdicion)) {
        console.log('se pueden enviar los datos al servidor')//aqui ppreparas tu metodo a la manera en como estes enviando los datos
        $('form').attr('onsubmit','return true');
        swal( "¡ Buen trabajo! " , " success " );
         
      }else{
        console.log('no se pueden enviar los datos al servidor')
        $('form').attr('onsubmit','return false');
        swal("Por favor", "rellenar todos los campos!", "error");

      }
    });

    function validar(id,valor){
        let expReg=/^\d{3,}$/;//aceptara solo caracteres entre a-z y A-Z(no acepta numeros ni caracteres especiales)
       
        if (valor.match(expReg)) {//aqui validamos que el valor ingresado por el usuario sea valido
          $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
          $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
          $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                  //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
          return true;

        }else{
          $(`#${id}`).addClass('is-invalid')//
          $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
          $(`span.${id}`).html('No ingrese caracteres especiales y no puede estar vacio!')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
        
        }
        return false;
    }

    $(document).on('keypress','.validarEdic',function(){
      let id=$(this).attr('id');//tomara el nombre de la id del elemento, en este caso solo sera "nombre" y "apellido"(mirar el formulario)
      let valorCampo=$('#'+id).val().trim();//tomara el valor del campo que tenga la id que hemos mapeado
      // ejecutamos la funcion para validar. (mirar funcion en la parte inferior para entenderla)
      validar(id,valorCampo)
    });

});