<?php
require('../require.php');
$giohangdb=new giohangdb();

$sanphamdb=new sanphamdb();
// Start the session
session_start();
$idtk=0;
   if(isset($_SESSION['taikhoan']))  $idtk=$_SESSION['idtk'];

// Kiểm tra xem sản phẩm ID có được gửi từ trang danh sách sản phẩm không
if (isset($_GET['sanphamid'])) {
   
    $sanpham_id = $_GET['sanphamid'];
    $sanpham_info = $sanphamdb->getsanphambyid($sanpham_id);



    // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
    $sanpham_exist = false;
    $giohang=array();
$giohang=$giohangdb->laygiohang($idtk);
foreach($giohang as $sanpham){
if($sanpham->getIdsanphamgh()==$sanpham_id){
    $sanpham_exist = true;
    $giohangdb->themsoluong($idtk,$sanpham_id,$sanpham->getSoluonggh(),$sanpham->getGiabangh());
    break;
}


}

    if (!$sanpham_exist) {
        $hinhanh=$sanphamdb->gethinhanhbyidsanpham($sanpham_id);
        if(count($hinhanh)>0){
        $sanpham_info->sethinhanh($hinhanh[0]['hinhanh']);
        }else{
            $sanpham_info->sethinhanh('khongtontai.png');
        }
      $giohangdb->themgiohangvaocoso($idtk,$sanpham_info->getidsanpham(),$sanpham_info->gettensanpham(),$sanpham_info->gethinhanh(),1,$sanpham_info->getgiaban(),$sanpham_info->getgiaban());


   
    }

    // Chuyển hướng người dùng sau khi thêm sản phẩm vào giỏ hàng
   
} else {
    echo "Không có sản phẩm được chọn để thêm vào giỏ hàng";
}
?>
