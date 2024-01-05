<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    $loaicondb=new loaicondb();
    $idloai=$_POST['idloaicon'];
    echo $idloai;
    $tenloai=$_POST['nameloaicon'];
    echo $tenloai;
    $loaicha=$_POST['idloaicha'];
    echo $loaicha;
    
    $loaicondb->sualoaicon($idloai,$tenloai,$loaicha);
    header('location: ../quanly/quanlydanhmuc.php');
    exit();
    

}
?>

