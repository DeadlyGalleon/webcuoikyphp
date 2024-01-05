<?php 
 class Danhgia_db{
    public function themdanhgia($iduser, $idsp, $sosao, $binhluan, $ngaygio){
        $db = database::getDB();
        $query = "INSERT INTO danhgia (iduser, idsp, sosao, binhluan, ngaygio) VALUES (:iduser, :idsp, :sosao, :binhluan, :ngaygio)";
        $statement = $db->prepare($query);
        $statement->bindParam(':iduser', $iduser);
        $statement->bindParam(':idsp', $idsp);
        $statement->bindParam(':sosao', $sosao);
        $statement->bindParam(':binhluan', $binhluan);
        $statement->bindParam(':ngaygio', $ngaygio);
        $statement->execute();
    }
    public function getalldanhgiabyidsp($idsp)
    {
        $db = database::getDB();
        $query = "SELECT * FROM danhgia WHERE idsp = '$idsp' ";
        $result = $db->query($query);
        
        $danhGiaList = array(); // Mảng chứa danh sách đánh giá
        
             foreach($result as $row){
                $danhgia = new DanhGia();
                
                    $danhgia->setIduser($row['iduser']);
                    $danhgia->setIdSanPham($row['idsp']);
                    $danhgia->setsosao($row['sosao']);
                    $danhgia->setBinhLuan($row['binhluan']);
                    $danhgia->setNgaygio($row['ngaygio']);
                    $danhGiaList[] = $danhgia;
            }
            return $danhGiaList;
        }
        
        public function suadanhgia($idtk, $idsp, $sosao, $binhluan, $ngaygio){
            $db = database::getDB();
            $query = "UPDATE danhgia SET sosao = :sosao, binhluan = :binhluan, ngaygio = :ngaygio WHERE idsp = :idsp AND iduser = :iduser";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':sosao', $sosao, PDO::PARAM_STR);
            $stmt->bindParam(':binhluan', $binhluan, PDO::PARAM_STR);
            $stmt->bindParam(':ngaygio', $ngaygio, PDO::PARAM_STR);
            $stmt->bindParam(':idsp', $idsp, PDO::PARAM_INT);
            $stmt->bindParam(':iduser', $idtk, PDO::PARAM_INT);
            // Thực thi truy vấn
            $result = $stmt->execute();
            
            // Kiểm tra kết quả truy vấn
            if ($result) {
                // Truy vấn thành công
                return true;
            } else {
                // Truy vấn thất bại
                return false;
            }
        }    
        public function xoadanhgia($idsp, $idtk)
        {
            $db = database::getDB();
        
            // Thực hiện câu truy vấn xoá đánh giá dựa trên idsp
            $query = "DELETE FROM danhgia WHERE idsp = :idsp AND iduser = :idtk";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':idsp', $idsp, PDO::PARAM_INT);
            $stmt->bindParam(':idtk', $idtk, PDO::PARAM_INT);
            $stmt->execute();
        
            // Kiểm tra số hàng bị ảnh hưởng bởi câu truy vấn xoá
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                // Xoá đánh giá thành công
                echo "Xoá đánh giá thành công!";
            } else {
                // Không tìm thấy đánh giá cần xoá
                echo "Không tìm thấy đánh giá cần xoá!";
            }
        }
          
        
    
 }
?>