<?php

session_start();

$start = microtime(true); // Время начала исполнения скрипта
$validR = array(1, 2, 3, 4, 5);
$validX = array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2);
$r = intval(htmlspecialchars($_GET["r"]));
$x = floatval(htmlspecialchars($_GET["x"]));
$y = floatval(htmlspecialchars($_GET["y"]));
date_default_timezone_set("Europe/Moscow");
$current_time = date("H:i:s");
$message = "";
$class = "No";

if ((($x <= 0 && $y >= 0 && abs($x) <= $r && abs($y) <= $r)) ||
     ($x >= 0 && $y >= 0 && ($x + $y <= $r)) ||
     ($x >= 0 && $y <= 0 && 4*($x*$x+$y*$y) <= $r*$r)) {
  $message = "Yes";
  $class = "Yes";
} else {
  $message = "No";
}

if (!is_null($r) && !is_null($x) && !is_null($y)) {
  if ($r == 0 && $x == 0 && $y == 0) {
    $message = "Insert Data";
  } else {
    if (!in_array($r, $validR)) {
      $message = "Invalid R";
    }
    if (!in_array($x, $validX)) {
      $message = "Invalid X";
    }
    if ($y > 3 || $y < -5) {
      $message = "Invalid Y";
    }
  }




  $time = strval(number_format(microtime(true) - $start, 10, ".", "")*1000) . 'ms';

  // Сохранение в сессию
  $result = array($x, $y, $r, $message, $time, $current_time);
  if (!isset($_SESSION['results'])) {
    $_SESSION['results'] = array();
  }
  array_push($_SESSION['results'], $result);

  // Печать в таблицу
  print_r('<tr><td>'.$x.'</td><td>'.$y.'</td><td>'.$r.'</td><td class="'.$class.'">'.$message.'</td><td>'.$time.'</td><td>'.$current_time.'</td></tr>');
  // header('Location: index.php');
}


?>
