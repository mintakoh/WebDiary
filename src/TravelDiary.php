<?php
use \Repository\UserRepositoryInterface;

class TravelDiary
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * TravelDiary constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
}