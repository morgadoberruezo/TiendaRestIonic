<?php

namespace AppBundle\Entity;

/**
 * Ordenes
 */
class Ordenes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $usuarioId;

    /**
     * @var \DateTime
     */
    private $creadoEn = 'CURRENT_TIMESTAMP';


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
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return Ordenes
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set creadoEn
     *
     * @param \DateTime $creadoEn
     *
     * @return Ordenes
     */
    public function setCreadoEn($creadoEn)
    {
        $this->creadoEn = $creadoEn;

        return $this;
    }

    /**
     * Get creadoEn
     *
     * @return \DateTime
     */
    public function getCreadoEn()
    {
        return $this->creadoEn;
    }
    /**
     * @var \AppBundle\Entity\Login
     */
    private $usuario;


    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Login $usuario
     *
     * @return Ordenes
     */
    public function setUsuario(\AppBundle\Entity\Login $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Login
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
