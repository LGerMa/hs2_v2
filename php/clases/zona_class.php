<?php 
/**
* 
*/
class zona_class
{
	private $idZona;
	private $tipoZona;

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
     * Gets the value of tipoZona.
     *
     * @return mixed
     */
    public function getTipoZona()
    {
        return $this->tipoZona;
    }

    /**
     * Sets the value of tipoZona.
     *
     * @param mixed $tipoZona the tipo zona
     *
     * @return self
     */
    public function _setTipoZona($tipoZona)
    {
        $this->tipoZona = $tipoZona;

        return $this;
    }
}
 ?>