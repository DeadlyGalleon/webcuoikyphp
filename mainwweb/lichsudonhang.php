<!DOCTYPE html>
<html lang="zxx">
<?php  ?> 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ Hàng</title>

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
<style>
    /* Thiết lập kiểu dáng cho nút đăng nhập */
.login-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #435d7d;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* Thiết lập kiểu hover khi rê chuột vào nút */
.login-button:hover {
    background-color: #2980b9;
}

/* Căn giữa nút đăng nhập */
.button-container {
    text-align: center;
    margin-top: 20px;
}
.block-container {
    border: 2px solid #435d7d; /* Màu và độ rộng viền */
    padding: 10px; /* Khoảng cách nội dung và viền */
    margin-bottom: 20px; /* Khoảng cách giữa các khối */
}

</style>
<body>
  

  <?php include('header.php'); ?> 

  <?php include('vungtimkiem.php'); ?> 

    <section class="breadcrumb-section set-bg" data-setbg="img/nenxanhdam.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Lịch Sử Đơn Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb/">Trang Chủ</a>
                            <span>Lịch Sử Đơn Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<?php $donhangdb=new donhangdb;
$listalldonhang=$donhangdb->getalldonhangcuataikhoan($_SESSION['idtk']);

?> 
<br>
<br>
<br>

    <!-- Shoping Cart Section Begin -->
   
<?php foreach($listalldonhang as $donhang) {?> 
    <div class="block-container">
    <div class="order-details">
    <?php $taikhoandb=new taikhoandb();
                $taikhoan=$taikhoandb->gettaikhoan($donhang['thongtindonhang']['idtaikhoan']);
                    ?> 
                    <tr>
                        <td>ID Đơn hàng: <?php echo $donhang['thongtindonhang']['iddonhang']; ?></td><br>
                        <td>Được đặt bởi: <?php echo $taikhoan->gettentaikhoan() ?> </td> <br>
                        <td>Số Điện Thoại: 0<?php echo $donhang['thongtindonhang']['sodienthoai'] ?> </td><br>
                        <td>Ngày Đặt hàng: </br> <?php echo $donhang['thongtindonhang']['ngaydat']; ?></td><br>
                        <td>Địa chỉ: <?php echo $donhang['thongtindonhang']['diachi']; ?></td><br>
                        <td>Trạng Thái: 
                            
                            <?php if($donhang['thongtindonhang']['trangthai']===0){
                                echo('Chưa Xác Nhận');

                        } elseif($donhang['thongtindonhang']['trangthai']===1){
                            echo('Đã Huỷ');

                        } elseif($donhang['thongtindonhang']['trangthai']===2){
                            echo('Đã Xác Nhận');

                        }elseif($donhang['thongtindonhang']['trangthai']===3){
                            echo('Đang Giao');
                        }else{
                         echo('Đã Giao');
                        }

                        
                        ?></td><br>
                        <td>Ngày Giao: </br> <?php echo $donhang['thongtindonhang']['ngaygiao'] ?>  </td>
                        
        </div>

    <section class="shoping-cart spad">
    <?php if(isset($_SESSION['taikhoan'])){ ?> 
        <div class="container">
            <div class="row">
              
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản Phẩm</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                 
                                </tr>
                            </thead>

                            <tbody>
                                
                <?php
                foreach ($donhang['sanphamdonhang'] as $sanpham) {?>


<tr>
<td class="shoping__cart__item">
   
<img width="120px" height="80px" src="../image/<?php echo $sanpham['hinhanh'] ?>" alt="">

  
      
        <a href="ttsanpham.php?spid=<?php echo $sanpham['idsanpham']; ?>">
            <h5><?php echo $sanpham['tensanpham'] ?></h5>
        </a>
    </td>
    <td class="shoping__cart__price">
        <?php echo $sanpham['giacu'] ?> VNĐ
    </td>
    <td class="shoping__cart__quantity">
    <div class="quantity">
       
        <span class="quantity-value"><?php echo $sanpham['soluong']; ?></span>
      
    </div>
</td>
<td class="shoping__cart__total">
        <?php echo $sanpham['thanhtiengiacu'] ?> VNĐ
    </td>

</tr>


                                <?php } ?> 

        
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th>Tổng Tiền:</th>
            <!-- Đặt ID để dễ dàng cập nhật giá trị tổng tiền bằng JavaScript -->
            <h2> <th colspan="2"><?php echo $donhang['thongtindonhang']['tongtien']; ?> VNĐ </th></h2>
                                <th></th>
                            </tfoot>
                        </table>
                        <?php 
                        if($donhang['thongtindonhang']['trangthai'] <1){

                            ?> 
                            <form action="../control/huydonhang.php" method="post">
                                <input type="hidden" name="iddonhang" value="<?php echo $donhang['thongtindonhang']['iddonhang']; ?>">
                                <button type="submit" name="trangthai" value="1">Huỷ Đơn Hàng</button>
                            </form>
                    
                              <?php  } ?> 
                       
                       
                    </div>
                </div>
            </div>
         
        </div>
        <?php }
         ?> 

    </section>
     </div>
     <br>
<?php }?> 
   
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
<?php include('footer.php'); ?> 
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
    <script scr="js/ajax.js"></script>
<script>
$(document).ready(function () {
    $('.quantity-button').on('click', function () {
        var $quantityValue = $(this).siblings('.quantity-value');
        var quantity = parseInt($quantityValue.text());
        var productId = $(this).closest('.quantity').data('product-id');

        if ($(this).hasClass('quantity-up')) {
            quantity++;
        } else if ($(this).hasClass('quantity-down')) {
            if (quantity > 1) {
                quantity--;
            } else {
                return; // Không làm gì nếu số lượng là 1 hoặc nhỏ hơn 1
            }
        }

        // Hiển thị số lượng mới
        $quantityValue.text(quantity);

        // Gửi dữ liệu qua AJAX để cập nhật số lượng và tổng tiền
        $.ajax({
            type: 'POST',
            url: '../control/capnhatsoluong.php',
            data: {
                quantity: quantity,
                productId: productId
            },
            success: function (response) {
                // Cập nhật tổng tiền tương ứng với sản phẩm
                var $totalValue = $('.shoping__cart__total[data-product-id="' + productId + '"]');
                $totalValue.html(response + ' VNĐ');
                updateTotalAmount();
                updateTotalAmount2();
            },
            error: function () {
                alert('Có lỗi xảy ra trong quá trình cập nhật số lượng và tổng tiền!');
            }
        });
    });



});

$(document).ready(function () {
    $('.icon_close').on('click', function () {
        var productId = $(this).data('product-id');
        var $rowToDelete = $(this).closest('tr'); // Lưu trữ hàng sản phẩm để xoá sau này

        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?')) {
            // Gửi yêu cầu xóa sản phẩm qua AJAX
            $.ajax({
                type: 'POST',
                url: '../control/xoasanphamkhoigiohang.php', // Đường dẫn tới file xử lý xóa sản phẩm
                data: {
                    productId: productId
                },
                success: function (response) {
                    // Xoá sản phẩm khỏi giao diện nếu xóa thành công
                 
                        // Xoá hàng sản phẩm khỏi giao diện
                        $rowToDelete.remove();
                        updateTotalAmount();
                        updateTotalAmount2();
                 
                },
                error: function () {
                    alert('Có lỗi xảy ra khi xóa sản phẩm!');
                }
            });
        }
    });

   
});

// Hàm để cập nhật tổng tiền
function updateTotalAmount() {
    $.ajax({
        type: 'GET',
        url: '../control/tongtiengiohang.php', // Đường dẫn tới file lấy tổng tiền từ CSDL
        success: function (response) {
            $('#total-amount').text(response + ' VNĐ');
        },
        error: function () {
            $('#total-amount').text('Không thể lấy được tổng tiền');
        }
    });
}

function updateTotalAmount2() {
    $.ajax({
        type: 'GET',
        url: '../control/tongtiengiohang.php', // Đường dẫn tới file lấy tổng tiền từ CSDL
        success: function (response) {
            $('#total-amount2').text(response + ' VNĐ');
        },
        error: function () {
            $('#total-amount2').text('Không thể lấy được tổng tiền');
        }
    });
}

// Thêm sự kiện cho việc chỉnh sửa giỏ hàng (thêm, xoá, sửa số lượng) ở đây

// Gọi hàm cập nhật tổng tiền sau mỗi thao tác chỉnh sửa giỏ hàng
$(document).ready(function () {
    updateTotalAmount();
    updateTotalAmount2();
});



</script>

</body>


</html>