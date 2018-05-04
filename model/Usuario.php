<?php 
require_once 'Conexion.php';
	class Usuario
	{

		private $username;
		private $password;
        private $salt;
		private $estado;
		private $rol;
        public $db;
        
		public function __construct()
		{
            
            $this->db = conectar();
            
		}


        public function getDb()
        {
            return $this->db;
        }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $passEncode = sha1($password);
        $this->password = $passEncode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     *
     * @return self
     */
    public function setSalt()
    {
        $this->salt = $this->generateSalt();

        return $this;
    }

    public function generateSalt()
    {
        $salt = $this->password;
        for ($i=1; $i<=12 ; $i++) { 
            $salt = sha1($salt);
        }
        return $salt;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }





    public function getAll()
    {
        $sqlAll = "SELECT * from usuario WHERE estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

    public function getAllRol()
    {
        $sql = "SELECT r.id, r.nombre FROM rol r WHERE r.estado=1";
        $info = $this->db->query($sql);

        if ($info->num_rows>0) {
           $data = $info;
        }
        else
        {
            $data=false;
        }
        return $data;
    }
    

    public function saveUser()
    {
        $sql = "INSERT INTO usuario VALUES (0,'".$this->username."','".$this->password."','".$this->salt."',".$this->estado.",".$this->rol.")";
        $res = $this->db->query($sql);
        $data = array();
        if($res)
        {
            $data['estado']= true;
            $data['descripcion'] = "Datos Ingresados Exitosamente!!";
        }
        else
        {
            $data['estado']= false;
            $data['descripcion'] = "Error al ingresar los datos ".$this->db->error;
        }

        return json_encode($data);
    }

    public function findUser($user)
    {
        $sql = "SELECT COUNT(u.id) as numero FROM usuario u WHERE u.estado=1 AND u.username='".$user."'";
        $info = $this->db->query($sql);
        $data = $info->fetch_assoc();
        if ($data['numero']>0) {
            $datos['estado']= false;
            $datos['descripcion'] = "Usuario ya registrado, intenta con otro!!";
        }
        else
        {
            $datos['estado']= true;
            $datos['descripcion'] = "Usuario Disponible!!";
        }
        return json_encode($datos);
    }

    public function getUser($idUsuario)
    {
        $sql = "SELECT u.id as idUsuario, r.id as idRol, u.username FROM usuario u INNER JOIN rol r on u.rol_id = r.id WHERE u.id=".$idUsuario;
        $info = $this->db->query($sql);
        $data = $info->fetch_assoc();

        return json_encode($data);
    }
//Fin de la clase Usuario
}


 ?>