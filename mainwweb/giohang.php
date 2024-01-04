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
    
</style>
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

    <!-- Hero Section Begin -->
  <?php include('vungtimkiem.php'); ?> 
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
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

$giohang=$giohangdb->laygiohang($_SESSION['idtk']);
foreach($giohang as $sanphamgiohang){
 ?> 

<tr>
    <td class="shoping__cart__item">
        <img width="120px" height="80px" src="../image/<?php echo $sanphamgiohang->getHinhanhgh() ?>" alt="">
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
            <th id="total-amount" colspan="2"></th>
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
                       
                    </div>
                </div>
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
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
            },
            error: function () {
                alert('Có lỗi xảy ra trong quá trình cập nhật số lượng và tổng tiền!');
            }
        });
    });

    updateTotalAmount();

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

// Thêm sự kiện cho việc chỉnh sửa giỏ hàng (thêm, xoá, sửa số lượng) ở đây

// Gọi hàm cập nhật tổng tiền sau mỗi thao tác chỉnh sửa giỏ hàng
$(document).ready(function () {
    updateTotalAmount();
});



</script>

</body>


</html>