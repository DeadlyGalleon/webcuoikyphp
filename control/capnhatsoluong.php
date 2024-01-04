<?php
require('../require.php');
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['quantity']) && isset($_POST['productId'])) {
        $soluongmoi = intval($_POST['quantity']);
        $idsanpham = intval($_POST['productId']);
        $giaSanPham=0;
        $giohangdb=new giohangdb();
        $giohang=$giohangdb->laygiohang($_SESSION['idtk']);
        foreach($giohang as $sanpham){
            if($sanpham->getIdsanphamgh()==$idsanpham){
                $giaSanPham=$sanpham->getGiabangh();
                if($sanpham->getSoluonggh()<$soluongmoi){
$giohangdb->themsoluong($_SESSION['idtk'],$idsanpham,$sanpham->getSoluonggh(),$sanpham->getGiabangh());
                }else{
                    $giohangdb->giamsoluong($_SESSION['idtk'],$idsanpham,$sanpham->getSoluonggh(),$sanpham->getGiabangh());
                }
            }
        }

       $giamoi = $soluongmoi * $giaSanPham;

        // Phản hồi về tổng tiền mới để cập nhật trang web
        echo $giamoi;
    } else {
        http_response_code(400); // Bad request - Dữ liệu không hợp lệ
        echo "Dữ liệu không hợp lệ";
    }
} else {
    http_response_code(405); // Method Not Allowed - Phương thức không được phép
    echo "Phương thức không được phép";
}
?>
