<?php 
/**
* 
*/
class estadoActividad_class
{
	private $idEstadoActividad;
	private $estadoActividad;

    /**
     * Gets the value of idEstadoActividad.
     *
     * @return mixed
     */
    public function getIdEstadoActividad()
    {
        return $this->idEstadoActividad;
    }

    /**
     * Sets the value of idEstadoActividad.
     *
     * @param mixed $idEstadoActividad the id estado actividad
     *
     * @return self
     */
    public function _setIdEstadoActividad($idEstadoActividad)
    {
        $this->idEstadoActividad = $idEstadoActividad;

        return $this;
    }

    /**
     * Gets the value of estadoActividad.
     *
     * @return mixed
     */
    public function getEstadoActividad()
    {
        return $this->estadoActividad;
    }

    /**
     * Sets the value of estadoActividad.
     *
     * @param mixed $estadoActividad the estado actividad
     *
     * @return self
     */
    public function _setEstadoActividad($estadoActividad)
    {
        $this->estadoActividad = $estadoActividad;

        return $this;
    }
}
 ?>