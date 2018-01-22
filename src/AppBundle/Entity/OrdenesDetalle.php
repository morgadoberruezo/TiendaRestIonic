<?php

namespace AppBundle\Entity;

/**
 * OrdenesDetalle
 */
class OrdenesDetalle
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $ordenId;

    /**
     * @var string
     */
    private $productoId;


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
     * Set ordenId
     *
     * @param integer $ordenId
     *
     * @return OrdenesDetalle
     */
    public function setOrdenId($ordenId)
    {
        $this->ordenId = $ordenId;

        return $this;
    }

    /**
     * Get ordenId
     *
     * @return integer
     */
    public function getOrdenId()
    {
        return $this->ordenId;
    }

    /**
     * Set productoId
     *
     * @param string $productoId
     *
     * @return OrdenesDetalle
     */
    public function setProductoId($productoId)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get productoId
     *
     * @return string
     */
    public function getProductoId()
    {
        return $this->productoId;
    }
}
