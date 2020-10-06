<?php
session_start();
if(isset($_SESSION['data'])){
    for($i = 0; $i < count($_SESSION['data']); $i++){
        $x = $_SESSION['data'][$i][0];
        $y = $_SESSION['data'][$i][1];
        $r = $_SESSION['data'][$i][2];
        $status = $_SESSION['data'][$i][3];
        $statusClass = $_SESSION['data'][$i][4];
        $time = $_SESSION['data'][$i][5];
        $benchmark = $_SESSION['data'][$i][6];
        print_r('<tr><td>'.$x.'</td><td>'.$y.'</td><td>'.$r.'</td><td class="'.$statusClass.'">'.$status.'</td><td>'.$benchmark.'</td><td>'.$time.'</td></tr>');
    }
}
?>
