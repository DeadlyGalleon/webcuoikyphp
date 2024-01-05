<?php
class thongkedb{

    public function getallthongke() {
     $db=database::getDB();
$query='SELECT thongke.idthongke, thongke.iddau, thongke.idsau, thongke.banduoc, thongke.doanhthu, thongke.ngayxuat,sanphamthongke.idsanpham,sanphamthongke.tensanpham,sanphamthongke.hinhanh, sanphamthongke.giacu, sanphamthongke.soluong, sanphamthongke.thanhtien
FROM thongke
JOIN sanphamthongke ON thongke.idthongke = sanphamthongke.idthongke order by thongke.idthongke DESC';
$listthongke=array();

$statement = $db->prepare($query);
        $statement->execute();
    
        $listthongke = $statement->fetchAll(PDO::FETCH_ASSOC);

        $orders = array();
    
        foreach ($listthongke as $thongke) {
            $idthongke = $thongke['idthongke'];
    
            if (!array_key_exists($idthongke, $orders)) {
                $orders[$idthongke] = array(
                    'thongtinthongke' => array(
                        'idthongke' => $thongke['idthongke'],
                        'iddau' => $thongke['iddau'],
                        'idsau' => $thongke['idsau'],
                        'banduoc'=> $thongke['banduoc'],
                        'doanhthu'=>$thongke['doanhthu'],
                        'ngayxuat'=>$thongke['ngayxuat']
                    
                    ),
                    'sanphamthongke' => array()
                );
            }
    
            $orders[$idthongke]['sanphamthongke'][] = array(
                'idsanpham' => $thongke['idsanpham'],
                'tensanpham'=>$thongke['tensanpham'],
                'hinhanh' => $thongke['hinhanh'],

                'soluong' => $thongke['soluong'],
                'thanhtien' => $thongke['thanhtien']
            );
        }
    count($orders);
        $result = array_values($orders);
    
        return $result;
        


    }
    public function xuatthongke() {
        $db = database::getDB();
        $donhangdb = new donhangdb();
    
        // Lấy giá trị iddonhang cuối cùng với trạng thái là 4
        $queryCuoi = 'SELECT iddonhang FROM donhang WHERE trangthai = 4 ORDER BY iddonhang DESC LIMIT 1';
        $statementCuoi = $db->query($queryCuoi);
        $resultCuoi = $statementCuoi->fetch(PDO::FETCH_ASSOC);
        $cuoi = intval($resultCuoi['iddonhang']);
    
        // Lấy giá trị idsau cuối cùng từ bảng thongke
        $queryDau = 'SELECT idsau FROM thongke ORDER BY idthongke DESC LIMIT 1';
        $statementDau = $db->query($queryDau);
        $resultDau = $statementDau->fetch(PDO::FETCH_ASSOC);
        $dau = intval($resultDau['idsau']);
    
        $listalldonhang = $donhangdb->getdonhangtu($dau, $cuoi);
        $sql = "INSERT INTO `thongke` (`idthongke`, `iddau`, `idsau`, `doanhthu`, `ngayxuat`) VALUES (NULL, $dau, $cuoi, 0, NOW())";
        $db->query($sql);
        
        $idthongke=$db->lastInsertId();
        $listsanpham = array();
$banduoc=0;
        foreach ($listalldonhang as $donhang) {
            if($donhang['thongtindonhang']['trangthai']==4){
            foreach ($donhang['sanphamdonhang'] as $sanpham) {
                $idsanpham = $sanpham['idsanpham'];
                $soluong = $sanpham['soluong'];
                $thanhtiengiacu = $sanpham['thanhtiengiacu'];
                $tensanpham = $sanpham['tensanpham'];
                $hinhanh = $sanpham['hinhanh'];
        
                // Kiểm tra xem sản phẩm đã tồn tại trong listsanpham hay chưa
                if (array_key_exists($idsanpham, $listsanpham)) {
                    // Nếu đã tồn tại sản phẩm, cập nhật số lượng, thành tiền và thông tin khác
                    $listsanpham[$idsanpham]['soluong'] += $soluong;
                    $listsanpham[$idsanpham]['thanhtiengiacu'] += $thanhtiengiacu;
                } else {
                    // Nếu sản phẩm chưa tồn tại, thêm mới vào listsanpham
                    $listsanpham[$idsanpham] = array(
                        'idsanpham' => $idsanpham,
                        'soluong' => $soluong,
                        'thanhtiengiacu' => $thanhtiengiacu,
                        'tensanpham' => $tensanpham,
                        'hinhanh' => $hinhanh
                    );
                }
            }
        $banduoc++;
        }
        }
echo $dau;
echo $cuoi;
    // Thêm thông tin sản phẩm vào bảng sanphamthongke và cập nhật doanhthu trong bảng thongke
    foreach ($listsanpham as $sanpham) {
        $idsanpham = $sanpham['idsanpham'];
        $soluong = $sanpham['soluong'];
        $thanhtiengiacu = $sanpham['thanhtiengiacu'];
        $tensanpham = $sanpham['tensanpham'];
        $hinhanh = $sanpham['hinhanh'];
    
        // Thêm hoặc cập nhật thông tin sản phẩm trong bảng sanphamthongke
        $sqlSanPhamThongKe = "INSERT INTO `sanphamthongke` (`idthongke`, `idsanpham`, `soluong`, `thanhtien`, `tensanpham`, `hinhanh`) 
                               VALUES ($idthongke, $idsanpham, $soluong, $thanhtiengiacu, '$tensanpham', '$hinhanh')
                               ON DUPLICATE KEY UPDATE 
                               `soluong` = `soluong` + VALUES(soluong),
                               `thanhtien` = `thanhtien` + VALUES(thanhtien)";
        $db->query($sqlSanPhamThongKe);
    
        // Cập nhật doanh thu trong bảng thongke
        $sqlCapNhatDoanhThu = "UPDATE `thongke` SET `doanhthu` = `doanhthu` + $thanhtiengiacu WHERE `idthongke` = $idthongke";
        $db->query($sqlCapNhatDoanhThu);
        $sqlCapNhatBanDuoc = "UPDATE `thongke` SET `banduoc` = :banduoc WHERE `idthongke` = :idthongke";
        $statement = $db->prepare($sqlCapNhatBanDuoc);
$statement->bindParam(':banduoc', $banduoc, PDO::PARAM_INT);
$statement->bindParam(':idthongke', $idthongke, PDO::PARAM_INT); // Điền giá trị của $idthongke vào đây
$statement->execute();
    
        // In ra thông tin sản phẩm đã thêm hoặc cập nhật
        echo "ID Sản phẩm: $idsanpham, Tên sản phẩm: $tensanpham, Hình ảnh: $hinhanh, Số lượng: $soluong, Thành tiền: $thanhtiengiacu<br>";
    }
    
        


    }
    



}


?>
