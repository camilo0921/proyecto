<?php

@session_start();

    function redirect($url){
        echo "<script type='text/javascript'>"
             ."window.location.href='$url'"
             ."</script>";
    }
    function dd($var){                  //imprimir el valor que es lo que esta llegando lo que tengo en una variable
        echo "<pre>";
        die(print_r($var));
    }
    function getUrl($modulo,$controlador,$funcion,$parametro=false,$pagina=false){
    if (!$pagina) {
        $pagina="index";
    }

        $url="$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
  
        if ($parametro!=false){
            foreach($parametro as $key => $valor){
                $url.="&$key=$valor";
            }
        }
        return $url;
    }
    function resolve(){
        $modulo=ucwords($_GET['modulo']);                       // ucwords sirve para mostrar la primera letra en mayuscula
        $controlador=ucwords($_GET['controlador']);            // sin afectar el envio de archivos
        $funcion=$_GET['funcion'];

        if(is_dir("../controller/$modulo")){

            if(file_exists("../controller/$modulo/".$controlador."Controller.php")){

                include_once "../controller/$modulo/".$controlador."Controller.php";
                $nombreClase=$controlador."Controller";
                $objeto=new $nombreClase();
                if(method_exists($objeto,$funcion)){
                    $objeto->$funcion();
                }else{
                    echo "La funcion especificada no existe";
                }
            }else{
                echo "El controlador especificado no existe";
            }
        }else{
            echo "El modulo especificado no existe";
        }
    }
?>