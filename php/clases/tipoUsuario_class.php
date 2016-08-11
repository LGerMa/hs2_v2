<?php 
/**
* 
*/
class tipoUsuario_class
{
	private $idTipoUsuario;
	private $tipoUsuario;

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
     * Gets the value of tipoUsuario.
     *
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * Sets the value of tipoUsuario.
     *
     * @param mixed $tipoUsuario the tipo usuario
     *
     * @return self
     */
    public function _setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }
}
 ?>