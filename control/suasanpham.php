<?php
// Kiểm tra xem dữ liệu POST được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    // Xử lý dữ liệu được gửi từ biểu mẫu
    $sanphamdb = new sanphamdb();

    // Lấy dữ liệu từ biểu mẫu
    $idSanPham = $_POST['spid'];
    echo $idSanPham;
    $tenSanPham = $_POST['name'];
    $giaBan = $_POST['price'];
    $moTa = $_POST['mota'];
    $loaiSanPham = $_POST['category'];
    $loaiconSanPham = $_POST['brand'];
    $sanPhamUpdate = new sanpham();
    // Kiểm tra và xử lý hình ảnh
 echo "bat dau lam";

 if (isset($_FILES['image'])) {
        $db= database::getDB();
        echo "có hình ảnh";
        $total_images_detail = count($_FILES['image']['name']);
        if($total_images_detail>0){
    
 $querry='DELETE FROM hinhanh WHERE idsanpham ='.$idSanPham.'';
    $db->query($querry);
        // Lưu hình ảnh chi tiết vào bảng hinhanh
        for ($j = 0; $j < $total_images_detail; $j++) {
            $file_name_detail = $_FILES['image']['name'][$j];
            $file_tmp_detail = $_FILES['image']['tmp_name'][$j];
    echo $file_name_detail;
            $query_detail = "INSERT INTO `hinhanh` (`idsanpham`, `hinhanh`) VALUES (:idsanpham, :hinhanh)";
            $statement_detail = $db->prepare($query_detail);
            $statement_detail->bindParam(':idsanpham', $idSanPham); // ID sản phẩm tương ứng
            $statement_detail->bindParam(':hinhanh', $file_name_detail);
            $statement_detail->execute();
    
            // Di chuyển hình ảnh chi tiết vào thư mục lưu trữ (nếu cần)
            move_uploaded_file($file_tmp_detail, '../image/' . $file_name_detail);
        }
    
    }
    }else echo "khong lay duoc hinh anh";
    


    // Tạo một đối tượng sản phẩm với dữ liệu mới
   
    $sanPhamUpdate->setidsanpham($idSanPham);
    $sanPhamUpdate->settensanpham($tenSanPham);
    $sanPhamUpdate->setgiaban($giaBan);
    $sanPhamUpdate->setmota($moTa);
    $sanPhamUpdate->setloai($loaiSanPham);
    $sanPhamUpdate->setloaicon($loaiconSanPham);

    // Gán tên hình ảnh vào đối tượng sản phẩm
   

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    if ($sanphamdb->suasanpham($sanPhamUpdate)) {
        // Nếu cập nhật thành công, bạn có thể chuyển hướng người dùng đến một trang khác hoặc thực hiện hành động mong muốn
     header('location: ../quanly/');
     exit();
    } else {
        // Xử lý lỗi nếu cập nhật không thành công
        echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
    }
}
?>
