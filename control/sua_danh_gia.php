<?php 
session_start();
require('../require.php');

$danhgiadb = new Danhgia_db();
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$ngaygio = date('Y-m-d H:i:s'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['spid']) && isset($_SESSION['idtk'])){
    // Lấy thông tin từ yêu cầu
    $idtk = $_SESSION['idtk'];
    $idsp = $_GET['spid'];
    $comment = $_POST['binhluan'];
    $rating = $_POST['rating'];

    $danhgiadb->suadanhgia($idtk, $idsp, $rating, $comment, $ngaygio);
    header('Location: ../mainwweb/ttsanpham.php?spid=' . $idsp);
    exit;
}
// ../mainwweb/
?>