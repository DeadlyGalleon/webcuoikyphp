<?php
require('../require.php');
session_start();

// Kiểm tra nếu spid được truyền qua URL và phiên giỏ hàng tồn tại
// Kiểm tra nếu action 'xoasanpham' được gửi từ trang giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idsanpham = intval($_POST['productId']);
    $giohangdb=new giohangdb();
    $giohangdb->xoakhoigiohang($_SESSION['idtk'],$idsanpham);
    echo 'success';
    exit;

}
?>
