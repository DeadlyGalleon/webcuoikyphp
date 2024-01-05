<!DOCTYPE html>
<html lang="zxx">
<?php  ?> 
<head>
    <meta charset="UTF-8">

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

</style>
<body>
  

  <?php include('header.php'); ?> 

  <?php include('vungtimkiem.php'); ?> 

    <section class="breadcrumb-section set-bg" data-setbg="img/nenxanhdam.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb/">Trang Chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php                
$giohangdb=new giohangdb();
$sanphamdb=new sanphamdb();
$giohang=$giohangdb->laygiohang($_SESSION['idtk']);
foreach($giohang as $sanphamgiohang){
 ?> 

<tr>
    <td class="shoping__cart__item">
        <?php if(count($sanphamdb->gethinhanhbyidsanpham($sanphamgiohang->getIdsanphamgh()))>0){
echo '<img width="120px" height="80px" src="../image/'.$sanphamdb->gethinhanhbyidsanpham($sanphamgiohang->getIdsanphamgh())[0]['hinhanh'].'" alt="">';

        } else {
     echo   '    <img width="120px" height="80px" src="../image/<?php echo $sanphamgiohang->getHinhanhgh() ?>" alt="">';
        }
        ?> 
      
        <a href="ttsanpham.php?spid=<?php echo $sanphamgiohang->getIdsanphamgh() ?>">
            <h5><?php echo $sanphamgiohang->getTensanphamgh() ?></h5>
        </a>
    </td>
    <td class="shoping__cart__price">
        <?php echo $sanphamgiohang->getGiabangh() ?> VNĐ
    </td>
    <td class="shoping__cart__quantity">
    <div class="quantity" data-product-id="<?php echo $sanphamgiohang->getIdsanphamgh() ?>">
        <button class="quantity-button quantity-down">-</button>
        <span class="quantity-value"><?php echo $sanphamgiohang->getSoluonggh() ?></span>
        <button class="quantity-button quantity-up">+</button>
    </div>
</td>
<td class="shoping__cart__total" data-product-id="<?php echo $sanphamgiohang->getIdsanphamgh() ?>">
        <?php echo $sanphamgiohang->getThanhtiengh() ?> VNĐ
    </td>
    <td class="shoping__cart__item__close">
    <span class="icon_close" data-product-id="<?php echo $sanphamgiohang->getIdsanphamgh() ?>"></span>
</td>
</tr>


                                <?php } ?> 
        
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th>Tổng Tiền:</th>
            <!-- Đặt ID để dễ dàng cập nhật giá trị tổng tiền bằng JavaScript -->
            <th id="total-amount2" colspan="2"></th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="shop.php" class="primary-btn cart-btn">Tiếp Tục Mua Sắm</a>
                        <?php if(count($giohang)>0) { ?> 
                        <a href="dathang.php" class="primary-btn cart-btn">Đặt Hàng</a>
                        <?php } ?> 
                    </div>
                </div>
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-6">
                <div class="shoping__cart__btns">
                      
                       
                    </div>
                </div>
            </div>
        </div>
        <?php }else{
         ?> 
<h1><center>Hãy Đăng Nhập Để Mua Hàng</center></h1>
<br><br>
<center><div class="button-container">
    <a href="dangnhap.php" class="login-button">Đăng Nhập</a>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br>
         <?php 
         } ?> 
    </section>
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