<?php 
/**
* 
*/
class puesto_class
{
	private $idPuesto;
	private $puesto;

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
     * Gets the value of puesto.
     *
     * @return mixed
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Sets the value of puesto.
     *
     * @param mixed $puesto the puesto
     *
     * @return self
     */
    public function _setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }
}
 ?>