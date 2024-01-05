<?php 
require('../require.php');
session_start();
if(isset($_SESSION['idtk'])){
$taikhoandb=new taikhoandb();
$taikhoan=$taikhoandb->gettaikhoan($_SESSION['idtk']);
if($taikhoan->getquanly()==1 || $taikhoan->getadmin()==1){

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Thống Kê</title>
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
        <style>
            img{
                width: 200px;
                height: 120px;
            }
            
input[type="submit"], button[type=submit] {
    background: none repeat scroll 0 0 #435d7d;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
}

input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.block-container {
    border: 2px solid #435d7d; /* Màu và độ rộng viền */
    padding: 10px; /* Khoảng cách nội dung và viền */
    margin-bottom: 20px; /* Khoảng cách giữa các khối */
}
        </style>
    <body>
       
        <div class="container">
        <div class="row">
        <a href="../mainwweb">   <button type="submit">Trở Về Trang Chủ</button></a>
           
           <a  href="../quanly/"><button type="submit">Quản lý Sản Phẩm</button></a>
           <a href="quanlydanhmuc.php"><button type="submit">Quản lý danh mục</button></a>
           <?php if($taikhoan->getadmin()==1){ ?>
           
           <a href="quanlytaikhoan.php"><button type="submit">Quản lý tài khoản</button></a>
           <?php }?> 
           <a href="quanlydonhang.php"><button type="submit">Quản lý đơn hàng</button></a>
           <a href="thongke.php"><button type="submit">Thống Kê</button></a>

           
           </div> 


            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Thống Kê</b></h2>
                        </div>
                      
                    </div>

                    
                </div>
                <button ><a href="../control/xuatthongke.php">Xuất Thống kê</a></button>

                
                    <?php 
                    $thongkedb= new thongkedb();
                    $listallthongke= $thongkedb->getallthongke();

                count($listallthongke);
                
        
                ?>


           
    
     
             
            </div>

            <?php
              foreach ($listallthongke as $thongke) {
                
                ?> 
                 <div class="block-container">

<table cellspacing="0" class="shop_table cart">
                <thead>
                    <tr>
                        <th colspan="60">Thông Tin Thống Kê</th>
                    </tr>
                </thead>
                <tbody>
             
                    <tr>
                        <td>ID thống kê: <?php echo $thongke['thongtinthongke']['idthongke']; ?></td>
                        <td>Bán Được </br> <?php echo $thongke['thongtinthongke']['banduoc'] ?> đơn hàng   </td>
                      
                  
                        <td>Ngày Xuất: </br> <?php echo $thongke['thongtinthongke']['ngayxuat'] ?>  </td>
                        
                    </tr>
                </tbody>
            </table>                
<table cellspacing="0" class="shop_table cart">
<thead>
                    <tr>
                        <th colspan="60">Sản Phẩm Đã Bán</th>
                    </tr>
                </thead>
            <thead>
                <tr>
                <th class="product-remove">ID</th>
                <th class="product-thumbnail">Hình Ảnh</th>
                <th class="product-name">Tên</th>
              
                <th class="product-quantity">Số Lượng</th>
                <th class="product-subtotal">Tiền</th>
             
                </tr>
            </thead>
          


                <?php
                foreach ($thongke['sanphamthongke'] as $sanpham) {
       


       
                    echo '<tbody>
                    <tr class="cart_item">
                        <td class="product-remove">
                           '.$sanpham['idsanpham'].'
                        </td>
                
                        <td class="product-thumbnail">
                         <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../image/'.$sanpham['hinhanh'].'">
                        </td>
                
                        <td class="product-name">
                            '.$sanpham['tensanpham'].'
                        </td>
                
                   
                
                        <td class="product-quantity">
        
                            
                        <span class="quantity-text">'.$sanpham['soluong'].'</span>
                       
                    </td>
                
                        <td class="product-subtotal">
                            <span class="amount">'.$sanpham['thanhtien'].' VND</span>
                    </tr>
                </tbody>';
                }
        echo'

        <tfoot>
            <tr class="cart_item">
                <td class="product-remove"></td>
                <td class="product-thumbnail"></td>
                <td class="product-name"></td>
            
                <td class="product-quantity">Tổng Doanh Thu:</td>
                <td class="product-subtotal">
                    <span>'.$thongke['thongtinthongke']['doanhthu'].' VND</span>
                </td>
             
            </tr>
        </tfoot>
        </table>'; 
        
   
        ?>




          

            <?php
        echo '</div>';
        } 
      
        
        
        ?>

 </div>
        <!-- Edit Modal HTML -->
        
        
        
        
        


        </script>
        <script src="js/ajax.js"></script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>
<?php }

}
?>