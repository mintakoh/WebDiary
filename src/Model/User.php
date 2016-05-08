<?php

namespace Model;


class User
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $name;

    /**
     * User constructor.
     * @param string $id
     * @param string $password
     * @param string $name
     */
    public function __construct($id, $password, $name)
    {
        $this->id = $id;
        $this->password = $password;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    

}