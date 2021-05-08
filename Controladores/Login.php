<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends Controllers{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['login']))
        {
            header('Location: '.base_url().'tienda');
        }
        parent::__construct();
    }

    public function login()
    {
        $data['page_tag'] = "Login - Tienda Virtual";
        $data['page_title'] = "Login - Nubecitas";
        $data['page_name'] = "login";
        $data['page_functions_js']="functions_login.js";
        $this->views->getView($this,"login",$data);
    }    
    public function loginUser(){
        //dep($_POST);
        if($_POST){
            if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                $arrResponse = array ('status' => false, 'msg' => 'Error de datos');
            }else{
                $strUsuario = strtolower(strClean($_POST['txtEmail']));
                $strPassword = strClean($_POST['txtPassword']);
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto. ');
                }else{
                    $arrData = $requestUser;
                    if($arrData['status'] == 1){
                        $_SESSION['idUser'] = $arrData['idpersona'];
                        $_SESSION['login'] = true;

                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                        $_SESSION['userData'] = $arrData;
                        $arrRol = $_SESSION['userData']['idrol'];
                        
                        switch ($arrRol){
                        case 1:
                            $arrResponse = array('status' => true, 'msg' => '1');
                            break;
                        case 2:
                            $arrResponse = array('status' => true, 'msg' => '2');
                            break;
                        case 3:
                            $arrResponse = array('status' => true, 'msg' =>'3');    
                            break;
                        default :
                            $arrResponse = array('status' => true, 'msg' =>'3');    
                            break;
                        }                        
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}
