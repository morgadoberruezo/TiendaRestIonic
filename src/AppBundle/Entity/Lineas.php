<?php

namespace AppBundle\Entity;

/**
 * Lineas
 */
class Lineas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $linea;

    /**
     * @var string
     */
    private $icono;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set linea
     *
     * @param string $linea
     *
     * @return Lineas
     */
    public function setLinea($linea)
    {
        $this->linea = $linea;

        return $this;
    }

    /**
     * Get linea
     *
     * @return string
     */
    public function getLinea()
    {
        return $this->linea;
    }

    /**
     * Set icono
     *
     * @param string $icono
     *
     * @return Lineas
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }
}
