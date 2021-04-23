<?php

class Usuarios extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function usuarios()
    {
        $data['page_tag'] = "Usuarios";
        $data['page_title'] = " Usuarios <small>Tienda Virtual</small>";
        $data['page_functions_js'] = "functions_usuarios.js";
        $data['page_name'] = "usuario";
        $this->views->getView($this,"usuarios",$data);
    }
    public function getUsuarios()
    {
        $arrData = $this->model->selectUsuarios();

        for($i=0; $i < count($arrData); $i++){

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $arrData[$i]['options'] = '<div class=""text-center>
            <button class="btn btn-primary btn-sm btnEditUsuario" rl="'.$arrData[$i]['id_usuario'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button class="btn btn-danger btn-sm btnDelUsuario" rl="'.$arrData[$i]['id_usuario'].'" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>';
        }
        
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getUsuario(int $id_usuario)
    {
        $intIdusuario = intval(strClean($id_usuario));
        if($intIdusuario > 0)
        {
            $arrData = $this->model->selectUsuario($intIdusuario);
            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function setUsuario(){
        $intIdusuario = intval($_POST['idUsuario']);
        $strEmail = strClean($_POST['txtEmail']);        
        $strContraseña = strClean($_POST['txtPassword']);
        $strTipousuario = strClean($_POST['txtTipo']);
        $intStatus = intval($_POST['listStatus']);
        

        if($intIdusuario == 0)
        {//Crear Usuario
            $request_usuario = $this->model->insertUsuario($intIdusuario, $strEmail, $strContraseña, $strTipousuario, $intStatus);
            $option = 1;
        }else{
            //Actualizar Usuario
            $request_usuario = $this->model->updateUsuario($intIdusuario, $strEmail, $strContraseña, $strTipousuario, $intStatus);
            $option = 2;
        }
        if($request_usuario > 0 )
        {
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else{
                $arrResponse = array('status' => true, 'msg' =>'Datos Actualizados correctamente.');
            }

        }else if($request_usuario == 'exist'){

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El Usuario ya existe.');

        }else{

            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
    //CREAR METODO DELROL PARA ELIMINAR
    public function delUsuario()
    {
        if($_POST){
            $intIdusuario = intval($_POST['id_usuario']);
            $requestDelete = $this->model->deleteUsuario($intIdusuario);
            if($requestDelete == 'ok')
            {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Usuario.');
            }else if($requestDelete = 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Usuario asociado a usuarios.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Usuario');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>