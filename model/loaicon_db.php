<?php
class loaicondb{
public function getallloaicon(){
    $db=database::getDB();
$querry='SELECT * FROM `loaicon`';
$result=$db->query($querry);
$listloaicon=array();

foreach($result as $row){
    $loaicon=new loaicon();
    $loaicon->setidloaicon($row['idloaicon']);
  
    $loaicon->settenloaicon($row['tenloaicon']);
    $listloaicon[]=$loaicon;

}

return $listloaicon;

}
public function getloaichabyloaicon($idloaicon){
    $db=database::getDB();
$querry='SELECT * from loai inner join loaicon where loaicon.idloaicon='.$idloaicon.' and idloai=loaicon.idloaicha;';
$result=$db->query($querry);

$loai=new loai();
foreach($result as $row){
    
    $loai->setidloai($row['idloai']);
  
    $loai->settenloai($row['tenloai']);
  
break;
}

return $loai;

}



public function getloaiconbyloaicha($loai){
    $db = database::getDB();
    $query = 'SELECT loai.idloai, loai.tenloai, loaicon.idloaicon, loaicon.tenloaicon
              FROM loaicon
              INNER JOIN loai ON loaicon.idloaicha = loai.idloai
              where loaicon.idloaicha='.$loai.' ';
    $result = $db->query($query);
    $listloaicon = array();

    foreach ($result as $row) {
        $loaiconItem = array(
            'idloai' => $row['idloai'],
            'tenloai' => $row['tenloai'],
            'idloaicon' => $row['idloaicon'],
            'tenloaicon' => $row['tenloaicon']
        );

        $listloaicon[] = $loaiconItem; // Thêm mảng vào mảng kết quả
    }

    return $listloaicon;
}

public function themloaicon($loaicon,$idloaicha) {
    $db = database::getDB();
    $querry = 'INSERT INTO `loaicon` (`idloaicon`, `tenloaicon`,idloaicha) VALUES (NULL, :loaicon,:idloaicha)';
    
    // Prepare the SQL statement
    $stmt = $db->prepare($querry);

    // Bind the parameter
    $stmt->bindParam(':loaicon', $loaicon);
    $stmt->bindParam(':idloaicha', $idloaicha);

    // Execute the statement
    $stmt->execute();
}
public function xoaloaicon($loaicon) {
    $db = database::getDB();
    $querry = 'DELETE FROM loaicon WHERE `loaicon`.`idloaicon` = '.$loaicon.'';
    
 
   $db->query($querry);
}

public function getloaiconbyid($idloai) {
    $db = database::getDB();
    $querry = 'SELECT * FROM `loaicon` WHERE idloaicon = '.$idloai.'';
    
    // Prepare the SQL statement

  $result= $db->query($querry);
  $loaicon=new loaicon();
  foreach($result as $row){
   
    $loaicon->setidloaicon($row['idloaicon']);
  $loaicon->setidloaicha($row['idloaicha']);
    $loaicon->settenloaicon($row['tenloaicon']);
  

}
return $loaicon;

}
public function sualoaicon($loaicon, $tenloaicon, $idloaicha) {
    $db = database::getDB();

    // Sử dụng prepared statement với các placeholder (?)
    $query = "UPDATE `loaicon` SET `idloaicha` = ?, `tenloaicon` = ? WHERE `loaicon`.`idloaicon` = ?";

        // Prepare statement
        $stmt = $db->prepare($query);

        // Bind các giá trị vào statement và thực thi truy vấn
        $stmt->execute([$idloaicha, $tenloaicon, $loaicon]);
        echo $idloaicha;
        echo $tenloaicon;
        echo $loaicon;

}




}

?>
