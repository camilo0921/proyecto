$(document).ready(function(){

    
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

    /*$(document).on("click",".devolverLibro",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        var idL = $(this).attr("data-id2");
        console.log (idL);
        console.log (id);
        $.ajax({
          url:url,
          data:"prestamo_id="+id + "libro_id="+idL,
          type:"POST",
          success:function(datos){
              $("#contenido-modal4").html(datos);
          }
        });
    });*/

    /*$(document).on("click",".devolverLibro",function(){
      var url=$(this).attr("data-url");
      var id=$(this).attr("data-id");
      var idL = $(this).attr("data-id2");
      var datos={
          id:prestamo_id, 
          idL:libro_id
      }
      
      $.ajax({
          url:url,
          data:datos,
          type:"POST",
          success:function(datos){
              $("#contenido-modalLi").html(datos);
          }
      });
    });*/

    $(document).on("click",".devolverLi",function(){
      var url=$(this).attr("data-url");
      var id=$(this).attr("data-id");
      var idL=$(this).attr("data-idD");
      var misdatos={
          prestamo_id:id, 
          libro_id:idL
      }
      console.log (idL);
      console.log (id);
      console.log (url);

      $.ajax({
          url:url,
          data:misdatos,
          type:"POST",
          success:function(datos){
              $("#contenido-modalDevo").html(datos);
              console.log (misdatos);
          }
      });
    });


    $(document).on('click','#registrarPrestamoLibro',function(){
      let valorFecha=$('#prestamo_fecha').val().trim();
      let valorLibro=$('#libro_id').val();
      
      
      if (valorFecha!="" && valorLibro!=0) {
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