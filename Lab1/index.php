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
<div class="header-section">
    <div class="container">
        <div class="hatter d-flex">
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
</div>
<div class="section">
  <div class="main-offer">
    <form id="form" class="main-offer__form d-flex fd-column">
        <h3 class="main-offer__title">
            Лабораторная работа №1
        </h3>
        <img src="img/pic1.jpg" alt="picture" class="main-offer__pic">

        <p class="main-offer__text">
          Выберете X:
          <select class="main-offer__select main-offer__select_R" name="x" id="x">
              <option value="-2">-2</option>
              <option value="-1.5">-1.5</option>
              <option value="-1">-1</option>
              <option value="-0.5">-0.5</option>
              <option value="0">0</option>
              <option value="0.5">0.5</option>
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
          </select>
        </p>
        <p class="main-offer__message" id="messageX"></p>

        <p class="main-offer__text">
          Допустимые значения Y: (-5 ... 3)
        </p>
        <input class="main-offer__input" type="text" name="y" id="y" placeholder="Введите Y" required>
        <p class="main-offer__message" id="messageY"></p>

        <p class="main-offer__text">
          Выберете R:
          <select class="main-offer__select main-offer__select_R" name="r" id="r">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>
        </p>
        <p class="main-offer__message" id="messageR"></p>

        <button class="main-offer__btn" data-submit>
            Тык
        </button>
        <p class="main-offer__subtext">
            Ваши данные под защитой
        </p>
    </form>
  </div>
  <div class="table-wrap">
    <table id="table">
        <tbody id="tbody">
            <tr>
                <td>X</td>
                <td>Y</td>
                <td>R</td>
                <td>Результат</td>
                <td>Выполнение</td>
                <td>Время</td>
            </tr>
            <?php
            session_start();
            if (isset($_SESSION['results'])) {
              foreach ($_SESSION['results'] as $result) { ?>
              <tr>
                <td><?php echo $result[0] ?></td>
                <td><?php echo $result[1] ?></td>
                <td><?php echo $result[2] ?></td>
                <td class="<?php echo $result[3] ?>"><?php echo $result[3] ?></td>
                <td><?php echo $result[4] ?></td>
                <td><?php echo $result[5] ?></td>
              </tr>
          <?php }} ?>
        </tbody>
    </table>
  </div>
</div>

<script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>
