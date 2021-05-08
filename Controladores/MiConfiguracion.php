<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MiConfiguracion extends Controllers
{

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'login');
            die();
        }
        parent::__construct();
    }

    public function miConfiguracion()
    {
        $data['page_id'] = 10;
        $data['page_tag'] = "MiConfiguracion";
        $data['page_title'] = "Página de Usuario";
        $data['page_name'] = "miConfiguracion";
        $data['page_content'] = "Puede llevar algun comentario";
        $this->views->getView($this,"miConfiguracion",$data);
    }
    
}
