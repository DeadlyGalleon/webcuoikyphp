<?php
  
class donhangdb {


    public function getalldonhang() {
        $db = database::getDB();
    
        $query = 'SELECT donhang.iddonhang, donhang.idtaikhoan, donhang.tongtien, donhang.ngaydat, donhang.diachi,donhang.ngaygiao,donhang.sodienthoai,donhang.trangthai,
                  sanphamdonhang.iddonhang, sanphamdonhang.idsanpham,sanphamdonhang.tensanpham,sanphamdonhang.hinhanh, sanphamdonhang.giacu, sanphamdonhang.soluong, sanphamdonhang.thanhtiengiacu
                  FROM donhang
                  JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang order by donhang.iddonhang desc;';
    
        $statement = $db->prepare($query);
        $statement->execute();
    
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $orders = array();
    
        foreach ($listalldonhang as $donhang) {
            $iddonhang = $donhang['iddonhang'];
    
            if (!array_key_exists($iddonhang, $orders)) {
                $orders[$iddonhang] = array(
                    'thongtindonhang' => array(
                        'iddonhang' => $donhang['iddonhang'],
                        'idtaikhoan' => $donhang['idtaikhoan'],
                        'tongtien' => $donhang['tongtien'],
                        'ngaydat'=>$donhang['ngaydat'],
                        'diachi'=>$donhang['diachi'],
                        'sodienthoai'=>$donhang['sodienthoai'],
                        'ngaygiao' => $donhang['ngaygiao'],
                        'trangthai' => $donhang['trangthai']
                    ),
                    'sanphamdonhang' => array()
                );
            }
    
            $orders[$iddonhang]['sanphamdonhang'][] = array(
                'idsanpham' => $donhang['idsanpham'],
                'tensanpham'=>$donhang['tensanpham'],
                'hinhanh' => $donhang['hinhanh'],
                'giacu' => $donhang['giacu'],
                'soluong' => $donhang['soluong'],
                'thanhtiengiacu' => $donhang['thanhtiengiacu']
            );
        }
    
        $result = array_values($orders);
    
        return $result;
    }

    public function getdonhangtu($dau, $cuoi) {
        $db = database::getDB();
    
        $query = 'SELECT donhang.iddonhang, donhang.idtaikhoan, donhang.tongtien, donhang.ngaydat, donhang.diachi, donhang.ngaygiao, donhang.sodienthoai, donhang.trangthai,
                  sanphamdonhang.iddonhang, sanphamdonhang.idsanpham, sanphamdonhang.tensanpham, sanphamdonhang.hinhanh, sanphamdonhang.giacu, sanphamdonhang.soluong, sanphamdonhang.thanhtiengiacu
                  FROM donhang
                  JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang 
                  WHERE donhang.iddonhang > :dau AND donhang.iddonhang <= :cuoi
                  ORDER BY donhang.iddonhang DESC';
    
        $statement = $db->prepare($query);
        $statement->bindParam(':dau', $dau, PDO::PARAM_INT);
        $statement->bindParam(':cuoi', $cuoi, PDO::PARAM_INT);
        $statement->execute();
    
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $orders = array();
    
        foreach ($listalldonhang as $donhang) {
            $iddonhang = $donhang['iddonhang'];
    
            if (!array_key_exists($iddonhang, $orders)) {
                $orders[$iddonhang] = array(
                    'thongtindonhang' => array(
                        'iddonhang' => $donhang['iddonhang'],
                        'idtaikhoan' => $donhang['idtaikhoan'],
                        'tongtien' => $donhang['tongtien'],
                        'ngaydat' => $donhang['ngaydat'],
                        'diachi' => $donhang['diachi'],
                        'sodienthoai' => $donhang['sodienthoai'],
                        'ngaygiao' => $donhang['ngaygiao'],
                        'trangthai' => $donhang['trangthai']
                    ),
                    'sanphamdonhang' => array()
                );
            }
    
            $orders[$iddonhang]['sanphamdonhang'][] = array(
                'idsanpham' => $donhang['idsanpham'],
                'tensanpham' => $donhang['tensanpham'],
                'hinhanh' => $donhang['hinhanh'],
                'giacu' => $donhang['giacu'],
                'soluong' => $donhang['soluong'],
                'thanhtiengiacu' => $donhang['thanhtiengiacu']
            );
        }
    
        $result = array_values($orders);
    
        return $result;
    }
    
    
    






    public function getalldonhangcuataikhoan($taikhoan) {
        $db = database::getDB();
    
        $query = 'SELECT donhang.iddonhang, donhang.idtaikhoan, donhang.tongtien, donhang.ngaydat, donhang.diachi,donhang.ngaygiao,donhang.sodienthoai,donhang.trangthai,
                  sanphamdonhang.iddonhang, sanphamdonhang.idsanpham,sanphamdonhang.tensanpham,sanphamdonhang.hinhanh, sanphamdonhang.giacu, sanphamdonhang.soluong, sanphamdonhang.thanhtiengiacu
                  FROM donhang
                  JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang where donhang.idtaikhoan='.$taikhoan.' order by donhang.iddonhang desc;';
    
        $statement = $db->prepare($query);
        $statement->execute();
    
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $orders = array();
    
        foreach ($listalldonhang as $donhang) {
            $iddonhang = $donhang['iddonhang'];
    
            if (!array_key_exists($iddonhang, $orders)) {
                $orders[$iddonhang] = array(
                    'thongtindonhang' => array(
                        'iddonhang' => $donhang['iddonhang'],
                        'idtaikhoan' => $donhang['idtaikhoan'],
                        'tongtien' => $donhang['tongtien'],
                        'ngaydat'=>$donhang['ngaydat'],
                        'diachi'=>$donhang['diachi'],
                        'sodienthoai'=>$donhang['sodienthoai'],
                        'ngaygiao' => $donhang['ngaygiao'],
                        'trangthai' => $donhang['trangthai']
                    ),
                    'sanphamdonhang' => array()
                );
            }
    
            $orders[$iddonhang]['sanphamdonhang'][] = array(
                'idsanpham' => $donhang['idsanpham'],
                'tensanpham'=>$donhang['tensanpham'],
                'hinhanh' => $donhang['hinhanh'],
                'giacu' => $donhang['giacu'],
                'soluong' => $donhang['soluong'],
                'thanhtiengiacu' => $donhang['thanhtiengiacu']
            );
        }
    
        $result = array_values($orders);
    
        return $result;
    }



    public function dathang($diachi,$sodienthoai) {
        
        $idtaikhoan = $_SESSION['idtk'];
$tongtien = 0; 
$db = database::getDB();


$idtaikhoan = $_SESSION['idtk'];
$tongtien = 0; 
$giohangdb=new giohangdb();
$sanphamdb=new sanphamdb();

$giohang=$giohangdb->laygiohang($idtaikhoan); 

$sql_donhang = "INSERT INTO donhang (idtaikhoan, tongtien, ngaydat, diachi, ngaygiao,sodienthoai, trangthai) VALUES ('$idtaikhoan', '$tongtien', NOW(), '$diachi', '','$sodienthoai', 0)";

if ($db->exec($sql_donhang)) {
    $iddonhang = $db->lastInsertId();

   
  
        foreach ($giohang as  $sanpham) {
            $idsanpham = $sanpham->getIdsanphamgh();
            $tensanpham=$sanpham->getTensanphamgh();
            $hinhanh=$sanphamdb->gethinhanhbyidsanpham($idsanpham);
            if(count($hinhanh)>0){
                $hinhanh=$hinhanh[0]['hinhanh'];
            }else{
                $hinhanh=$sanpham->getHinhanhgh();
            }

            $giacu = $sanpham->getGiabangh();
            $soluong = $sanpham->getSoluonggh(); 
            $thanhtiengiacu = $sanpham->getThanhtiengh();
$tongtien+=  $sanpham->getThanhtiengh();
         
            $sql_sanpham_donhang = "INSERT INTO sanphamdonhang (iddonhang, idsanpham,tensanpham,hinhanh, giacu, soluong, thanhtiengiacu) VALUES ('$iddonhang', '$idsanpham','$tensanpham','$hinhanh', '$giacu', '$soluong', '$thanhtiengiacu')";

          $db->query($sql_sanpham_donhang);
             
       
        }
    $querry=  'UPDATE `donhang` SET `tongtien` = '.$tongtien.' WHERE `donhang`.`iddonhang` = '.$iddonhang.'';
    $db->query($querry);
    $querry= 'DELETE FROM `giohang` WHERE idtaikhoan = '.$idtaikhoan.'';
    $db->query($querry);
       
    
} else {
    echo "Lỗi khi thêm đơn hàng!";
}
        
    
        
    }
    public function getdonhangbyid($iddonhang) {
        $db = database::getDB();
    
        $query = 'SELECT donhang.iddonhang, donhang.idtaikhoan, donhang.tongtien, donhang.ngaydat, donhang.diachi,donhang.ngaygiao,donhang.sodienthoai,donhang.trangthai,
                  sanphamdonhang.iddonhang, sanphamdonhang.idsanpham,sanphamdonhang.tensanpham,sanphamdonhang.hinhanh, sanphamdonhang.giacu, sanphamdonhang.soluong, sanphamdonhang.thanhtiengiacu
                  FROM donhang
                  JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang where donhang.iddonhang='.$iddonhang.'';
    
        $statement = $db->prepare($query);
        $statement->execute();
    
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $orders = array();
    
        foreach ($listalldonhang as $donhang) {
            $iddonhang = $donhang['iddonhang'];
    
            if (!array_key_exists($iddonhang, $orders)) {
                $orders[$iddonhang] = array(
                    'thongtindonhang' => array(
                        'iddonhang' => $donhang['iddonhang'],
                        'idtaikhoan' => $donhang['idtaikhoan'],
                        'tongtien' => $donhang['tongtien'],
                        'ngaydat'=>$donhang['ngaydat'],
                        'diachi'=>$donhang['diachi'],
                        'sodienthoai'=>$donhang['sodienthoai'],
                        'ngaygiao' => $donhang['ngaygiao'],
                        'trangthai' => $donhang['trangthai']
                    ),
                    'sanphamdonhang' => array()
                );
            }
    
            $orders[$iddonhang]['sanphamdonhang'][] = array(
                'idsanpham' => $donhang['idsanpham'],
                'tensanpham'=>$donhang['tensanpham'],
                'hinhanh' => $donhang['hinhanh'],
                'giacu' => $donhang['giacu'],
                'soluong' => $donhang['soluong'],
                'thanhtiengiacu' => $donhang['thanhtiengiacu']
            );
        }
    
        $result = array_values($orders);
    
        return $result;
    }


    public function thaydoitrangthai($iddonhang,$trangthai) {
        $db = database::getDB();
    
        $query = 'UPDATE `donhang` SET `trangthai` = '.$trangthai.' WHERE `donhang`.`iddonhang` = '.$iddonhang.';';
    
      $db->query($query);
    
      
    }
    public function dagiao($iddonhang) {
        $db = database::getDB();
    
        // Cập nhật ngày giao và trạng thái đơn hàng
        $query = 'UPDATE `donhang` SET `ngaygiao` = NOW(), `trangthai` = 4 WHERE `donhang`.`iddonhang` = :iddonhang';
        
        $statement = $db->prepare($query);
        $statement->bindParam(':iddonhang', $iddonhang);
        $statement->execute();
    
        // Lấy thông tin đơn hàng dựa trên iddonhang
        $donhangdb = new donhangdb();
        $listalldonhang = $donhangdb->getdonhangbyid($iddonhang);
    
        // Kiểm tra và cập nhật số lượng sản phẩm đã mua
        foreach ($listalldonhang as $donhang) {
            foreach ($donhang['sanphamdonhang'] as $sanpham) {
                $idsanpham = $sanpham['idsanpham'];
                $soluong = $sanpham['soluong'];
    
                // Cập nhật số lượng đã mua của sản phẩm trong bảng ten_bang_san_pham
                $sql = 'UPDATE sanpham SET lanmua = lanmua + :soluong WHERE idsanpham = :idsanpham';
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':soluong', $soluong);
                $stmt->bindParam(':idsanpham', $idsanpham);
                echo $sql;
                $stmt->execute();
        
        }}
    }
    





    




}






 ?>
