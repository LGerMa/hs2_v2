<?php 
/**
* 
*/
class usuario_class
{
	private $correoUsuario;
	private $passUsuario;
	private $nombreUsuario;
	private $apellidoUsuario;
	private $idTipoUsuario;
	private $idUnidad;
	private $idPuesto;
	private $idZona;
	private $idEstadoUsuario;
	private $fechaRegistroUsuario;
	private $fechaModificadoUsuario;

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
     * Gets the value of passUsuario.
     *
     * @return mixed
     */
    public function getPassUsuario()
    {
        return $this->passUsuario;
    }

    /**
     * Sets the value of passUsuario.
     *
     * @param mixed $passUsuario the pass usuario
     *
     * @return self
     */
    public function _setPassUsuario($passUsuario)
    {
        $this->passUsuario = $passUsuario;

        return $this;
    }

    /**
     * Gets the value of nombreUsuario.
     *
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Sets the value of nombreUsuario.
     *
     * @param mixed $nombreUsuario the nombre usuario
     *
     * @return self
     */
    public function _setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Gets the value of apellidoUsuario.
     *
     * @return mixed
     */
    public function getApellidoUsuario()
    {
        return $this->apellidoUsuario;
    }

    /**
     * Sets the value of apellidoUsuario.
     *
     * @param mixed $apellidoUsuario the apellido usuario
     *
     * @return self
     */
    public function _setApellidoUsuario($apellidoUsuario)
    {
        $this->apellidoUsuario = $apellidoUsuario;

        return $this;
    }

    /**
     * Gets the value of idTipoUsuario.
     *
     * @return mixed
     */
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    /**
     * Sets the value of idTipoUsuario.
     *
     * @param mixed $idTipoUsuario the id tipo usuario
     *
     * @return self
     */
    public function _setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;

        return $this;
    }

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
     * Gets the value of idPuesto.
     *
     * @return mixed
     */
    public function getIdPuesto()
    {
        return $this->idPuesto;
    }

    /**
     * Sets the value of idPuesto.
     *
     * @param mixed $idPuesto the id puesto
     *
     * @return self
     */
    public function _setIdPuesto($idPuesto)
    {
        $this->idPuesto = $idPuesto;

        return $this;
    }

    /**
     * Gets the value of idZona.
     *
     * @return mixed
     */
    public function getIdZona()
    {
        return $this->idZona;
    }

    /**
     * Sets the value of idZona.
     *
     * @param mixed $idZona the id zona
     *
     * @return self
     */
    public function _setIdZona($idZona)
    {
        $this->idZona = $idZona;

        return $this;
    }

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
     * Gets the value of fechaRegistroUsuario.
     *
     * @return mixed
     */
    public function getFechaRegistroUsuario()
    {
        return $this->fechaRegistroUsuario;
    }

    /**
     * Sets the value of fechaRegistroUsuario.
     *
     * @param mixed $fechaRegistroUsuario the fecha registro usuario
     *
     * @return self
     */
    public function _setFechaRegistroUsuario($fechaRegistroUsuario)
    {
        $this->fechaRegistroUsuario = $fechaRegistroUsuario;

        return $this;
    }

    /**
     * Gets the value of fechaModificadoUsuario.
     *
     * @return mixed
     */
    public function getFechaModificadoUsuario()
    {
        return $this->fechaModificadoUsuario;
    }

    /**
     * Sets the value of fechaModificadoUsuario.
     *
     * @param mixed $fechaModificadoUsuario the fecha modificado usuario
     *
     * @return self
     */
    public function _setFechaModificadoUsuario($fechaModificadoUsuario)
    {
        $this->fechaModificadoUsuario = $fechaModificadoUsuario;

        return $this;
    }
}
 ?>