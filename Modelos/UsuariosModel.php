<?php


    class UsuariosModel extends Mysql
    {
        public $intIdusuario;
        public $strEmail;
        public $strContraseña;
        public $strTipousuario;
        public $intStatus;

        public function __construct()
        {
            parent::__construct();
        }

        public function selectUsuarios()
        //EXTRAE USUARIOS
        {
        $sql = "SELECT * FROM tbl_usuario WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
        }
        public function selectUsuario(int $id_usuario)
        {
            //BUSCAR USUARIOS
            $this->intIdusuario = $id_usuario;
            $sql = "SELECT * FROM tbl_usuario WHERE id_usuario = $this->intIdusuario";
            $request = $this->select($sql);
            return $request;
        }

        public function insertUsuario(int $id_usuario, string $email, string $contraseña, string $tipoUsuario, int $status){
            $return = "";
            $this->intIdusuario = $id_usuario;
            $this->strEmail = $email;
            $this->strContraseña = $contraseña;
            $this->strTipousuario = $tipoUsuario;
            $this->intStatus = $status;

            $sql = "SELECT * FROM tbl_usuario WHERE id_usuario = '{$this->intIdusuario}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO tbl_usuario(id_usuario,email,contraseña,tipoUsuario,status) VALUES(?,?,?,?,?)";
                $arrData = array($this->intIdusuario, $this->strEmail, $this->strContraseña, $this->strTipousuario, $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
            }
         public function updateUsuario(int $id_usuario, string $email, string $contraseña, string $tipoUsuario, int $status){
             $this->intIdusuario = $id_usuario;
             $this->strEmail = $email;
             $this->strContraseña = $contraseña;
             $this->strTipousuario = $tipoUsuario;
             $this->intStatus = $status;

             $sql = "SELECT * FROM tbl_usuario WHERE email = '$this->strEmail' AND id_usuario != $this->intIdusuario";
             $request = $this->select_all($sql);

             if(empty($request))
             {
                 $sql = "UPDATE tbl_usuario SET  id_usuario = ?, email = ?, contraseña = ?, tipoUsuario = ?, status = ? WHERE id_usuario = $this->intIdusuario";
                 $arrData = array($this->intIdusuario, $this->strEmail, $this->strContraseña, $this->strTipousuario, $this->intStatus);
                 $request = $this->update($sql,$arrData);
             }else{
                 $request = "exist";
             }

             return $request;
         }
         public function deleteUsuario(int $id_usuario)
         {
             $this->intIdusuario = $id_usuario;
             $sql = "SELECT * FROM persona WHERE rolid = $this->intIdusuario";
             $request = $this->select_all($sql);
             if(empty($request))
             {
                 $sql = "UPDATE tbl_usuario SET status = ? WHERE id_usuario = $this->intIdusuario";
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
