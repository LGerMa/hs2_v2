<?php 
	/**
	* 
	*/
	class estadoSemanal_class
	{
		private $idEstadoSemanal;
		private $estadoSemanal;	
	
	    /**
	     * Gets the value of idEstadoSemanal.
	     *
	     * @return mixed
	     */
	    public function getIdEstadoSemanal()
	    {
	        return $this->idEstadoSemanal;
	    }

	    /**
	     * Sets the value of idEstadoSemanal.
	     *
	     * @param mixed $idEstadoSemanal the id estado semanal
	     *
	     * @return self
	     */
	    public function _setIdEstadoSemanal($idEstadoSemanal)
	    {
	        $this->idEstadoSemanal = $idEstadoSemanal;

	        return $this;
	    }

	    /**
	     * Gets the value of estadoSemanal.
	     *
	     * @return mixed
	     */
	    public function getEstadoSemanal()
	    {
	        return $this->estadoSemanal;
	    }

	    /**
	     * Sets the value of estadoSemanal.
	     *
	     * @param mixed $estadoSemanal the estado semanal
	     *
	     * @return self
	     */
	    public function _setEstadoSemanal($estadoSemanal)
	    {
	        $this->estadoSemanal = $estadoSemanal;

	        return $this;
	    }
	}
?>