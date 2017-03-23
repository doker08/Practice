<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/lib/css/style.css"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Закупки</title>
</head>
<body>
<div id="header">
    <div id="navbar">
        <a class="logo" href="#">ЗАКУПКИ</a>
            <div class="right">
                <?php if(!isset($_SESSION['user'])):?>
                    <a href="/user/login">Войти</a>
                    <a href="/user/register">Регистрация</a>
                <?php endif ?>
                <?php if(isset($_SESSION['user'])):?>
                    <?php if($_SESSION['usertype'] == ADMIN): ?>
                        <a href="/admin">Админ</a>
                    <?php elseif($_SESSION['usertype'] == DISTRIBUTOR): ?>
                        <a href="/distributor/orders">Заявки</a>
                        <a href="/distributor/consumers">Заказчики</a>
                        <a href="/distributor/products">Мои товары</a>
                    <?php elseif($_SESSION['usertype'] == CONSUMER): ?>
                        <a href="/consumer/create_order">Создать заявку</a>
                        <a href="/consumer/timetable">Поставки</a>
                        <a href="/consumer/distributors">Поставщики</a>
                    <?php endif; ?>
                    <a class="user" href="/cabinet"><?php echo $_SESSION['username'] ?></a>
                    <a href="/user/logout">Выйти</a>
                <?php endif ?>
            </div>
    </div>
</div>
<div id="main">
    <div id="content">