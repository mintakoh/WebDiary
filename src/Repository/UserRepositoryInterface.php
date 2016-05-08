<?php

namespace Repository;

interface UserRepositoryInterface
{

    /**
     * @return /Model/User[]
     */
    public function getAllUsers();

    /**
     * @param $id
     * @return /Model/User|null
     */
    public function getUserById($id);

    /**
     * @param $dataSet
     * @return /Model/User
     */
    public function createUser($dataSet);
    
}