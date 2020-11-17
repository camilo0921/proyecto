$(document).ready(function(){

	$(document).on('click','#ingresarLogin',function(){
	    let valorUsuario=$('#user').val();
	   	let valorContraseña=$('#pass').val();
	    
	    
	    if (validar('user',valorUsuario) && validar('pass',valorContraseña)) {
	      console.log('se pueden enviar los datos al servidor')//aqui ppreparas tu metodo a la manera en como estes enviando los datos
	       $('form').attr('onsubmit','return true');
	       swal( "¡ Buen trabajo! " , " success " );
	       
	    }else{
	      console.log('no se pueden enviar los datos al servidor')
	       $('form').attr('onsubmit','return false');

	       swal("Por favor", "rellenar todos los campos!", "error");

	    }

 	});

	function validarU(id,valor){
       
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

	$(document).on('keypress','.validarU',function(){

	    let id=$(this).attr('id');
	    let Correo=$('#'+id).val().trim();
	    
	    validarCorreo(id,Correo)

	});

	function validarCo(id,valor){
       
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

	$(document).on('keypress','.validarCo',function(){

	    let id=$(this).attr('id');
	    let contraseña=$('#'+id).val().trim();
	    
	    validarContra(id,contraseña)

	});

});