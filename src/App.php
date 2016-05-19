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
     * App constructor.
     * @param UserRepositoryInterface $userRepository
     * @param ArticleFileRepository $diaryRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, ArticleFileRepository $diaryRepository)
    {
        $this->userRepository = $userRepository;
        $this->diaryRepository = $diaryRepository;
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