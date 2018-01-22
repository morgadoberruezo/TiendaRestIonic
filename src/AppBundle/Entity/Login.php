<?php

namespace AppBundle\Entity;

/**
 * Login
 */
class Login
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $correo;

    /**
     * @var string
     */
    private $contrasena;

    /**
     * @var string
     */
    private $token;


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
     * Set correo
     *
     * @param string $correo
     *
     * @return Login
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     *
     * @return Login
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Login
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
