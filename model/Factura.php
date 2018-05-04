<?php 
/**
* 
*/
class Factura
{
	private $db;
	private $fechaFactura;
	private $nombreCliente;
	private $direccionCliente;
	private $codigoFactura;
	private $estado;
	private $idUsuario;

		public function __construct()
		{
            require_once 'Conexion.php';
            $objCon = new Conexion();
            $this->db = $objCon->conectar();
		}


    /**
     * @return mixed
     */
    public function getFechaFactura()
    {
        return $this->fechaFactura;
    }

    /**
     * @param mixed $fechaFactura
     *
     * @return self
     */
    public function setFechaFactura($fechaFactura)
    {
        $this->fechaFactura = $fechaFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    /**
     * @param mixed $nombreCliente
     *
     * @return self
     */
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccionCliente()
    {
        return $this->direccionCliente;
    }

    /**
     * @param mixed $direccionCliente
     *
     * @return self
     */
    public function setDireccionCliente($direccionCliente)
    {
        $this->direccionCliente = $direccionCliente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoFactura()
    {
        return $this->codigoFactura;
    }

    /**
     * @param mixed $codigoFactura
     *
     * @return self
     */
    public function setCodigoFactura($codigoFactura)
    {
        $this->codigoFactura = $codigoFactura;

        return $this;
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
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


    
}



 ?>