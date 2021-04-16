<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    // Retorna la url del proyecto
    function base_url(){
        return BASE_URL;
    }
    function media(){
        return BASE_URL."Recursos/";
    }
    function mediaEdwincss(){
        return BASE_URL."Recursos/css/parteEdwin/";
    }
    function mediaEdwinjs(){
        return BASE_URL."Recursos/js/parteEdwin/";
    }
    function mediaEdwinimages(){
        return BASE_URL."Recursos/images/parteEdwin/";
    }
    function mediaStivencss(){
        return BASE_URL."Recursos/css/parteStiven";
    }
    function mediaStivenjs(){
        return BASE_URL."Recursos/js/parteStiven";
    }
    function mediaStivenimages(){
        return BASE_URL."Recursos/images/parteStiven";
    }
    function mediaOscarcss(){
        return BASE_URL."Recursos/css/parteOscar/";
    }
    function mediaOscarjs(){
        return BASE_URL."Recursos/js/parteOscar/";
    }
    function mediaOscarimages(){
        return BASE_URL."Recursos/images/parteOscar/";
    }
    function mediaManuelcss(){
        return BASE_URL."Recursos/css/parteManuel/";
    }
    function mediaManueljs(){
        return BASE_URL."Recursos/js/parteManuel/";
    }
    function mediaManuelimages(){
        return BASE_URL."Recursos/images/parteManuel/";
    }
    //Agregar Template Administrador
    function headerAdmin($data="")
    {
        $view_header = "Vistas/Template/header_admin.php";
        require_once ($view_header);
    }
    function FooterAdmin($data="")
    {
        $view_footer = "Vistas/Template/footer_admin.php";
        require_once ($view_footer);
    }


    // Formatea información
    function dep($data){
        $format  = print_r("<pre>");
        $format .= print_r($data);
        $format .= print_r("</pre>");
        return $format;
    }
    function getModal(string $nameModal, $data)
    {
        $view_modal = "Vistas/Template/Modals/{$nameModal}.php";
        require_once $view_modal;
    }
    
    function headerTienda($data=""){
        $view_header = "Vistas/Plantillas/header.php";
        require_once ($view_header);
    }
    function sectionTienda($data=""){
        $view_section = "Vistas/Plantillas/section.php";
        require_once ($view_section);
    }
    function footerTienda($data=""){
        $view_footer = "Vistas/Plantillas/footer.php";
        require_once ($view_footer);
    }
    
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$strCadena);
        $string = trim($string); // Elimina espacion en blanco al inicio y al final
        $string = stripslashes($string); // Elimina \
        return $string;
    }
    
    function passGenerator($length=10){
        $pass = "";
        $longitudPass = $length;
        $cadena = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz1234567890";
        $longitudCadena = strlen($cadena);
        
        for ($i = 1; $i <= longitudPass ; $i++) {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);            
        }
        return $pass;
    }
    
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token= $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }
    
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }