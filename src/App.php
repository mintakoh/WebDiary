<?php
use \Repository\UserRepositoryInterface;
use \Repository\DiaryFileRepository;

class App
{
    /**
     * @var App
     */
    public static $app;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;


    /**
     * @var \Repository\DiaryFileRepository
     */
    protected $diaryRepository;

    /**
     * @var \View\SimpleTemplate
     */
    protected $view;

    /**
     * App constructor.
     * @param UserRepositoryInterface $userRepository
     * @param DiaryFileRepository $diaryRepository
     * @param \View\SimpleTemplate $view
     */
    public function __construct(UserRepositoryInterface $userRepository, DiaryFileRepository $diaryRepository, \View\SimpleTemplate $view)
    {
        $this->view = $view;
        $this->userRepository = $userRepository;
        $this->diaryRepository = $diaryRepository;
    }

    /**
     * @return \View\SimpleTemplate
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return UserRepositoryInterface
     */
    public function getUserRepository()
    {
        return $this->userRepository;
    }

    /**
     * @return DiaryFileRepository
     */
    public function getDiaryRepository()
    {
        return $this->diaryRepository;
    }

    /**
     * @return App
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