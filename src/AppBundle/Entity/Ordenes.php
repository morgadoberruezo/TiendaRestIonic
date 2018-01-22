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
}
