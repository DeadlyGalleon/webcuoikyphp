<?php 
session_start();
require('../require.php');

$danhgiadb = new Danhgia_db();
if ( isset($_GET['spid']) && isset($_SESSION['idtk']) ){
    $idtk = $_SESSION['idtk'];
    $idsp = $_GET['spid'];
    $danhgiadb->xoadanhgia($idsp, $idtk);

    header('Location: ../mainwweb/ttsanpham.php?spid=' . $idsp);
    exit;
}
?>
