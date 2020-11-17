
$(document).ready(function(){


    $(document).on("click",".modificarRev",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        

        $.ajax({
          url:url,
          data:"revista_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal").html(datos);
          }
        });

    });

    $(document).on("click","#cambiar",function(){
      $("#cambiarImagen").html("<input type='file' name='revista_foto'>")
    });

    $(document).on("click",".estadoRevista",function(){
      var url=$(this).attr("data-url");
      var id=$(this).attr("data-id");
      var estado=$(this).attr("data-estado");
      $.ajax({
          url:url,
          data:"revista_id="+id+"&estado_revista="+estado,
          type:"POST",
          success:function(datos){
              $("tbody").html(datos);
              console.log(data);
          }
      });
    });

    

    $(document).on("click",".descripcionRevi",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");

      $.ajax({
        url:url,
        data:"revista_id="+id,
        type:"POST",
        success:function(datos){
            $("#contenido-modal2").html(datos);
        }
      });
    });

    $(document).on('click','#prestamoRevista',function(){
      
      let valorFecha=$('#prestamo_fecha').val();
      let valorLibro=$('#libro_id').val();
      let valorRevista=$('#revista_id').val();
      let valorUsuario=$('#usuario_id').val();
      
      console.log('se pueden enviar los datos al servidor')
        $('form').attr('onsubmit','return true');
        swal("Are you sure you want to do this?", {
          buttons: ["Oh noez!", true],
        });
    });
     
      /*console.log('se pueden enviar los datos al servidor')
        $('form').attr('onsubmit','return true');
        swal( "¡ Buen trabajo! " , " success " );*/

        /*swal("Are you sure you want to do this?", {
          buttons: ["Oh noez!", true],
        });*/


    //});

    $(document).on('click','#registrarRevista',function(){
      let valorRevista=$('#revista_nombre').val().trim();
      let valorGenero=$('#genero_id').val();
      let valorEdicion=$('#edicion_id').val();
      let valorEditorial=$('#editorial_id').val();
      let valorAutor=$('#autor_id').val();
      let valorIdioma=$('#idioma_id').val();
      let valorPagina=$('#revista_pagina').val();
      let valorCantidad=$('#revista_cantidad').val();
    

      if (validar('revista_nombre',valorRevista) && validarPagina('revista_pagina',valorPagina) && validarPagina('revista_cantidad',valorCantidad) && valorGenero!=0 && valorEdicion!=0 && valorEditorial!=0 && valorAutor!=0 && valorIdioma!=0) {
        console.log('se pueden enviar los datos al servidor')
        $('form').attr('onsubmit','return true');
        swal( "¡ Buen trabajo! " , " success " );
       
        }else{
          console.log('no se pueden enviar los datos al servidor')
           $('form').attr('onsubmit','return false');

           swal("Por favor", "rellenar todos los campos!", "error");
           
        }

    });

  function validar(id,valor){
      let expReg=/^[A-Za-z]{3,}(\s[A-Za-z]{0,})*$/;
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

  $(document).on('keypress','.validarRev',function(){
      let id=$(this).attr('id');//tomara el nombre de la id del elemento, en este caso solo sera "nombre" y "apellido"(mirar el formulario)
      let valorCampo=$('#'+id).val().trim();//tomara el valor del campo que tenga la id que hemos mapeado
      // ejecutamos la funcion para validar. (mirar funcion en la parte inferior para entenderla)
       validar(id,valorCampo)
  });

  function validarPagina(id,valor){
       
      let ExpP=/^\d{1,4}$/;
      

      if (valor.match(ExpP)) {
        $(`#${id}`).addClass('is-valid') // de ser valido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
        $(`#${id}`).removeClass('is-invalid')//de ser valido y anteriormente no fue valida, entonces le quitamos la etiqueta 'is-valid'
        $(`span.${id}`).html('')//de ser valido mapeamos el la etiqueta span con la clase del mismo nombre que el id y le borramos el contenido
                                //(importante poner en la etiqueta span la clase con el mismo nombre del id del campo a validar de lo contrario no lo encontrara)
        return true;

      
      }else{
        $(`#${id}`).addClass('is-invalid')//
        $(`#${id}`).removeClass('is-valid') // de ser invalido, le agregamos la clase 'is-valid' que son clases ya prediseñadas de bootstrap
        $(`span.${id}`).html('El numero de paginas debe tener minimo 1.')//de ser invalido debemos agregarle el mensaje a la etiqueta span correspondiente
      }

      return false;
   
  }

  $(document).on('keypress','.validarPagi',function(){

    let id=$(this).attr('id');
    let Pagina=$('#'+id).val().trim();
    
    validarPagina(id,Pagina)

  });


});