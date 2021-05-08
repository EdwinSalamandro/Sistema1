<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeLeTrae extends Controllers
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

    public function seLeTrae()
    {
        $data['page_id'] = 1;
        $data['page_tag'] = "Se Le Trae";
        $data['page_title'] = "Se le Trae";
        $data['page_name'] = "seLeTrae";
        $data['page_content'] = "Puede llevar algun comentario";
        $this->views->getView($this,"seLeTrae",$data);
    }
}
