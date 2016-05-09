<?php

namespace Controller;

use Model\Article;

class ArticleController
{
    public static function index(){
        view()->render('article_list');
    }

    public static function write() {
        view()->render('article_create');
    }

    public static function create(){
        var_dump($_POST);
        $art1 = new Article($_POST["date"],$_POST["subject"],$_POST["content"],$_POST["secret"]);


        date_default_timezone_set("Asia/Seoul");
        $str = date("Y-m-d his",time()).".txt";

        $pFile = fopen("./diary/".$str,"w");
        fwrite($pFile, $art1->getDate()." ".$art1->getSubject()." ".$art1->getContent()." ".$art1->getSecret());
        fclose($pFile);
    }

}