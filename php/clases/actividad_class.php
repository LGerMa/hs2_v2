<?php 
/**
* 
*/
class actividad_class
{
	private $idActividad;
	private $correoUsuario;
	private $actividadProgramada;
	private $codCooperativa;
	private $idEstadoActividad;
	private $fechaRegistroActividad;
	private $fechaModificadoActividad;

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

    /**
     * Gets the value of actividadProgramada.
     *
     * @return mixed
     */
    public function getActividadProgramada()
    {
        return $this->actividadProgramada;
    }

    /**
     * Sets the value of actividadProgramada.
     *
     * @param mixed $actividadProgramada the actividad programada
     *
     * @return self
     */
    public function _setActividadProgramada($actividadProgramada)
    {
        $this->actividadProgramada = $actividadProgramada;

        return $this;
    }

    /**
     * Gets the value of codCooperativa.
     *
     * @return mixed
     */
    public function getCodCooperativa()
    {
        return $this->codCooperativa;
    }

    /**
     * Sets the value of codCooperativa.
     *
     * @param mixed $codCooperativa the cod cooperativa
     *
     * @return self
     */
    public function _setCodCooperativa($codCooperativa)
    {
        $this->codCooperativa = $codCooperativa;

        return $this;
    }

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
     * Gets the value of fechaRegistroActividad.
     *
     * @return mixed
     */
    public function getFechaRegistroActividad()
    {
        return $this->fechaRegistroActividad;
    }

    /**
     * Sets the value of fechaRegistroActividad.
     *
     * @param mixed $fechaRegistroActividad the fecha registro actividad
     *
     * @return self
     */
    public function _setFechaRegistroActividad($fechaRegistroActividad)
    {
        $this->fechaRegistroActividad = $fechaRegistroActividad;

        return $this;
    }

    /**
     * Gets the value of fechaModificadoActividad.
     *
     * @return mixed
     */
    public function getFechaModificadoActividad()
    {
        return $this->fechaModificadoActividad;
    }

    /**
     * Sets the value of fechaModificadoActividad.
     *
     * @param mixed $fechaModificadoActividad the fecha modificado actividad
     *
     * @return self
     */
    public function _setFechaModificadoActividad($fechaModificadoActividad)
    {
        $this->fechaModificadoActividad = $fechaModificadoActividad;

        return $this;
    }
}
 ?>