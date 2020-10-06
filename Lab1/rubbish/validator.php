
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Таблица</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="/css/table.css">
    <!-- Favicon -->
    <link rel="icon" href="img/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
  </head>
  <body>
    <?php

    $start = microtime(true); // Время начала исполнения скрипта
    $validR = array(1, 2, 3, 4, 5);
    $validX = array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2);
    $r = intval(htmlspecialchars($_GET["r"]));
    $x = floatval(htmlspecialchars($_GET["x"]));
    $y = floatval(htmlspecialchars($_GET["y"]));
    $result = "";
    $time = 0;
    if (!is_null($r) && !is_null($x) && !is_null($y)) {

      if (!in_array($r, $validR)) {
        $result = "Invalid R";
      }
      if (!in_array($x, $validX)) {
        $result = "Invalid X";
      }
      if ($y > 3 || $y < -5) {
        $result = "Invalid Y";
      }

      if ((($x <= 0 && $y >= 0 && abs($x) <= $r && abs($y) <= $r)) ||
          ($x >= 0 && $y >= 0 && ($x + $y <= $r)) ||
          ($x >= 0 && $y <= 0 && 4*($x*$x+$y*$y) <= $r*$r)) {
        $result = "Yes";
      } else {
        $result = "No";
      }
      $time = microtime(true) - $start;
      // Сохранение инфо о лидах в файл leads.xls
      $f = fopen("leads.xls", "a+");
      fwrite($f," <tr>");
      fwrite($f," <td>$r</td> <td>$x</td> <td>$y</td> ");
      fwrite($f," <td>$result</td>");
      fwrite($f," <td>" . strval(number_format($time, 10, ".", "")*1000) . 'ms' . "</td>");
      fwrite($f," </tr>");
      fwrite($f,"\n");
      fclose($f);
    }

    ?>
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
    <section class="table-section">
        <div class="container">
            <div class="table">
                <div class="table__card">
                    <p class="table__header">R</p>
                    <p class="table__number"><?php echo $r ?></p>
                </div>
                <div class="table__card">
                    <p class="table__header">X</p>
                    <p class="table__number"><?php echo $x ?></p>
                </div>
                <div class="table__card">
                    <p class="table__header">Y</p>
                    <p class="table__number"><?php echo $y ?></p>
                </div>
                <div class="table__card">
                    <p class="table__header">Time</p>
                    <p class="table__number"><?php echo number_format($time, 10, ".", "")*1000 . 'ms' ?></p>
                </div>
                <div class="table__card">
                    <p class="table__header">Answer</p>
                    <p class="table__number"><?php echo $result ?></p>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </body>
</html>
