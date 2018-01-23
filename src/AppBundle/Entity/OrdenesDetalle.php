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
    /**
     * @var \AppBundle\Entity\Productos
     */
    private $producto;

    /**
     * @var \AppBundle\Entity\Ordenes
     */
    private $orden;


    /**
     * Set producto
     *
     * @param \AppBundle\Entity\Productos $producto
     *
     * @return OrdenesDetalle
     */
    public function setProducto(\AppBundle\Entity\Productos $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \AppBundle\Entity\Productos
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set orden
     *
     * @param \AppBundle\Entity\Ordenes $orden
     *
     * @return OrdenesDetalle
     */
    public function setOrden(\AppBundle\Entity\Ordenes $orden = null)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return \AppBundle\Entity\Ordenes
     */
    public function getOrden()
    {
        return $this->orden;
    }
}
