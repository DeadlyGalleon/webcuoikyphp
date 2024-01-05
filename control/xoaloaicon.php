<?php 
require('../require.php');
if(isset($_GET['id'])){
$loaicondb=new loaicondb();
$loaicondb->xoaloaicon($_GET['id']);


header('Location: ../quanly/quanlydanhmuc.php');
exit();
}

?> 