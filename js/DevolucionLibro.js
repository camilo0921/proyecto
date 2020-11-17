$(document).ready(function(){

    
    $(document).on("click",".descripcionDevLibro",function(){
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        $.ajax({
          url:url,
          data:"devolucion_id="+id,
          type:"POST",
          success:function(datos){
              $("#contenido-modall").html(datos);
          }
        });
    });
});
