<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tienda extends Controllers
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

    public function tienda()
    {
        $data['page_id'] = 4;
        $data['page_tag'] = "Tienda";
        $data['page_title'] = "Tienda";
        $data['page_name'] = "tienda";
        $data['page_content'] = "Puede llevar algun comentario";
        $this->views->getView($this,"tienda",$data);
    }
    public function getProductos2(){
        $arrData = $this->model->selectProductos2();
        //dep($arrData);
        return $arrData;
    }
}
