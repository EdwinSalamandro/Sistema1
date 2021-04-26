<?php


    class ClientesModel extends Mysql
    {
        public $intIdcliente;
        public $strNombres;
        public $strApellidos;
        public $strFechanacimiento;
        public $strEmail;
        public $strDireccion;
        public $strTelefono;
        public $intStatus;
        public $intIdusuario;

        public function __construct()
        {
            parent::__construct();
        }

        public function selectClientes()
        //EXTRAE ROLES
    {
        $sql = "SELECT * FROM tbl_cliente WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectCliente(int $id_cliente)
    {
        //BUSCAR ROLES
        $this->intIdcliente = $id_cliente;
        $sql = "SELECT * FROM tbl_cliente WHERE id_cliente = $this->intIdcliente";
        $request = $this->select($sql);
        return $request;
    }

        public function insertCliente(string $nombres, string $apellidos, string $fecha_nacimiento, string $email, string $direccion, string $telefono, int $status, int $id_usuario){
            $return = "";
            $this->strNombres = $nombres;
            $this->strApellidos = $apellidos;
            $this->strFechanacimiento = $fecha_nacimiento;
            $this->strEmail = $email;
            $this->strDireccion = $direccion;
            $this->strTelefono = $telefono;
            $this->intStatus = $status;
            $this->intIdusuario = $id_usuario;

            $sql = "SELECT * FROM tbl_cliente WHERE nombres = '{$this->strNombres}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO tbl_cliente(nombres,apellidos,fecha_nacimiento,email,direccion,telefono,status,id_usuario) VALUES(?,?,?,?,?,?,?,?)";
                $arrData = array($this->strNombres, $this->strApellidos, $this->strFechanacimiento, $this->strEmail, $this->strDireccion, $this->strTelefono, $this->intStatus, $this->intIdusuario);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
         }
         public function updateCliente(int $id_cliente, string $nombres, string $apellidos, string $fecha_nacimiento, string $email, string $direccion, string $telefono, int $status, int $id_usuario){
             $this->intIdcliente= $id_cliente;
             $this->strNombres = $nombres;
             $this->strApellidos = $apellidos;
             $this->strFechanacimiento = $fecha_nacimiento;
             $this->strEmail = $email;
             $this->strDireccion = $direccion;
             $this->strTelefono = $telefono;
             $this->intStatus = $status;
             $this->intIdusuario = $id_usuario;

             $sql = "SELECT * FROM tbl_cliente WHERE nombres = '$this->strNombres' AND id_cliente != $this->intIdcliente";
             $request = $this->select_all($sql);

             if(empty($request))
             {
                 $sql = "UPDATE tbl_cliente SET nombres = ?, apellidos = ?, fecha_nacimiento = ?, email = ?, direccion = ?, telefono = ?, status = ?, id_usuario = ? WHERE id_cliente = $this->intIdcliente";
                 $arrData = array($this->strNombres, $this->strApellidos, $this->strFechanacimiento, $this->strEmail, $this->strDireccion, $this->strTelefono, $this->intStatus, $this->intIdusuario);
                 $request = $this->update($sql,$arrData);
             }else{
                 $request = "exist";
             }

             return $request;
         }
         public function deleteCliente(int $id_cliente)
         {
             $this->intIdcliente = $id_cliente;
             $sql = "SELECT * FROM persona WHERE rolid = $this->intIdcliente";
             $request = $this->select_all($sql);
             if(empty($request))
             {
                 $sql = "UPDATE tbl_cliente SET status = ? WHERE id_cliente = $this->intIdcliente";
                 $arrData = array(0);
                 $request = $this->update($sql,$arrData);
                 if($request)
                 {
                     $request = 'ok';
                 }else{
                     $request = 'error';
                 }
             }else{
                 $request = 'exist';
             }
             return $request;
         }
    }
?>
