<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To TravelDiary App</title>
    <script src="/resources/js/jquery-1.12.3.min.js"></script>
    <script src="/resources/js/default.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/xeicon/1.0.4/xeicon.min.css" />
    <link rel="stylesheet" href="/resources/css/default.css" />
    <link rel="stylesheet" href="/resources/css/auth.css" />
    <link rel="stylesheet" href="/resources/css/diary.css" />
    <link rel="stylesheet" href="/resources/css/home.css" />
</head>
<body>
<header id="header">
    <div class="container">
        <a href="/" class="brand pull-left"><h1><i class="xi-flight"></i> Travel Diary</h1></a>

        <ul class="gnb">
            <li><a href="/?r=/article/write" <?php if(isset($_GET['r']) && $_GET['r']=='/article/write') : ?>class="active"<?php endif; ?>>새 글 쓰기</a></li>
            <li><a href="/?r=/articles/my" <?php if(isset($_GET['r']) && $_GET['r']=='/articles/my') : ?>class="active"<?php endif; ?>>내 글 보기</a></li>
        </ul>
        <div class="auth pull-right">
        <?php if(isLogged()) : ?>
            <strong><?=getCurrentUser()->getName()?></strong>님 환영합니다.&nbsp;
            <a href="/?r=/auth/logout">로그아웃</a>
        <?php else: ?>
            <a href="/?r=/auth">로그인</a>
            <a href="/?r=/join">회원가입</a>
        <?php endif; ?>
        </div>
    </div>
</header>

