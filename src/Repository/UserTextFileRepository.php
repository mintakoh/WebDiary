<?php

namespace Repository;


use Model\User;

class UserTextFileRepository implements UserRepositoryInterface
{

    /**
     * @var string
     */
    private $filePath;

    /**
     * UserTextFileRepository constructor.
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getAllUsers()
    {
        return unserialize(file_get_contents($this->filePath));
    }

    public function getUserById($id)
    {
        $users = $this->getAllUsers();

        /** @var User $user */
        foreach ($users as $user) {
            if($user->getId() == $id)
                return $user;
        }
        return null;
    }

    public function createUser(User $user)
    {
        $users = $this->getAllUsers();
        $users[$user->getId()] = $user;
        file_put_contents($this->filePath, serialize($users));
    }

    public function updateUser(User $user)
    {
        $targetUser = $this->getUserById($user->getId());
        if($targetUser == null)
            return false;

        $users = $this->getAllUsers();
        $users[$user->getId()] = $user;
        file_put_contents($this->filePath, serialize($users));
    }

}