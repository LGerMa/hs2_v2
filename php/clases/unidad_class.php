<?php 
	/**
	* 
	*/
	class unidad_class
	{
		private $idUnidad;
		private $unidad;
	
    /**
     * Gets the value of idUnidad.
     *
     * @return mixed
     */
    public function getIdUnidad()
    {
        return $this->idUnidad;
    }

    /**
     * Sets the value of idUnidad.
     *
     * @param mixed $idUnidad the id unidad
     *
     * @return self
     */
    public function _setIdUnidad($idUnidad)
    {
        $this->idUnidad = $idUnidad;

        return $this;
    }

    /**
     * Gets the value of unidad.
     *
     * @return mixed
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Sets the value of unidad.
     *
     * @param mixed $unidad the unidad
     *
     * @return self
     */
    public function _setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }
}
 ?>