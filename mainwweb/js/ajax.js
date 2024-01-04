



$(document).ready(function(){
    $('#searchInput').keyup(function(){
        var searchText = $(this).val().toLowerCase();
        // Duyệt qua từng sản phẩm và ẩn/hiển thị sản phẩm dựa trên kết quả tìm kiếm
        $('tbody tr').each(function(){
            var currentText = $(this).text().toLowerCase();
            var match = currentText.indexOf(searchText) !== -1;
            $(this).toggle(match);
        });
    });
});



$(document).ready(function() {
    $('.add-to-cart-btn').click(function(event) {
        event.preventDefault();
        var spid = $(this).data('spid'); // Lấy ID sản phẩm từ thuộc tính dữ liệu
 
        $.ajax({
            type: 'GET',
            url: '../control/themvaogiohang.php?sanphamid=' + spid,
            
            success: function(response) {
                // Hiển thị thông báo khi thêm sản phẩm vào giỏ hàng thành công
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
            },
            error: function() {
                alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
            }
        });
    });
 });




  $(document).ready(function () {
    $('.icon_close').on('click', function () {
        var productId = $(this).data('product-id');

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
                    if (response === 'success') {
                        // Xoá hàng dựa vào productId
                        $(this).closest('tr').remove();
                    } else {
                        alert('Xóa sản phẩm không thành công!');
                    }
                },
                error: function () {
                    alert('Có lỗi xảy ra khi xóa sản phẩm!');
                }
            });
        }
    });
});


 
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
            },
            error: function () {
                alert('Có lỗi xảy ra trong quá trình cập nhật số lượng và tổng tiền!');
            }
        });
    });
});







