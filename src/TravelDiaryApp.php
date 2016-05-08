<?php
use \Repository\UserRepositoryInterface;

class TravelDiaryApp
{

    /**
     * @var TravelDiaryApp
     */
    public static $app;

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

    /**
     * @return TravelDiaryApp
     */
    public function setAsGlobal()
    {
        return static::$app = $this;
    }

    public function execute()
    {
        call_user_func( array( \Controller\IndexController::class, 'index' ) );
    }
    
}