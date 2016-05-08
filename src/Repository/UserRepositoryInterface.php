<?php

namespace Repository;

use Model\User;

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
     * @param User $user
     * @return mixed
     */
    public function createUser(User $user);

}