<?php 
session_start();
require('../require.php');

$danhgiadb = new Danhgia_db();
date_default_timezone_set('Asia/Ho_Chi_Minh');      
$ngaygio = date('Y-m-d H:i:s');
$idtk = $_SESSION['idtk'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['spid'])){

    $idsp = $_GET['spid'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Gọi hàm themdanhgia và truyền giá trị từ form vào
    $danhgiadb->themdanhgia($idtk, $idsp, $rating, $comment, $ngaygio);

    // Chuyển hướng trở lại trang gốc hoặc trang thành công
    header('Location: ../mainwweb/ttsanpham.php?spid=' . $idsp);
    exit;
}


?> 