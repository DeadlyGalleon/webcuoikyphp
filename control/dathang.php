<?php session_start();
require('../require.php');




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donhangdb=new donhangdb();
    $diachi=$_POST['diachi'];

 $sodienthoai=$_POST['sodienthoai'];
try {
    //code...
$donhangdb->dathang($diachi,$sodienthoai);
 echo ' <script>';
  echo '  alert("Đặt Hàng Thành Công!");';
  echo "  window.location.href = '../mainwweb/';";

     echo '    </script>;';
} catch (\Throwable $th) {
    echo "có lỗi khi đặt hàng, mời thử lại";
}
  }

?> 

