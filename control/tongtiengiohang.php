<?php
require('../require.php');
session_start();

$totalAmount = 0; // Tổng tiền của giỏ hàng

$giohangdb=new giohangdb();
$totalAmount = $giohangdb->tongtiengiohang($_SESSION['idtk']);


echo $totalAmount;
?>
