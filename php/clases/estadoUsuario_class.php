<?php 
	/**
	* 
	*/
	class estadoUsuario_class
	{
		private $idEstadoUsuario;
		private $estadoUsuario;
	
    /**
     * Gets the value of idEstadoUsuario.
     *
     * @return mixed
     */
    public function getIdEstadoUsuario()
    {
        return $this->idEstadoUsuario;
    }

    /**
     * Sets the value of idEstadoUsuario.
     *
     * @param mixed $idEstadoUsuario the id estado usuario
     *
     * @return self
     */
    public function _setIdEstadoUsuario($idEstadoUsuario)
    {
        $this->idEstadoUsuario = $idEstadoUsuario;

        return $this;
    }

    /**
     * Gets the value of estadoUsuario.
     *
     * @return mixed
     */
    public function getEstadoUsuario()
    {
        return $this->estadoUsuario;
    }

    /**
     * Sets the value of estadoUsuario.
     *
     * @param mixed $estadoUsuario the estado usuario
     *
     * @return self
     */
    public function _setEstadoUsuario($estadoUsuario)
    {
        $this->estadoUsuario = $estadoUsuario;

        return $this;
    }
}
 ?>