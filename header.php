<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Руссификация - Сервис для интеграции иностранцев в культурную среду России!</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- Stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" id="main-styles-link">


</head>
<body>
<div class="wrapper">
    <!-- Page Header-->
    <header class="section page-header">
        <div class="logo rel">
            <img src="images/logo.png" alt="Сервис для интеграции иностранцев в культурную среду России!">
            <p>Сервис для интеграции иностранцев в культурную среду России!</p>
        </div>
        <nav>
            <ul class="main_menu">
                <li><a href="/">Главная</a></li>
                <li><a>О сервисе</a></li>
                <li><a>Контакты</a></li>
                <?php if ( isset ($_SESSION['logged_user']) ) : ?>
                    <li><a href="tests.php">Тесты</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="lk">
            <?php if ( isset ($_SESSION['logged_user']) ) : ?>
                <a href="" class="reg"><?php echo $_SESSION['logged_user']->login; ?> Баллов: <?php echo $_SESSION['logged_user']->ball; ?> </a>
                <a href="logout.php" class="enter">Выйти</a>


            <?php else : ?>

                <a href="signup.php" class="reg cd-signin">Регистрация</a>
                <a href="login.php" class="enter ">Войти</a>
            <?php endif; ?>

        </div>
    </header>
</div>