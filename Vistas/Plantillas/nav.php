<nav >
    <input type="checkbox" id="btn_menu">
    <label for="btn_menu"><img src="<?= mediaEdwinimages(); ?>iconos/menu.png"> Menu </label>
    <div class="menu">
        <ul>
            <li><a href="<?= base_url(); ?>tienda">Inicio</a></li>
            <li><a href="<?php base_url(); ?>loMasVisto">Lo mas Visto</a></li>
            <li><a href="<?php base_url(); ?>seLeTrae"><span>Se le trae</span></a></li>
            <li><a href="<?php base_url(); ?>Ofertas"><span>Ofertas</span></a></li>
            <li><a href="<?php base_url(); ?>logout"><span>Cerrar Sesion</span></a></li>
        </ul>
    </div>
</nav>