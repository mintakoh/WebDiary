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
    protected $userRepository;

    /**
     * @var \View\SimpleTemplate
     */
    protected $view;

    /**
     * TravelDiaryApp constructor.
     * @param UserRepositoryInterface $userRepository
     * @param \View\SimpleTemplate $view
     */
    public function __construct(UserRepositoryInterface $userRepository, \View\SimpleTemplate $view)
    {
        $this->view = $view;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \View\SimpleTemplate
     */
    public function getView()
    {
        return $this->view;
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
        $r = isset($_GET['r']) ? $_GET['r'] : '/';
        Router::execute($r);
    }
}