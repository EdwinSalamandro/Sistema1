<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Errors extends Controllers {

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'login');
            die();
        }
        parent::__construct();
    }
    public function notFound() {
         $data['page_id'] = 1;
        $data['page_tag'] = "Error";
        $data['page_title'] = "Página de Error";
        $data['page_name'] = "error";
        $data['page_content'] = "Puede llevar algun comentario";
        $this->views->getView($this, "error",$data);
    }

}

$notFound = new Errors();
$notFound->notFound();
