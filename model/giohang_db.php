<?php 
class giohangdb
{
   public function themgiohangvaocoso($idtaikhoan, $idsanpham, $tensanpham, $hinhanh, $soluong, $giaban, $thanhtien) {
      $db = database::getDB();
  
      $query = "INSERT INTO giohang (idtaikhoan, idsanpham, tensanpham, hinhanh, soluong, giaban, thanhtien) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
      $statement = $db->prepare($query);
      $statement->execute([$idtaikhoan, $idsanpham, $tensanpham, $hinhanh, $soluong, $giaban, $thanhtien]);

  }


   

   public function laygiohang($idtaikhoan){

      $db =  database::getDB();

      $query =  'select * from giohang where idtaikhoan= '.$idtaikhoan.' ';
    $giohang=array();
    $result=$db->query($query);
    foreach($result as $sanpham){
      $sanphamgiohang= new sanphamgiohang();
      $sanphamgiohang->setIdsanphamgh($sanpham['idsanpham']);
      $sanphamgiohang->setTensanphamgh($sanpham['tensanpham']);
      $sanphamgiohang->setHinhanhgh($sanpham['hinhanh']);
      $sanphamgiohang->setGiabangh($sanpham['giaban']);
      $sanphamgiohang->setSoluonggh($sanpham['soluong']);
      $sanphamgiohang->setThanhtiengh($sanpham['thanhtien']);
      $giohang[]=$sanphamgiohang;
   
    }
    return $giohang;
   }
   public function themsoluong($idtaikhoan,$idsanpham,$soluong,$giaban){

      $db =  database::getDB();
$soluong+=1;
$thanhtien=$soluong*$giaban;


$querry='UPDATE giohang
SET soluong = '.$soluong.', thanhtien = '.$thanhtien.'
WHERE idtaikhoan = '.$idtaikhoan.' AND idsanpham = '.$idsanpham.' ';
$db->query($querry);


   }

   public function giamsoluong($idtaikhoan,$idsanpham,$soluong,$giaban){

      $db =  database::getDB();
$soluong-=1;
$thanhtien=$soluong*$giaban;


$querry='UPDATE giohang
SET soluong = '.$soluong.', thanhtien = '.$thanhtien.'
WHERE idtaikhoan = '.$idtaikhoan.' AND idsanpham = '.$idsanpham.' ';
$db->query($querry);


   }
      public function xoakhoigiohang($idtaikhoan,$idsanpham){

      $db =  database::getDB();



$querry='DELETE FROM `giohang` WHERE idtaikhoan ='.$idtaikhoan.' and idsanpham='.$idsanpham.' ';
$db->query($querry);


   }

public function tongtiengiohang($idtaikhoan) {
    $db = database::getDB();
    $querry = 'SELECT SUM(giaban * soluong) AS tongtien
               FROM giohang
               WHERE idtaikhoan = ' . $idtaikhoan;

    $result = $db->query($querry);
    
    if ($result) {
        $row = $result->fetch(); // Lấy dòng kết quả
        $tongtien = $row['tongtien']; // Lấy giá trị tổng tiền từ cột 'tongtien'

        // Đảm bảo trả về một số (có thể chuyển đổi thành số nếu cần)
        return $tongtien !== null ? (float)$tongtien : 0; // Chuyển đổi thành số float hoặc số nguyên nếu cần
    } else {
        return 0; // Trả về 0 nếu không có kết quả
    }
}




     
}
?>