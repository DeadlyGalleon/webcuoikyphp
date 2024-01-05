<?php

require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loaicondb=new loaicondb();
$loaicon=$_POST['nameloaicon'];
$loaicha=$_POST['category'];
$loaicondb->themloaicon($loaicon,$loaicha);




header('Location: ../quanly/quanlydanhmuc.php');
exit();

}



?> 