<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To TravelDiary App</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/xeicon/1.0.4/xeicon.min.css">



    <style>

        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #f5f8fa;
            font-size: 12px;
        }

        .pull-left {
            float: left;
        }
        .pull-right {
            float: right;
        }
        .container {
            margin: 0 auto;
            width: 900px;
        }

        #header {
            width: 100%;
            height: 60px;
            line-height: 60px;
            border-bottom: 1px solid #e1e8ed;
            background: #fff;
        }
        #header .brand {
            font-weight: normal;
            font-size: 18px;
        }

        .secret_password{
            display: none;
        }

        .check_secret:checked ~ .secret_password{
            display: inline;
        }
    </style>
</head>
<body>
<header id="header">
    <div class="container">
        <h1 class="brand pull-left"><i class="xi-flight"></i> Travel Diary</h1>

        <div class="auth pull-right">
        <?php if(isLogged()) : ?>
            <?=getCurrentUser()->getName()?>님
            <a href="/?r=/auth/logout">로그아웃</a>
        <?php else: ?>
            <a href="/?r=/auth">로그인</a>
        <?php endif; ?>
        </div>
    </div>
</header>
<div class="container">

