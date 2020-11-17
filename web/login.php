<?php
    include_once '../lib/helpers.php';
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Inicio Sesion</title>
    <link rel="Stylesheet" href="assets/css/formusuario.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body style="background-color: slateblue;">
<form action="<?php echo getUrl("Acceso","Acceso","login",false,"ajax"); ?>" method="POST" onsubmit="">
    <div id="login">
        <!--<center><img class="image" src="assets/img/logo1.png" border="1" alt="Error al cargar imagen"></center>-->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Inicio Sesion</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input name="user" type="text" placeholder="Ingrese su correo" class="form-control validarU" id="user">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="pass" id="pass" placeholder="*******" class="form-control validarCo">
                            </div>
                            <div class="form-groupB">
                                <input type="submit" value="ENVIAR" name="botoncito" class="btn btn-info btn-md" id="ingresarLogin">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>