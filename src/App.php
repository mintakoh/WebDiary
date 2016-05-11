<?php
use \Repository\UserRepositoryInterface;
use \Repository\ArticleFileRepository;

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
     * @var \Repository\ArticleFileRepository
     */
    protected $diaryRepository;

    /**
     * @var \View\SimpleTemplate
     */
    protected $view;

    /**
     * App constructor.
     * @param UserRepositoryInterface $userRepository
     * @param ArticleFileRepository $diaryRepository
     * @param \View\SimpleTemplate $view
     */
    public function __construct(UserRepositoryInterface $userRepository, ArticleFileRepository $diaryRepository, \View\SimpleTemplate $view)
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
     * @return ArticleFileRepository
     */
    public function getArticleRepository()
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