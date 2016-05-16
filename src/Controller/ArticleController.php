<?php

namespace Controller;

use Model\Article;
use Model\Receipt;
use Model\User;

class ArticleController
{
    public static function index(){

        /** @var User $user */
        $user = getCurrentUser();

        if($user == null) {
            header('Location: /?r=/auth');
        }
        $articles = \App::$app->getArticleRepository()->getArticlesByUserId($user->getId());
        view()->render('article_list', ['articles'=>$articles]);
    }

    public static function write() {

        /** @var User $user */
        $user = getCurrentUser();

        if($user == null) {
            header('Location: /?r=/auth');
        }

        view()->render('article_create');
    }

    public static function create(){

        $article = new Article(getCurrentUser(),$_POST["date"],$_POST["subject"],$_POST["content"],$_POST["secret"]);

        for($i = 0; $i < count($_POST["price"]); $i++) {
            $article->addReceipt(new Receipt($_POST["summary"][$i],$_POST["price"][$i],$_POST["currency"][$i]));
        }

        \App::$app->getArticleRepository()->createArticle($article);

        header('Location: /?r=/article/'.$article->getId());
    }

    public static function update($id){
        $article = \App::$app->getArticleRepository()->getArticleById($id);

        $article->setDate($_POST["date"]);
        $article->setSubject($_POST["subject"]);
        $article->setContent($_POST["content"]);
        $article->setSecret($_POST["secret"]);

        $article->deleteAllReceipt();

        for($i = 0; $i < count($_POST["price"]); $i++) {

            $price = $_POST["price"][$i];
            $summary = $_POST["summary"][$i];
            $currency = $_POST["currency"][$i];

            if(!is_numeric($price)) continue;

            $article->addReceipt(new Receipt($summary, $price, $currency));
        }


        \App::$app->getArticleRepository()->modifyArticle($article);

        header('Location: /?r=/article/'.$article->getId());
    }

    public static function modify($id){
        $article = \App::$app->getArticleRepository()->getArticleById($id);

        if(getCurrentUser()->getId() !== $article->getUser()->getId())
        {
            view()->render('not_authorized', ['article'=>$article]);
            return;
        }
        view()->render('article_modify', ['article'=>$article]);
    }

    public static function view($id){

        /** @var User $currentUser */
        $currentUser = getCurrentUser();

        $article = \App::$app->getArticleRepository()->getArticleById($id);
        $isOwner = false;
        if(isset($currentUser) && $article->getUser()->getId() == $currentUser->getId()){
            $isOwner = true;
        }
        view()->render('article', ['article'=>$article, 'isOwner'=>$isOwner]);
    }

    public static function remove($id){
        \App::$app->getArticleRepository()->removeArticleById($id);

        header('Location: /?r=/article');
    }

    public static function userArticles($userId) {
        $articles = \App::$app->getArticleRepository()->getArticlesByUserId($userId);
        view()->render('article_list', ['articles'=>$articles]);
    }
}