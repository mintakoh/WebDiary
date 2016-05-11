<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To TravelDiary App</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/xeicon/1.0.4/xeicon.min.css" />
    <link rel="stylesheet" href="/resources/css/default.css" />
    <link rel="stylesheet" href="/resources/css/auth.css" />
    <link rel="stylesheet" href="/resources/css/diary.css" />
</head>
<body>
<header id="header">
    <div class="container">
        <h1 class="brand pull-left"><i class="xi-flight"></i> Travel Diary</h1>

        <div class="auth pull-right">
        <?php if(isLogged()) : ?>
            <strong><?=getCurrentUser()->getName()?></strong>님&nbsp;
            <a href="/?r=/auth/logout">로그아웃</a>
        <?php else: ?>
            <a href="/?r=/auth">로그인</a>
        <?php endif; ?>
        </div>
    </div>
</header>

