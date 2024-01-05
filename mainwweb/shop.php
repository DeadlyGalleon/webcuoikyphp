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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
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
    <!-- Page Preloder -->
  
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php include('header.php'); ?> 
    <!-- Header Section End -->
<?php 
$sanphamdb= new sanphamdb();
$listallsanpham=$sanphamdb->getallsanpham();
echo count($listallsanpham);
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
                           <?php include('sanphammoi.php'); ?> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="row">
                    <?php
                            foreach($listallsanpham as $sp){
                        echo'<div class="col-lg-4 col-md-6 col-sm-6">';
                            $hinhanh=$sanphamdb->gethinhanhbyidsanpham($sp->getidsanpham());
                           echo' <div class="product__item">';
                           if(count($hinhanh)>0){
                            echo'    <div class="product__item__pic set-bg" data-setbg="../image/'.$hinhanh[0]['hinhanh'].'">';
                           }else{
                            echo'    <div class="product__item__pic set-bg" data-setbg="../image/khongtontai.png">';
                           }
                            echo'        <ul class="product__item__pic__hover">';
                        
                       
                            echo'            <li><a class="add-to-cart-btn" data-spid="'.$sp->getidsanpham().'" href="../control/themvaogiohang.php?sanphamid='.$sp->getidsanpham().'"><i class="fa fa-shopping-cart"></i></a></li>';
                              echo'      </ul>';
                            echo'    </div>';
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