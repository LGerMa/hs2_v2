<?php 
/**
* 
*/
class actividad_class
{
	private $idActividad;
	private $actividadProgramada;
	private $codCooperativa;
	private $idEstadoActividad;
    private $codSemanal;
    private $diaSemana;
    private $HoraIni;
    private $HoraFin;

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
     * @param mixed $codSemanal the fecha registro actividad
     *
     * @return self
     */
    public function _setCodSemanal($codSemanal)
    {
        $this->codSemanal = $codSemanal;

        return $this;
    }

    /**
     * Gets the value of fechaModificadoActividad.
     *
     * @return mixed
     */
    public function getDiaSemana()
    {
        return $this->diaSemana;
    }

    /**
     * Sets the value of diaSemana.
     *
     * @param mixed $diaSemana the fecha modificado actividad
     *
     * @return self
     */
    public function _setDiaSemana($diaSemana)
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }

    /**
     * Gets the value of codSemanal.
     *
     * @return mixed
     */
    public function getHoraIni()
    {
        return $this->HoraIni;
    }

    /**
     * Sets the value of HoraIni.
     *
     * @param mixed $horaIni the cod semanal
     *
     * @return self
     */
    public function _setHoraIni($HoraIni)
    {
        $this->HoraIni = $HoraIni;

        return $this;
    }


    /**
     * Gets the value of HoraFin.
     *
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->HoraFin;
    }

    /**
     * Sets the value of horaFin.
     *
     * @param mixed $horaFin the cod semanal
     *
     * @return self
     */
    public function _setHoraFin($HoraFin)
    {
        $this->HoraFin = $HoraFin;

        return $this;
    }
}
 ?>