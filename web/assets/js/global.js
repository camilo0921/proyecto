$(document).ready(function(){
    //Spanish

    $(document).on("keyup","#buscar",function(){

        var valor=$(this).val();

        $.ajax({
            url: "../../controler/departamento/filtro.php",
            data: "depto="+valor,
            type: "GET",
            success: function(datos){
                $("tbody").html(datos);
            }
        });
    });

    $(document).on("keyup","#filtro",function(){

        var valor=$(this).val();

        $.ajax({
            url: "../../controler/ciudad/filtro.php",
            data: "valor="+valor,
            type: "POST",
            success: function(datos){
                $("tbody").html(datos);
            }
        });
    });
    $(document).on("keyup",".validar",function(){
        var cadena=$(this).val();
        var cont=0;
        var noValido='|°!"#$%&/()=?¡¿¨+´}{-.,;:_[]@<>';

        for (let a = 0; a < cadena.length; a++){
            for (let b = 0; b < noValido.length; b++){
                if (cadena[a]==noValido[b]){
                    cont++;
                }
            }
        }
        if (cont>0){
            $(this).val(cadena.substr(0,cadena.lenght-1));
        }
    });

    $(document).on("keyup",".validacion",function(){
        var cadena=$(this).val();
        var cont=0;
        var noValido='|°!"#$%&/()=?¡¿¨+´}{-.,;:_[]@<>';

        for (let a = 0; a < cadena.length; a++){
            for (let b = 0; b < noValido.length; b++){
                if (cadena[a]==noValido[b]){
                    cont++;
                }
            }
        }
        if (cont>0){
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            $("#ciudad").html("<p class='text-danger'>No ingrese Caracteres especiales</p>");
        }else{
            $(this).addClass('is-valid');
            $(this).removeClass('is-invalid');
            $("#ciudad").html("");
        }
    });


    $(".validar").bind("cut copy paste",function(e){
        e.preventDefault();
    });

    $(document).on("click","#cambiar",function(){
        
        $("#cambiarImagen").html("<input type='file' name='imagen'>");
    });

    $(document).on("change","#depto",function() {
            var depto=$(this).val();
            var url=$(this).attr('data-url');

            $.ajax({
                url:url,
                type:"POST",
                data:"depto="+depto,
                success:function(datos){
                    $("#ciudad").html(datos);
                }

            });
    });
    $(document).on("click","#imagen",function(){
        
        $("#imagen").html("<label>Foto</label> <input type='file' name='usuario_foto'>");
    });

    
    

    $(document).on("click",".estado",function(){

         var url = $(this).attr("data-url");
         alert(url)
         var id = $(this).attr("data-id");
         var estado = $(this).attr("data-estado");

      

   $.ajax({
    url:url,
    data:"id="+id+"&estado="+estado,
    type:"POST",
    success:function(datos){
        $("tbody").html(datos);
    }
   });
});

  
    $(document).on("click","#botonColor",function(){
      var contenido=$("#copyColor").html();
      $("#color").append("<div class='form-group'>"
                          +contenido+
                          "<div class=''>"
                          +"<button class=''>"
                          +"</div>");

    });
    $(document).on("click","#quitarColor",function(){

     $(this).parent().parent().remove();
    });
     
     

    });




