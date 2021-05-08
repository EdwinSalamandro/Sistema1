<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class loginModel extends Mysql
    {   private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;
        
        public function __construct()
        {
            parent::__construct(); // Ejecuta constructor padre (mysql)
        }
        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;
            $sql = "SELECT idpersona,status,rolid FROM persona WHERE
              email_user = '$this->strUsuario' and
              password = '$this->strPassword' and
              status != 0 ";

            $request = $this->select($sql);
            return $request;
        }

        public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//Buscar ROL
			$sql = "SELECT p.idpersona,
							p.identificacion,
							p.nombres,
							p.apellidos,
							p.telefono,
							p.email_user,
							p.nit,
							r.idrol,r.nombrerol,
							p.status
					FROM persona p 
					INNER JOIN rol r 
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
					$request = $this->select($sql);
					return $request;
		}
    }
?>
