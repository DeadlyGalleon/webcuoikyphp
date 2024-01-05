<?php
session_start();

require('../require.php');

$taikhoan=new taikhoan();


// Check if 'taikhoan' object exists in the session and is an instance of 'taikhoan' class
if (isset($_SESSION['taikhoan'])) {
    $tkdb=new taikhoandb();
    $taikhoan = $tkdb->gettaikhoan($_SESSION['idtk']);
   
}else {$taikhoan=null;}

?>
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <?php if(isset($_SESSION['taikhoan'])){


                            ?>
                            <ul>

                                <li><i></i> Xin Chào <?php echo $taikhoan->gettentaikhoan(); ?> </li>
                            <?php if($taikhoan->getadmin()==1 || $taikhoan->getquanly()==1) {?> 
                          <a href="../quanly/"><li><i></i> Trang Quản Lý </li></a>  
                       <a href="../mainwweb/lichsudonhang.php"><li><i></i> Lịch Sử Đơn Hàng </li></a>
                          <?php }else{
                            echo '<a href="../mainwweb/lichsudonhang.php"><li> Lịch Sử Đơn Hàng </li></a> ';
                          }
                          ?> 
                            </ul>
                            <?php }?> 

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                        <?php if(!isset($_SESSION['taikhoan'])){
            
              echo '              <div class="header__top__right__auth">
                                <a href="dangnhap.php"><i class="fa fa-user"></i> Đăng Nhập</a>
                            </div>'       ;
                        }else{

                            echo '              <div class="header__top__right__auth">
                            <a href="../control/dangxuat.php"><i class="fa fa-user"></i> Đăng Xuất</a>
                        </div>'       ;  
                        }

                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
              
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="../mainwweb/">Trang Chủ</a></li>
                            <li><a href="shop.php">Cửa Hàng</a></li>
                       
                      
                            <li><a href="./contact.html">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            
                          
                                
                                <?php if(isset($_SESSION['taikhoan'])) {
                                    echo '  <li><a href="giohang.php"><i class="fa fa-shopping-cart">';
                                $giohangdb=new giohangdb();
                               
                          echo  '</i> <span>'.Count($giohangdb->laygiohang($_SESSION['idtk'])).'</span></a></li>';


                             }
                             else{
                               echo' <li><a href="giohang.php"><i class="fa fa-shopping-cart">';
                               echo  '</i> <span></span></a></li>';
                                
                          
                               
                       


                             
                             }
                              ?> 
                        </ul>
                    
                       
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>