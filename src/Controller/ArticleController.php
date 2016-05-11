<?php

namespace Controller;

use Model\Article;
use Model\User;

class ArticleController
{
    public static function index(){
        $articles = \App::$app->getArticleRepository()->getArticles();
        view()->render('article_list', ['articles'=>$articles]);
    }

    public static function write() {
        view()->render('article_create');
    }

    public static function create(){
        $article = new Article(getCurrentUser(),$_POST["date"],$_POST["subject"],$_POST["content"],$_POST["secret"]);
        \App::$app->getArticleRepository()->createArticle($article);
    }

    public static function view($id){
        $article = \App::$app->getArticleRepository()->getArticleById($id);
        view()->render('article', ['article'=>$article]);
    }
}