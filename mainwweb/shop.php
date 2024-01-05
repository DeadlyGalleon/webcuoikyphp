<?php 


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sản Phẩm</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet  "> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
  


    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php include('header.php'); ?> 
    <!-- Header Section End -->
<?php 
$sanphamdb= new sanphamdb();
$listallsanpham=$sanphamdb->getallsanpham();

if(isset($_GET['idloai']) && !isset($_GET['idloaicon'])){
               
    $listallsanpham=$sanphamdb->getallsanphambyloai($_GET['idloai']);
  }
  elseif(isset($_GET['idloai']) && isset($_GET['idloaicon'])){
    $listallsanpham=$sanphamdb->getallsanphambyloaivaloaicon($_GET['idloai'],$_GET['idloaicon']);
  }


?> 
    <!-- Hero Section Begin -->
<?php include('vungtimkiem.php'); ?> 
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/nenxanhdam.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Của Hàng Bách Hoá</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb/">Trang Chủ</a>
                            <span>Sản Phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                      <?php include('danhmuc.php'); ?> 
                      
                      
                        <div class="sidebar__item">
                           <?php include('sanphammoi2.php'); ?> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="row">
                    <?php
                    $danhgiadb=new Danhgia_db();

                            foreach($listallsanpham as $sp){
$listdanhgia=$danhgiadb->getalldanhgiabyidsp($sp->getidsanpham());
$totalRatings = 0; // Tổng số sao từ đánh giá
$ratingCount = count($listdanhgia); 
foreach ($listdanhgia as $danhgia) {
    $sosao = $danhgia->getsosao();
    $totalRatings += $sosao;
}
$averageRating = $ratingCount > 0 ? $totalRatings / $ratingCount : 0;
                        echo'<div class="col-lg-4 col-md-6 col-sm-6">';
                            $hinhanh=$sanphamdb->gethinhanhbyidsanpham($sp->getidsanpham());
                           echo' <div class="product__item">';
                           if(count($hinhanh)>0){
                            echo'    <div class="product__item__pic set-bg" data-setbg="../image/'.$hinhanh[0]['hinhanh'].'">';
                           }else{
                            echo'    <div class="product__item__pic set-bg" data-setbg="../image/khongtontai.png">';
                           }
                            echo'        <ul class="product__item__pic__hover">';
                        if(isset($_SESSION['idtk'])){
                       
                            echo'            <li><a class="add-to-cart-btn" data-spid="'.$sp->getidsanpham().'" href="../control/themvaogiohang.php?sanphamid='.$sp->getidsanpham().'"><i class="fa fa-shopping-cart"></i></a></li>';
                        }
                            echo'      </ul>';
                            echo'    </div>';
                               echo '<div class="rating">';
                      echo ' '.$averageRating.'/5 <i class="fa-solid fa-star"  style="color: #FFA500;"></i> ('.$ratingCount.' đánh giá)';
                      echo '</div>';
                
                            echo'    <div class="product__item__text">';
                             echo'       <h6><a href="ttsanpham.php?spid='.$sp->getidsanpham().'">'.$sp->gettensanpham().'</a></h6>';
                              echo'      <h5>'.$sp->getgiaban().' VNĐ</h5>';
                               echo' </div>';
                           echo' </div>';
                      echo'  </div>';
                        } ?>
                    
          
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
  <?php include("footer.php"); ?> 
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>



</body>

</html>