<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>LAB_1</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Favicon -->
    <link rel="icon" href="img/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
<header class="header-section">
    <div class="container">
        <div class="hatter">
            <div class="hatter__logo">
                <a href="index.php"><img src="img/favicon/favicon.png" alt="Logo" class="hatter__img"></a>
            </div>
            <div class="hatter__desc">
                <p class="hatter__name">
                    Куценко Алкесей <span>285484</span>
                </p>
                <p class="hatter__group">
                    Группа P3232<span>, вариант 2826</span>
                </p>
            </div>
        </div>
    </div>
</header>
<section class="main-offer-section">
    <div class="container">
        <div class="main-offer">
            <form action="validator.php" method="get" id="form" class="main-offer__form d-flex fd-column">
                <h3 class="main-offer__title">
                    Лабораторная работа №1
                </h3>
                <img src="img/pic1.jpg" alt="picture" class="main-offer__pic">
                <p class="main-offer__text">
                  Допустимые значения R: {1, 2, 3, 4, 5}
                </p>
                <input class="main-offer__input" type="text" name="r" id="r" placeholder="Введите R" required>
                <p class="main-offer__message" id="messageR"></p>

                <p class="main-offer__text">
                  Допустимые значения X: {-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2}
                </p>
                <input class="main-offer__input" type="text" name="x" id="x" placeholder="Введите X" required>
                <p class="main-offer__message" id="messageX"></p>

                <p class="main-offer__text">
                  Допустимые значения Y: (-5 ... 3)
                </p>
                <input class="main-offer__input" type="text" name="y" id="y" placeholder="Введите Y" required>
                <p class="main-offer__message" id="messageY"></p>

                <button class="main-offer__btn" type="submit" data-submit>
                    Тык!
                </button>
                <p class="main-offer__subtext">
                    Ваши данные под защитой
                </p>
            </form>
        </div>
    </div>
</section>
<!-- Индикация процесса отправки формы -->
<div id="loader">
    <img src="img/ripple.svg">
</div>

<!-- Сообщение "спасибо" после отправки формы -->
<div id="overlay">
    <div id="thx">
        Спасибо! Мы обязательно вам перезвоним
    </div>
</div>
<footer>
    <div class="container">

    </div>
</footer>

<script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>
