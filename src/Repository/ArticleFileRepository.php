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

        $articles[$article->getId()] = $article;
        file_put_contents($this->getFileName($article), serialize($articles));
    }

    public function getArticlesByDate($date)
    {
        $articles = unserialize(file_get_contents($this->getFileNameByDate($date)));
        return $articles;
    }

    public function getArticles()
    {
        $articlesSet = [];

        $dir = scandir("./diary/");
        foreach($dir as $file_name) {
            if($file_name == '.' || $file_name == '..') continue;
            $date = explode('.', $file_name)[0];


            $articles = $this->getArticlesByDate($date);
            foreach ($articles as $article) {
                /** @var Article $article */
                $articlesSet[$article->getDate()] = $article;
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

}