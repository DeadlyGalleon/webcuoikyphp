<?php 


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tìm Kiếm</title>

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
    <?php include('header2.php'); ?> 
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php include('header.php'); ?> 
    <!-- Header Section End -->
<?php 
$sanphamdb= new sanphamdb();
$listsanphamtimkiem=array();

if(isset($_GET['txt'])) {
    $listsanphamtimkiem=$sanphamdb->getsanphambyName($_GET['txt']);

 
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
                        <h2>Tìm Kiếm Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb/">Trang Chủ</a>
                            <span>Tìm Kiếm:</span>
                            <span><?php echo $_GET['txt']; ?> </span>
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
                     
                <?php include('sanphammoi.php'); ?> 
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="row">
                    <?php
                    if(count($listsanphamtimkiem)>0){
                            foreach($listsanphamtimkiem as $sp){
                        echo'<div class="col-lg-3 col-md-6 col-sm-6">';
                            
                           echo' <div class="product__item">';
                            echo'    <div class="product__item__pic set-bg" data-setbg="../image/'.$sanphamdb->gethinhanhbyidsanpham($sp->getidsanpham())[0]['hinhanh'].'">';
                            echo'        <ul class="product__item__pic__hover">';
                        
                       
                            echo'            <li><a class="add-to-cart-btn" data-spid="'.$sp->getidsanpham().'"  href="#"><i class="fa fa-shopping-cart"></i></a></li>';
                              echo'      </ul>';
                            echo'    </div>';
                            echo'    <div class="product__item__text">';
                             echo'       <h6><a href="ttsanpham.php?spid='.$sp->getidsanpham().'">'.$sp->gettensanpham().'</a></h6>';
                              echo'      <h5>'.$sp->getgiaban().' VNĐ</h5>';
                               echo' </div>';
                           echo' </div>';
                      echo'  </div>';
                        } }
                        
                        else{
$ten=$_GET['txt'];
                            echo "Không Có Sản Phẩm Nào Trong Tên Chứa: "  ;
                            echo $ten;
                        }
                        ?>
                    
          
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