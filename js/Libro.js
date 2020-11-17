$(document).ready(function(){


    $(document).on("click",".modificarL",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");
      
      $.ajax({
          url:url,
          data:"libro_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal").html(datos);
          }
      });

    });

    $(document).on("click","#cambiarF",function(){
      $("#cambiarFoto").html("<input type='file' name='libro_foto'>")
    });
    
    $(document).on("click",".estadoLibro",function(){
      var url=$(this).attr("data-url");
      var id=$(this).attr("data-id");
      var estado=$(this).attr("data-estado");
      var datos={
          id:id, 
          estado:estado
      }
      console.log(id);
      console.log(estado);
      console.log(url);
      $.ajax({
          url:url,
          data:datos,
          type:"POST",
          success:function(datos){
              $("tbody").html(datos);
              console.log(datos);
          }
      });
    });

    $(document).on("click",".descripcionLibro",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        $.ajax({
          url:url,
          data:"libro_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal2").html(datos);
          }
        });
    });

    $(document).on("click",".prestamoLib",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");


        $.ajax({
          url:url,
          data:"libro_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal3").html(datos);
          }
        });
    });



    $(document).on('click','#registrarLibro',function(){
      let valorLibro=$('#libro_nombre').val().trim();
      let valorGenero=$('#genero_id').val();
      let valorEdicion=$('#edicion_id').val();
      let valorEditorial=$('#editorial_id').val();
      let valorAutor=$('#autor_id').val();
      let valorIdioma=$('#idioma_id').val();
      let valorPagina=$('#libro_pagina').val();
      let valorCantidad=$('#libro_cantidad').val();
      

      if (validar('libro_nombre',valorLibro) && validarPagina('libro_pagina',valorPagina) && validarPagina('libro_cantidad',valorCantidad) && valorGenero!=0 && valorEdicion!=0 && valorEditorial!=0 && valorAutor!=0 && valorIdioma!=0) {
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

    $(document).on('keypress','.validarLib',function(){
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