<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['page_tag'] = "Login - Tienda Virtual";
        $data['page_title'] = "Login";
        $data['page_name'] = "login";
        $data['page_functions_js']="functions_login.js";
        $this->views->getView($this,"login",$data);
    }    
}
