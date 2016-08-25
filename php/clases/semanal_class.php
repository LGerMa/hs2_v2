<?php 
	/**
	* 
	*/
	class semanal_class
	{
		private $codSemanal;
		private $semana;
		private $fechaRegistro;
		private $correoUsuario;
	
    /**
     * Gets the value of codSemanal.
     *
     * @return mixed
     */
    public function getCodSemanal()
    {
        return $this->codSemanal;
    }

    /**
     * Sets the value of codSemanal.
     *
     * @param mixed $codSemanal the cod semanal
     *
     * @return self
     */
    public function _setCodSemanal($codSemanal)
    {
        $this->codSemanal = $codSemanal;

        return $this;
    }

    /**
     * Gets the value of semana.
     *
     * @return mixed
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * Sets the value of semana.
     *
     * @param mixed $semana the semana
     *
     * @return self
     */
    public function _setSemana($semana)
    {
        $this->semana = $semana;

        return $this;
    }

    /**
     * Gets the value of fechaRegistro.
     *
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Sets the value of fechaRegistro.
     *
     * @param mixed $fechaRegistro the fecha registro
     *
     * @return self
     */
    public function _setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Gets the value of correoUsuario.
     *
     * @return mixed
     */
    public function getCorreoUsuario()
    {
        return $this->correoUsuario;
    }

    /**
     * Sets the value of correoUsuario.
     *
     * @param mixed $correoUsuario the correo usuario
     *
     * @return self
     */
    public function _setCorreoUsuario($correoUsuario)
    {
        $this->correoUsuario = $correoUsuario;

        return $this;
    }
}
?>