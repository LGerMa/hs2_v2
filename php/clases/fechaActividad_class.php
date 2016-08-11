<?php 
/**
* 
*/
class fechaActividad_class
{
	private $idFechaActividad;
	private $fechaActividad;
	private $horaInicioActividad;
	private $horaFinActividad;
	private $idActividad;

    /**
     * Gets the value of idFechaActividad.
     *
     * @return mixed
     */
    public function getIdFechaActividad()
    {
        return $this->idFechaActividad;
    }

    /**
     * Sets the value of idFechaActividad.
     *
     * @param mixed $idFechaActividad the id fecha actividad
     *
     * @return self
     */
    public function _setIdFechaActividad($idFechaActividad)
    {
        $this->idFechaActividad = $idFechaActividad;

        return $this;
    }

    /**
     * Gets the value of fechaActividad.
     *
     * @return mixed
     */
    public function getFechaActividad()
    {
        return $this->fechaActividad;
    }

    /**
     * Sets the value of fechaActividad.
     *
     * @param mixed $fechaActividad the fecha actividad
     *
     * @return self
     */
    public function _setFechaActividad($fechaActividad)
    {
        $this->fechaActividad = $fechaActividad;

        return $this;
    }

    /**
     * Gets the value of horaInicioActividad.
     *
     * @return mixed
     */
    public function getHoraInicioActividad()
    {
        return $this->horaInicioActividad;
    }

    /**
     * Sets the value of horaInicioActividad.
     *
     * @param mixed $horaInicioActividad the hora inicio actividad
     *
     * @return self
     */
    public function _setHoraInicioActividad($horaInicioActividad)
    {
        $this->horaInicioActividad = $horaInicioActividad;

        return $this;
    }

    /**
     * Gets the value of horaFinActividad.
     *
     * @return mixed
     */
    public function getHoraFinActividad()
    {
        return $this->horaFinActividad;
    }

    /**
     * Sets the value of horaFinActividad.
     *
     * @param mixed $horaFinActividad the hora fin actividad
     *
     * @return self
     */
    public function _setHoraFinActividad($horaFinActividad)
    {
        $this->horaFinActividad = $horaFinActividad;

        return $this;
    }

    /**
     * Gets the value of idActividad.
     *
     * @return mixed
     */
    public function getIdActividad()
    {
        return $this->idActividad;
    }

    /**
     * Sets the value of idActividad.
     *
     * @param mixed $idActividad the id actividad
     *
     * @return self
     */
    public function _setIdActividad($idActividad)
    {
        $this->idActividad = $idActividad;

        return $this;
    }
}
 ?>