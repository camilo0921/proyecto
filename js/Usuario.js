 
$(document).ready(function(){


    $(document).on("click",".modificarUsu",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");

      $.ajax({
        url:url,
        data:"usuario_id="+id,
        type:"POST",
        success:function(datos){
            $("#contenido-modal").html(datos);
        }
      });

    });

    $(document).on("click",".descripcionUsu",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        $.ajax({
          url:url,
          data:"usuario_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal2").html(datos);
          }
        });
    });

    $(document).on('click','#registrarUsuario',function(){
      let valorNombre=$('#usuario_nombre').val().trim();
      let valorApellido=$('#usuario_apellidos').val().trim();
      let valorContraseña=$('#usuario_contrasena').val().trim();
      let valorIdentificacion=$('#usuario_identificacion').val().trim();
      let valorTelefono=$('#usuario_telefono').val().trim();
      let valorCorreo=$('#usuario_correo').val().trim();
      let valorRol=$('#rol_id').val();
      let valorfecha=$('#usuario_fecha_nac').val();
      
      if (validar('usuario_nombre',valorNombre) && validar('usuario_apellidos',valorApellido)&& validarContra('usuario_contrasena',valorContraseña) && validarIdentificacion('usuario_identificacion',valorIdentificacion) && validarTel('usuario_telefono',valorTelefono) && validarCorreo('usuario_correo',valorCorreo) && valorRol!=0 && valorfecha!="") {
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
          let expReg=/^[A-Za-z]{3,}(\s[A-Za-z]{0,})*$/;//aceptara solo caracteres entre a-z y A-Z(no acepta numeros ni caracteres especiales)
         
          if (valor.match(expReg)) {//aqui validamos que el valor ingresado por el usuario sea valido
            $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
            $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                    //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
          

            return true;
          }else{
            $(`#${id}`).addClass('is-invalid')//
            $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`span.${id}`).html('No ingrese caracteres especiales, numeros y no puede estar vacio!')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
          
          }
          return false;
    }

    $(document).on('keypress','.validarUsu',function(){
        let id=$(this).attr('id');//tomara el nombre de la id del elemento, en este caso solo sera "nombre" y "apellido"(mirar el formulario)
        let valorCampo=$('#'+id).val().trim();//tomara el valor del campo que tenga la id que hemos mapeado
        // ejecutamos la funcion para validar. (mirar funcion en la parte inferior para entenderla)
        validar(id,valorCampo)
      });


    $(document).on('keypress','.validarContraseña',function(){

        let id=$(this).attr('id');
        let contraseña=$('#'+id).val().trim();
        
        validarContra(id,contraseña)

    });

     function validarContra(id,valor){
           
          let ExrA = /^[A-Z]+[A-Za-z]{3,}\d{4,}$/;
          //let ExrA = / [A-Z]{1}[a-z]{2,}\d{5,}/
          //let ExrA = /^([A-Za-z][._-]){4,}+\d{2,}$/;

          if (valor.match(ExrA)) {
             $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
            $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                    //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
            return true;

          
          }else{
             $(`#${id}`).addClass('is-invalid')//
            $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`span.${id}`).html('Su contraseña debe tener al menos 1 MAYUSCULA, 3 MINUSCULAS y 5 DIGITOS')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
          }

          return false;
       
    }
    function validarIdentificacion(id,valor){
           
          let ExpI = /^\d{7,9}$/;
          

          if (valor.match(ExpI)) {
             $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
            $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                    //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
            return true;

          
          }else{
             $(`#${id}`).addClass('is-invalid')//
            $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`span.${id}`).html('Su numero de Identificacion debe tener minimo 8 y maximo 10 digitos')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
          }

          return false;
       
    }

    $(document).on('keypress','.validarId',function(){

        let id=$(this).attr('id');
        let Identificacion=$('#'+id).val().trim();
        
        validarIdentificacion(id,Identificacion)

    });

    function validarTel(id,valor){
           
          let ExpT = /^\d{6,9}$/;
          

          if (valor.match(ExpT)) {
             $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
            $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                    //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
            return true;

          
          }else{
             $(`#${id}`).addClass('is-invalid')//
            $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`span.${id}`).html('Su numero de Telefono debe tener minimo 7 maximo 10 digitos.')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
          }

          return false;
       
    }

    $(document).on('keypress','.validarTel',function(){

        let id=$(this).attr('id');
        let Telefono=$('#'+id).val().trim();
        
        validarTel(id,Telefono)

    });

    function validarCorreo(id,valor){
           
          let ExpC = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
          

          if (valor.match(ExpC)) {
             $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
            $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                    //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
            return true;

          
          }else{
             $(`#${id}`).addClass('is-invalid')//
            $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
            $(`span.${id}`).html('Correo Invalido por favor verifique el campo')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
          }

          return false;
       
    }

    $(document).on('keypress','.validarCorreo',function(){

        let id=$(this).attr('id');
        let Correo=$('#'+id).val().trim();
        
        validarCorreo(id,Correo)

    });

});



 