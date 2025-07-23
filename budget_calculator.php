<?php
$total_income = $total_exp = $balance = $count_inc = $count_exp = $row_length = 0;
if(isset($_POST['inc'])){
    $count_inc = count($_POST['inc']);
    foreach($_POST['inc_amt'] as $amt) {
        $total_income += intval($amt);
    }
}
if(isset($_POST['exp'])){
    $count_exp = count($_POST['exp']);
    foreach($_POST['exp_amt'] as $amt) {
        $total_exp += intval($amt);
    }
}
$row_length = $count_inc > $count_exp ? $count_inc : $count_exp ;
$balance = $total_income - $total_exp;