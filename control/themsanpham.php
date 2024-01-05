<?php
require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanpham = new sanpham();

    // Kiểm tra và xử lý tên sản phẩm
    if (isset($_POST['name'])) {
        $sanpham->settensanpham($_POST['name']);
    }


 
    

    // Kiểm tra và xử lý giá bán
    if (isset($_POST['price'])) {
        $sanpham->setgiaban($_POST['price']);
    }

    // Kiểm tra và xử lý mô tả sản phẩm
    if (isset($_POST['mota'])) {
        $productDescription = $_POST['mota'];
        $mota = nl2br($productDescription);
        $sanpham->setmota($mota);
    }

    // Kiểm tra và xử lý loại sản phẩm
    if (isset($_POST['category'])) {
        $sanpham->setloai($_POST['category']);
    }

    // Kiểm tra và xử lý hãng sản phẩm
    if (isset($_POST['brands'])) {
        $sanpham->setloaicon($_POST['brands']);
    }

    try {
        $dao = new dao();
     $id_sanpham=   $dao->themsanpham($sanpham);
        if (isset($_FILES['image'])) {
            $db= database::getDB();
            
            $total_images_detail = count($_FILES['image']['name']);
        
     
        
            // Lưu hình ảnh chi tiết vào bảng hinhanh
            for ($j = 0; $j < $total_images_detail; $j++) {
                $file_name_detail = $_FILES['image']['name'][$j];
                $file_tmp_detail = $_FILES['image']['tmp_name'][$j];
        
                $query_detail = "INSERT INTO `hinhanh` (`idsanpham`, `hinhanh`) VALUES (:idsanpham, :hinhanh)";
                $statement_detail = $db->prepare($query_detail);
                $statement_detail->bindParam(':idsanpham', $id_sanpham); // ID sản phẩm tương ứng
                $statement_detail->bindParam(':hinhanh', $file_name_detail);
                $statement_detail->execute();
        
                // Di chuyển hình ảnh chi tiết vào thư mục lưu trữ (nếu cần)
                move_uploaded_file($file_tmp_detail, '../image/' . $file_name_detail);
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    }
    header('Location: ../quanly/');
    exit();
}
?>
