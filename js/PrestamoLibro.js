$(document).ready(function(){

    $(document).on("click",".modificarPresL",function(){
      var url = $(this).attr("data-url");
      var id = $(this).attr("data-id");
      
      $.ajax({
          url:url,
          data:"prestamo_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal").html(datos);
          }
      });

    });
    
    $(document).on("click",".descripcionPresLibro",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        $.ajax({
          url:url,
          data:"prestamo_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modal2").html(datos);
          }
        });
    });

    $(document).on('click','#registrarPrestamoLibro',function(){
      let valorFecha=$('#prestamo_fecha').val().trim();
      let valorLibro=$('#libro_id').val();
      let valorUsuario=$('#usuario_id').val();
      
      if (valorFecha!="" && valorLibro!=0 && valorUsuario!=0) {
          console.log('se pueden enviar los datos al servidor')
          $('form').attr('onsubmit','return true');
          swal( "¡ Buen trabajo! " , " success " );
           
      }else{
          console.log('no se pueden enviar los datos al servidor')
          $('form').attr('onsubmit','return false');
          swal("Por favor", "rellenar todos los campos!", "error");
      }

    });

    

});