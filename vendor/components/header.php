<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.css" />
    <title>F&B</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__row">
                <div class="header__row_logo">
                    <a href="/" class="header__row_logo-link">
                        <img src="/assets/img/logo.png" alt="not founded" class="header__row_img">
                    </a>
                </div>
                <nav class="header__row_nav">
                    <div class="header__row_list">
                        <a href="" class="header__row_link">
                            <li class="header__row_li">Каталог</li>
                        </a>
                        <a href="" class="header__row_link">
                            <li class="header__row_li">Галерея</li>
                        </a>
                        <a href="" class="header__row_link">
                            <li class="header__row_li">О лаборатории</li>
                        </a>
                        <a href="" class="header__row_link">
                            <li class="header__row_li">Контакты</li>
                        </a>
                    </div>
                </nav>
                <div class="header__row_btns">
                    <div class="header__row_search">
                        <img src="/assets/img/search.svg" alt="not founded" class="header__row_search-img">
                    </div>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="<?php echo $enter ?>" class="header__row_logout-link">
                            <button class="header__row_logout">
                                <img src="/assets/img/log-in.svg" alt="not founded" class="header__row_logout-img">
                            </button>
                        </a>
                    <?php } else { ?>
                        <button class="header__row_logout user-btn">
                            <img src="/assets/img/user.svg" alt="not founded" class="header__row_logout-img">
                        </button>
                        <section class="header__user-menu hidden">
                            <a href="/vendor/components/profile.php" class="header__user-menu_item">Профиль</a>
                            <?php if ($_SESSION['user']['role'] == 2) { ?>
                                <a href="/vendor/components/admin.php" class="header__user-menu_item">Админ-панель</a>
                            <?php } ?>
                            <a href="/vendor/functions/logout.php" class="header__user-menu_item">Выход</a>
                        </section>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>