<?php

namespace AppBundle\Entity;

/**
 * Productos
 */
class Productos
{
    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $producto;

    /**
     * @var string
     */
    private $linea;

    /**
     * @var integer
     */
    private $lineaId;

    /**
     * @var string
     */
    private $proveedor;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $precioCompra;


    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set producto
     *
     * @param string $producto
     *
     * @return Productos
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set linea
     *
     * @param string $linea
     *
     * @return Productos
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
     * Set lineaId
     *
     * @param integer $lineaId
     *
     * @return Productos
     */
    public function setLineaId($lineaId)
    {
        $this->lineaId = $lineaId;

        return $this;
    }

    /**
     * Get lineaId
     *
     * @return integer
     */
    public function getLineaId()
    {
        return $this->lineaId;
    }

    /**
     * Set proveedor
     *
     * @param string $proveedor
     *
     * @return Productos
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Productos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precioCompra
     *
     * @param string $precioCompra
     *
     * @return Productos
     */
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    /**
     * Get precioCompra
     *
     * @return string
     */
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }
    /**
     * @var \AppBundle\Entity\Lineas
     */
    private $linea2;


    /**
     * Set linea2
     *
     * @param \AppBundle\Entity\Lineas $linea2
     *
     * @return Productos
     */
    public function setLinea2(\AppBundle\Entity\Lineas $linea2 = null)
    {
        $this->linea2 = $linea2;

        return $this;
    }

    /**
     * Get linea2
     *
     * @return \AppBundle\Entity\Lineas
     */
    public function getLinea2()
    {
        return $this->linea2;
    }
}
