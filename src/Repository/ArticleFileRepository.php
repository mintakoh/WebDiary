<?php

namespace Repository;

use Model\Article;
use Model\User;

class ArticleFileRepository
{

    protected $filePath;

    protected $idFilePath;

    /**
     * DiaryFileRepository constructor.
     * @param $filePath
     * @param $idFilePath
     */
    public function __construct($filePath, $idFilePath)
    {
        $this->filePath = $filePath;
        $this->idFilePath = $idFilePath;
    }

    private function getNextId()
    {
        if(!file_exists($this->idFilePath)) {
            file_put_contents($this->idFilePath, 0);
        }

        $currentId = file_get_contents($this->idFilePath);

        $nextId = $currentId + 1;
        file_put_contents($this->idFilePath, $nextId);

        return $nextId;
    }

    private function getFileName(Article $article)
    {
        return $this->filePath.$article->getDate().'.txt';
    }

    private function getFileNameByDate($date)
    {
        return $this->filePath.$date.'.txt';
    }

    public function createArticle(Article $article)
    {
        $article->setId($this->getNextId());

        $articles = $this->getArticlesByDate($article->getDate());
        $articles[$article->getId()] = $article;
        file_put_contents($this->getFileName($article), serialize($articles));
    }

    public function modifyArticle(Article $article)
    {
        //파일이 날짜 기준으로 작성되다보니 이전 글을 지우고 다시 올리는게 더 간단함
        $this->removeArticleById($article->getId());

        $articles = $this->getArticlesByDate($article->getDate());
        $articles[$article->getId()] = $article;
        file_put_contents($this->getFileName($article), serialize($articles));
    }

    public function removeArticleById($id)
    {
        $article = $this->getArticleById($id);
        $filename = $this->getFileNameByDate($article->getDate());

        $articles = unserialize(file_get_contents($filename));

        if(count($articles) == 1){
            unlink($filename);
        }
        else{
            unset($articles[$article->getId()]);
            file_put_contents($this->getFileName($article), serialize($articles));
        }
    }

    /**
     * @param $date
     * @return Article[]|null
     */
    public function getArticlesByDate($date)
    {
        $filename = $this->getFileNameByDate($date);
        if(!file_exists($filename)) {
            return null;
        }

        $articles = unserialize(file_get_contents($filename));
        return $articles;
    }

    public function getArticles()
    {
        $articlesSet = [];

        $dir = scandir($this->filePath);
        foreach($dir as $file_name) {
            if($file_name == '.' || $file_name == '..') continue;
            $date = explode('.', $file_name)[0];

            $articles = $this->getArticlesByDate($date);
            foreach ($articles as $article) {
                /** @var Article $article */
                $articlesSet[$article->getDate().$article->getId()] = $article;
            }
        }
        return $articlesSet;
    }

    public function getArticleById($id) {
        $articles = $this->getArticles();
        foreach ($articles as $article) {
            /** @var Article $article */
            if($article->getId() == $id) return $article;
        }
    }

    public function getArticlesByUserId($userId) {

        $articles = [];

        /** @var Article $article */
        foreach($this->getArticles() as $article)
        {
            if($article->getUser()->getId() == $userId)
                $articles[] = $article;
        }
        return $articles;
    }

}