<?php headerTienda($data); ?>
<section>        
    <div class="h2"><h2><?= $data['page_title']; ?></h2></div>
    
    <?php 
    $obj = new Tienda();
        $data =$obj->getProductos2();
        // dep($data);
        
        foreach ($data as $k) { ?>
    <div class="images">
        <div class="cont">
        <a class="section__a1" href=""><img src="data:image/png;base64,<?php echo base64_encode($k->imagen); ?>"></a>	
            <ul>                
                <li><?php echo $k->nombre; ?></li>
                <li><?php echo "$".formatMoney($k->precio); ?></li>
            </ul>							
        </div>
        <?php 
        }
        ?>
    </div>
</section>
<?php footerTienda($data); 
/* Edwin Salamandro */ ?>    
