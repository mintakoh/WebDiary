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

}