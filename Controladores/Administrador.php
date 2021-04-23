<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Administrador extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function administrador()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Administrador - Nubecitas de Colores";
        $data['page_title'] = "Administrador - Nubecitas de Colores";
        $data['page_name'] = "administrador";
        $this->views->getView($this,"administrador",$data);
    }
}
