
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi Tiết Sản Phẩm</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet  "> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
  
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
  .hidden {
    display: none;
  }
</style>
</head>

<body>
    <!-- Page Preloder -->


    <!-- Humberger Begin -->
  
    <!-- Humberger End -->

    <!-- Header Section Begin -->
  
    <!-- Header Section End -->
<?php include('header.php'); ?> 

<?php 




if (isset($_GET['spid']) ) {   
$sanphamdb=new sanphamdb();
$ttsanpham=$sanphamdb->getsanphambyid($_GET['spid']);



$listsanphamlienquan = $sanphamdb->getsanphambyloaivaloaicon($ttsanpham->getloai(),$ttsanpham->getloaicon(),6,0);
$listHinhAnhChiTiet=$sanphamdb->gethinhanhbyidsanpham($_GET['spid']);



$danhgiadb = new Danhgia_db();
$listdanhgia = $danhgiadb->getalldanhgiabyidsp($_GET['spid']);

$user = new taikhoandb();
$username = $user->getusernamebyid($_GET['spid']);
$totalRatings = 0; // Tổng số sao từ đánh giá
$ratingCount = count($listdanhgia); // Số lượng đánh giá
// Lặp qua mảng $listdanhgia
foreach ($listdanhgia as $binhluan) {
    $sosao = $binhluan->getsosao();
    $totalRatings += $sosao;
}
$averageRating = $ratingCount > 0 ? $totalRatings / $ratingCount : 0;

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
                        <h2>Thông Tin Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb"><?php echo $ttsanpham->gettenloai() ?> </a>
                            <a href="../sanpham"><?php echo $ttsanpham->gettenloaicon() ?> </a>
                            <span><?php echo $ttsanpham->gettensanpham() ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php
                 echo'   <div class="product__details__pic">';
                 echo  '     <div class="product__details__pic__item">';
                 echo'           <img class="product__details__pic__item--large"';
                 if(count($listHinhAnhChiTiet)>0){
                  echo'              src="../image/'.$listHinhAnhChiTiet[0]['hinhanh'].'" alt="">';
                 }else{ echo'              src="../image/khongtontai.png" alt="">';}
                  echo'      </div>';
                   echo'     <div class="product__details__pic__slider owl-carousel">';

    
                    // Hình ảnh phụ  chưa port r
foreach($listHinhAnhChiTiet as $hinhanh){
    echo'        <img data-imgbigurl="../image/'.$hinhanh['hinhanh'].'"';
    // Hình ảnh phụ  chưa port ra
    echo'            src="../image/'.$hinhanh['hinhanh'].'" alt="">';

}

                    echo'    </div>';
                   
                   echo' </div>';
                echo'</div>';
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $ttsanpham->gettensanpham() ?> </h3>
                        <p>Lần Mua: <?php echo $ttsanpham->getlanmua(); ?> </p> 
                      <?php 
                      echo '<div class="rating">';
                      echo ' '.$averageRating.'/5 <i class="fa-solid fa-star"  style="color: #FFA500;"></i>';
                      echo '</div>';
                      echo '('.$ratingCount.' đánh giá)';
                    
                      echo'  <div class="product__details__price">Giá bán: '.$ttsanpham->getgiaban().' VNĐ</div> ';
                      echo '<p></p>';
if(isset($_SESSION['idtk'])){
                     echo '<div class="product__details__quantity">';
    echo '<div class="quantity">';
    echo '<div class="pro-qty">';
    echo '<input type="text" value="1">';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<button class="add-to-cart-btn" data-spid="'.$ttsanpham->getidsanpham().'">Thêm vào Giỏ hàng</button>';
}else{
    echo 'Hãy <a href="dangnhap.php">Đăng Nhập</a> Để Mua Hàng';
}


                     echo'    <ul>';
                    
                                echo'     </li>';
                                echo'     </ul>';
                                echo'    </div>';
                                echo'    </div>';
                      ?>  
                      
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô Tả</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Mô tả</h6>
                                    <p><?php echo $ttsanpham->getmota() ?> </p>
                                </div>
                            </div>
                
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
<h6>Đánh giá</h6>
<div class="container">
<div class="container">
  <h2>Các đánh giá</h2>
  <?php



  //Hiện thị tổng số sao đánh giá
  $totalRatings = 0; // Tổng số sao từ đánh giá
$ratingCount = count($listdanhgia); // Số lượng đánh giá
// Lặp qua mảng $listdanhgia
foreach ($listdanhgia as $binhluan) {
    $sosao = $binhluan->getsosao();
    $totalRatings += $sosao;
}
$averageRating = $ratingCount > 0 ? $totalRatings / $ratingCount : 0;
// Hiển thị số sao trung bình dưới dạng ngôi sao và nửa ngôi sao
echo '<div class="rating">';
echo ' '.$averageRating.'/5 <i class="fa-solid fa-star"  style="color: #FFA500;"></i>';
echo '</div>';
  //Đóng hiển thị số sao trung bình



//Kiểm tra bình luận
$db = database::getDB();
// Kiểm tra xem người dùng đã bình luận cho sản phẩm này trước đó hay chưa
$idtk = isset($_SESSION['idtk']) ? $_SESSION['idtk'] : null;
$hasCommented = false; // Biến để kiểm tra

// Thực hiện truy vấn cơ sở dữ liệu để kiểm tra
if ($idtk) {
    $previousCommentQuery = "SELECT * FROM danhgia WHERE iduser = '$idtk' AND idsp = '{$ttsanpham->getidsanpham()}'";
    $previousCommentResult = $db->query($previousCommentQuery);
    if ($previousCommentResult->rowCount() > 0) {
        $hasCommented = true;
    }
}

// Kiểm tra biến $hasCommented để xác định liệu người dùng đã bình luận trước đó hay chưa
if ($hasCommented) {
    // Người dùng đã bình luận trước đó, hiển thị thông báo
    echo '<p>Bạn đã đánh giá cho sản phẩm này trước đó.</p>';
} elseif ($idtk) {
    $idsanpham = $ttsanpham->getidsanpham();
    echo '<form method="post" action="../control/luu_danh_gia.php?spid='.$idsanpham.'">';
    echo '  <div class="form-group d-flex align-items-center">';
    echo '    <label class="mr-2" for="rating">Đánh giá:</label>';
    echo '    <select class="form-control" id="rating" name="rating">';
    echo '      <option value="5">5 sao</option>';
    echo '      <option value="4">4 sao</option>';
    echo '      <option value="3">3 sao</option>';
    echo '      <option value="2">2 sao</option>';
    echo '      <option value="1">1 sao</option>';
    echo '    </select>';
    echo '  </div>';
    echo '  <div class="form-group">';
    echo '    <label for="comment">Bình luận:</label>';
    echo '    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>';
    echo '  </div>';
    echo '  <div class="form-group">';
    echo '    <button type="submit" class="btn btn-warning">Gửi đánh giá</button>';
    echo '  </div>';
    echo '</form>';
}
    //   echo'  <form method="GET" action="">';
    //   echo'<select name="filterRating">';
    //   echo' <option value="0">Tất cả</option>';
    //   echo'  <option value="1">1 sao</option>';
    //   echo'  <option value="2">2 sao</option>';
    //   echo'  <option value="3">3 sao</option>';
    //   echo'  <option value="4">4 sao</option>';
    //   echo'  <option value="5">5 sao</option>';
    //   echo' </select>';
    //   echo' <button type="submit">Lọc</button>';
    //   echo' </form>';
    
        //Hiện thị các bình luận đánh giá
        if (!empty($listdanhgia)) {
            $totalRatings = 0; // Tổng số sao từ đánh giá
            $ratingCount = count($listdanhgia); // Số lượng đánh giá
        
            // Lặp qua mảng $listdanhgia theo thứ tự ngược lại
            for ($i = count($listdanhgia) - 1; $i >= 0; $i--) {
                $binhluan = $listdanhgia[$i];
                $sosao = $binhluan->getsosao();
                $totalRatings += $sosao;
        
                // Hiển thị đánh giá
                echo '<div class="card mb-3">';
                echo '  <div class="card-body">';
                echo '    <h5 class="card-title">Đánh giá:';
                for ($j = 1; $j <= 5; $j++) {
                    // Hiển thị ngôi sao đánh giá
                    if ($j <= $sosao) {
                        echo '<i class="fa-solid fa-star" style="color: #FFA500;"></i>'; // Ngôi sao hoàn toàn
                    } else {
                        echo '<i class="fa-regular fa-star" style="color: #FFA500;"></i>'; // Ngôi sao rỗng
                    }
                }
                echo '</h5>';
                echo '    <div class="d-flex justify-content-left align-items-center mb-3">';
                echo '      <h6 class="mb-0 mr-2">Thời gian:</h6>';
                echo '      <p class="mb-0 text-muted small">' . $binhluan->getNgaygio() . '</p>';
                echo '    </div>';
                echo '    <p class="card-text">Khách hàng: ' . $user->getusernamebyid($binhluan->getIduser()) . '</p>';
                echo '    <p class="card-text">Đánh giá: ' . $binhluan->getBinhLuan() . '</p>';
                if ($binhluan->getIduser() == $_SESSION['idtk']) {
                    echo '<button class="btn btn-primary" onclick="editRating(' . $binhluan->getIduser() . ')">Sửa đánh giá</button>';
                    echo '<span> </span>';
                    echo '<a href="../control/xoa_danh_gia.php?spid='.$binhluan->getIdSanPham().'" class="btn btn-danger">Xoá đánh giá</a>';
                }
                echo '  </div>';
                echo '</div>';

                //form
echo'   <form id="editForm" class="hidden" action="../control/sua_danh_gia.php?spid='. $binhluan->getIdSanPham().' " method="POST">';
 echo' <div class="form-group row">';
 echo'   <label for="rating" class="col-sm-2 col-form-label">Số sao:</label>';
 echo'   <div class="col-sm-10">';
  echo'    <select class="form-control" id="rating" name="rating">';
  echo'      <option value="5">5 sao</option>';
  echo'      <option value="4">4 sao</option>';
  echo'      <option value="3">3 sao</option>';
  echo'      <option value="2">2 sao</option>';
  echo'      <option value="1">1 sao</option>';
  echo'    </select>';
  echo'  </div>';
 echo' </div>';
 echo' <div class="form-group row">';
 echo'   <label for="binhluan" class="col-sm-2 col-form-label">Bình luận:</label>';
 echo'   <div class="col-sm-10">';
 echo'     <textarea class="form-control" id="binhluan" name="binhluan">'.$binhluan->getBinhLuan().'</textarea>';
 echo'   </div>';
 echo' </div>';
 echo' <div class="form-group row">';
 echo'   <div class="col-sm-10 offset-sm-2">';
 echo'     <button type="submit" class="btn btn-primary">Lưu</button>';
 echo'     <button type="button" class="btn btn-danger" onclick="hideEditForm()">Xóa</button>';
 echo'   </div>';
 echo' </div>';
echo'</form>';
// form

            }
        } else {
            echo '<p>Chưa có đánh giá nào.</p>';
        }
      //Đóng kiểm tra  
    ?>
    
</div>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            foreach($listsanphamlienquan as $sanphamc){
                $listHinhAnhChiTiet1=$sanphamdb->gethinhanhbyidsanpham($sanphamc->getidsanpham());

            echo' <div class="col-lg-3 col-md-4 col-sm-6">';
            echo' <div class="product__item">';
             echo'    <div class="product__item__pic set-bg" data-setbg="../image/'.$listHinhAnhChiTiet1[0]['hinhanh'].'">';
             echo'        <ul class="product__item__pic__hover">';
  
             if(isset($_SESSION['idtk'])){
                       
                echo'            <li><a class="add-to-cart-btn" data-spid="'.$sanphamc->getidsanpham().'" href="#"><i class="fa fa-shopping-cart"></i></a></li>';
            }
              echo'       </ul>';
              echo'   </div>';
              echo'   <div class="product__item__text">';
              echo'       <h6><a href="ttsanpham.php?spid='.$sanphamc->getidsanpham().'">'.$sanphamc->gettensanpham().'</a></h6>';
              echo'       <h5>Giá bán: '.$sanphamc->getgiaban().'</h5>';
             echo'    </div>';
           echo'  </div>';
        echo' </div> ';
            }
        ?>
               
             
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
 <?php include('footer.php'); ?> 
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script>
  function toggleEditForm() {
    var form = document.getElementById("editForm");
    if (form.classList.contains("hidden")) {
      form.classList.remove("hidden");
    } else {
      form.classList.add("hidden");
    }
  }

  function editRating(id) {
    toggleEditForm();
  }

  function hideEditForm() {
    var form = document.getElementById("editForm");
    form.classList.add("hidden");
  }


 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-cart-btn').click(function(event) {
        event.preventDefault();
        var spid = $(this).data('spid'); // Lấy ID sản phẩm từ thuộc tính data
        var quantity = $(this).siblings('.product__details__quantity').find('.pro-qty input').val();

        // Gửi yêu cầu AJAX đến tệp xử lý PHP
        $.ajax({
            type: 'GET',
            url: '../control/themvaogiohang.php',
            data: {
                sanphamid: spid,
                soluong: quantity
            },
            success: function(response) {
                // Hiển thị thông báo khi thêm sản phẩm vào giỏ hàng thành công
                console.log(quantity);
                alert('Sản phẩm đã được thêm vào giỏ hàng!' + quantity);
            },
            error: function() {
                // Hiển thị thông báo khi có lỗi xảy ra
                alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
            }
        });
    });
});

</script>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>