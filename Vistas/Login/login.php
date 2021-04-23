<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">                
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">        
        <title><?php echo $data['page_tag']; ?></title>
        <link rel="shortcut icon" href="<?= mediaEdwinimages(); ?>/Logo.ico">
        <link rel="stylesheet" type="text/css" href="<?= mediaEdwincss(); ?>/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?= mediaEdwincss(); ?>/form_NB_css.css">        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >	
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">	
        <link type="text/javascript" href="<?= mediaEdwinjs(); ?>/js/index_NB_js.js">	
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body>

        <!-- Esta parte pone fondo rosado redirecciona a home-->
        <a href="<?php base_url(); ?>home"><div class="gray"></div></a>

        <!-- Esta parte es la que se ve formulario -->
        <form class="formulario" action="tienda" method="POST">
            <h1>Inicio de Sesion</h1>            
            <div class="contenedor">
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="txtUsu" id="txtUsu" value="" placeholder="Email">
                </div>
                <div class="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" name="txtPass" id="txtPass" value="" placeholder="Contraseña">
                </div>
                <label>
                    <input type="checkbox"> Recuérdame
                </label>
                <input type="submit" name="verificar" value="Verificar" class="button">
                <div>
                    <p>- Verificación Credenciales -</p>
                    <a href="#"> Olvidaste tu Contraseña</a>
                </div>
                <div id="alertLogin" class= "text-center"></div>
                <p>¿Si aún no tienes una cuenta? <a class="link" href="<?php base_url(); ?>sign_in"> Registrate</a></p>
            </div>
        </form>

        <!-- Fondo no se usa -->
        <header>            
            <div class="imagen">
                <img src="<?= mediaEdwinimages(); ?>/Logo.PNG"  alt="Logo">	
            </div>
            <div class="titulo">			
                <h1 class="titulo__h1">NUBECITAS DE COLORES</h1>
            </div>
            <script src="<?= mediaEdwinjs(); ?>/index_NB_js.js"></script>
        </header>

        <section>
            <h1 class="section__h1">TODO PARA TU BEBE</h1>
            <br>
            <div class="section__div">
                <a class="section__a1" href="" id="link1"><img src="" id="imagen1"></a>
                <a class="section__a2" href="" id="link2"><img src="" id="imagen2"></a>
                <a class="section__a3" href="" id="link3"><img src="" id="imagen3"></a>
            </div>
        </section>

        <footer class="footer">
            <h3>Derechos Reservados</h3>
        </footer>
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script src="<?= $data['page_functions_js']; ?>"></script>        

    </body>

</html>


