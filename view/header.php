<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To TravelDiary App</title>
    <style>

        * {
            padding: 0;
            margin: 0;
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
    Travel Diary
    </div>
</header>
<div class="container">

