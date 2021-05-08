<!--
    AUTOR: EDWIN SALAMANDRO
--> 

<!DOCTYPE html>
<html lang="es" dir="ltr">

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="E-commerce Ropa Bebe" />
        <meta name="keywords" content="Ropa Bebe Niños Niñas" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
        <title><?php echo $data['page_tag']; ?></title>
        <link href="<?= mediaEdwincss() ?>/_10header.css" rel="stylesheet" type="text/css"/>        
        <link href="<?= mediaEdwincss() ?>/_20menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?= mediaEdwincss() ?>/_30nav.css" rel="stylesheet" type="text/css"/>
        <link href="<?= mediaEdwincss() ?>/_50section.css" rel="stylesheet" type="text/css"/>
        <link href="<?= mediaEdwincss() ?>/_51tarjetas.css" rel="stylesheet" type="text/css"/>
        <link href="<?= mediaEdwincss() ?>/_70footer.css" rel="stylesheet" type="text/css"/>        
        <link href="<?= mediaEdwincss() ?>/<?php echo $data['page_name']; ?>_NB_css.css" rel="stylesheet" type="text/css"/>        
        
    </head>

    <body>

        <header>
            <a href="tienda">
                <img src="<?= mediaEdwinimages(); ?>/Logo1.png" alt="Nubecitas de Colores">
            </a>
            <div class="header__div">
                <h1>NUBECITAS DE COLORES</h1>
                <div>
                    <ul class="header__div-ul">
                        <li><a href="<?php base_url(); ?>tienda">Inicio</a></li>
                        <li><a href="">Categorias<img class="icono" src="<?= mediaEdwinimages(); ?>/iconos/mano.png"></a>
                            <ul class="subMenu">
                                <li><a href="">Ropa</a></li>
                                <li><a href="">Juguetes</a></li>
                                <li><a href="">Zapatos</a></li>
                            </ul>
                        </li>                    
                        <li><a href="<?php base_url(); ?>loMasVisto">Lo mas visto</a></li>
                        <li><a href="ofertas">Ofertas</a></li>
                        <li><a href="seLeTrae">Se le trae</a></li>
                        <li><a href=""> <?php echo $_SESSION['userData']['nombres']; ?> <img class="icono" src="<?= mediaEdwinimages(); ?>/iconos/mano.png"></a>
                            <ul class="subMenu">
                                <li><a href="<?php base_url(); ?>miConfiguracion">miConfiguracion</a></li>
                                <li><a href="<?php base_url(); ?>">Mis compras</a></li>
                                <li><a href="<?php base_url(); ?>favoritos">Mis favoritos</a></li>
                                <li><a href="noEsta">PQRS</a></li>
                                <li><a href="<?= base_url(); ?>logout">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <?php require_once ('nav.php'); ?>