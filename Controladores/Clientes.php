<?php

class Clientes extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function clientes()
    {
        $data['page_tag'] = "Clientes";
        $data['page_title'] = "Clientes <small>Tienda Virtual</small>";
        $data['page_functions_js'] = "functions_clientes.js";
        $data['page_name'] = "cliente";
        $this->views->getView($this,"clientes",$data);
    }
    public function getClientes()
    {
        $arrData = $this->model->selectClientes();

        for($i=0; $i < count($arrData); $i++){

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $arrData[$i]['options'] = '<div class=""text-center>
            <button class="btn btn-primary btn-sm btnEditCliente" rl="'.$arrData[$i]['id_cliente'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button class="btn btn-danger btn-sm btnDelCliente" rl="'.$arrData[$i]['id_cliente'].'" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>';
        }
        
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getCliente(int $id_cliente)
    {
        $intIdcliente = intval(strClean($id_cliente));
        if($intIdcliente > 0)
        {
            $arrData = $this->model->selectCliente($intIdcliente);
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
    public function setCliente(){
        $intIdcliente = intval($_POST['idCliente']);
        $strNombres = strClean($_POST['txtNombre']);        
        $strApellidos = strClean($_POST['txtApellido']);
        $strFechanacimiento = strClean($_POST['txtFecha']);
        $strEmail = strClean($_POST['txtEmail']);
        $strDireccion = strClean($_POST['txtDireccion']);
        $strTelefono = strClean($_POST['txtTelefono']);
        $intStatus = intval($_POST['listStatus']);
        $intIdusuario = intval($_POST['idUsuario']);
        

        if($intIdcliente == 0)
        {//Crear Cliente
            $request_cliente = $this->model->insertCliente($strNombres, $strApellidos, $strFechanacimiento, $strEmail, $strDireccion, $strTelefono, $intStatus, $intIdusuario);
            $option = 1;
        }else{
            //Actualizar Cliente
            $request_cliente = $this->model->updateCliente($intIdcliente, $strNombres, $strApellidos, $strFechanacimiento, $strEmail, $strDireccion, $strTelefono, $intStatus, $intIdusuario);
            $option = 2;
        }
        if($request_cliente > 0 )
        {
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else{
                $arrResponse = array('status' => true, 'msg' =>'Datos Actualizados correctamente.');
            }

        }else if($request_cliente == 'exist'){

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El Cliente ya existe.');

        }else{

            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
    //CREAR METODO DELROL PARA ELIMINAR
    public function delCliente()
    {
        if($_POST){
            $intIdcliente = intval($_POST['id_cliente']);
            $requestDelete = $this->model->deleteCliente($intIdcliente);
            if($requestDelete == 'ok')
            {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Cliente.');
            }else if($requestDelete = 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Cliente asociado a usuarios.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Cliente');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>