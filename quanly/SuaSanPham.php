<?php
session_start();
require('../require.php');


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <style>
            img{
                width: 200px;
                height: 120px;
            }
        </style>
    <body>
        <?php

        if(isset($_GET['spid'])){
$sanphamdb=new sanphamdb();
    
$sanpham=$sanphamdb->getsanphambyid($_GET['spid']);

        }
        
        ?>

        
        <div class="container">
           <div id="SuaSanPhamForm" >
            <div class="modal-dialog">
            <form  action="../control/suasanpham.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                 
                        <div class="modal-header">						
                            <h4 class="modal-title">Sửa Sản Phẩm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">	
                             <div class="form-group">
                                <label>ID</label>
                                <input value="<?php echo $sanpham->getidsanpham() ?>" name="spid" type="text" class="form-control" readonly="" required>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input value="<?php echo $sanpham->gettensanpham() ?>" name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">

                            Hình ảnh Hiện Tại
                            <div class="current-images">
    <?php
   $hinhanhhientai=$sanphamdb->gethinhanhbyidsanpham($sanpham->getidsanpham());
    foreach ($hinhanhhientai as $hinhanh) {
        echo '<img src="../image/' .$hinhanh['hinhanh']. '" alt="Current Image">';
    }
    ?>
</div>


    <label>Chọn Hình Ảnh Mới</label>
    <input name="image[]" type="file" class="form-control-file" multiple>

    Hình Ảnh Mới:
    <div class="edit-images">
   
    
</div>
</div>

                           
                           <div class="form-group">
    <label>Giá Bán</label>
    <input value="<?php echo $sanpham->getgiaban() ?>" name="price" id="priceInput" type="text" class="form-control" required>
    <span id="priceError" style="color: red;"></span>
</div>


                            <div class="form-group">
                                <label>Mô Tả</label>
                                <?php 
                                $loaidb=new loaidb();
                                $listallloai=$loaidb->getallloai();
                                $loaicondb=new loaicondb();
                                $listallloaicon=$loaicondb->getallloaicon();
                                ?> 
                                <textarea   name="mota" class="form-control" required><?php echo  $sanpham->getmota(); ?></textarea>
                            </div>
                          
                            <div class="form-group">
    <label>Loại Sản Phẩm</label>
    <select name="category" class="form-select" aria-label="Default select example">
        <?php 
        // Lấy thông tin loại sản phẩm của sản phẩm hiện tại
        $currentCategoryName = $sanpham->gettenloai(); // Lấy tên loại sản phẩm của sản phẩm hiện tại

        foreach ($listallloai as $loai) {
            $selected = ($loai->gettenloai() == $currentCategoryName) ? "selected" : "";
        ?> 
            <option value="<?php echo $loai->getidloai(); ?>" <?php echo $selected; ?>><?php echo $loai->gettenloai(); ?></option>
        <?php } ?> 
    </select>
</div>

<div class="form-group">
    <label>Loại Con</label>
    <select name="brand" class="form-select" aria-label="Default select example">
        <?php 
        // Lấy thông tin hãng sản phẩm của sản phẩm hiện tại
        $hanghientai = $sanpham->gettenloaicon(); // Lấy tên hãng sản phẩm của sản phẩm hiện tại

        foreach ($listallloaicon as $loaicon) {
            $selected = ($loaicon->gettenloaicon() == $hanghientai) ? "selected" : "";
        ?> 
            <option value="<?php echo $loaicon->getidloaicon(); ?>" <?php echo $selected; ?>><?php echo $loaicon->gettenloaicon(); ?></option>
        <?php } ?> 
    </select>
</div>
                
                        </div>
                        </div>
                        <div class="modal-footer">
                            <a href="../quanly/">  <input type="button" class="btn btn-default" data-dismiss="modal" value="Quay Về"></a>
                            <input type="submit" class="btn btn-success" value="Sửa">
                        </div>
                        </form>
                </div>
            </div>
        </div>
           
      
        <!-- Edit Modal HTML -->
        
        
        
        
        <script>
    var priceInput = document.getElementById('priceInput');
    var priceError = document.getElementById('priceError');

    priceInput.addEventListener('input', function() {
        var priceValue = priceInput.value;

        if (!isInteger(priceValue)) {
            priceError.textContent = "Giá phải là số nguyên";
        } else {
            priceError.textContent = "";
        }
    });

    function isInteger(value) {
        return /^-?\d+$/.test(value);
    }


    

</script>
<script>
    // Đoạn mã JavaScript để hiển thị hình ảnh sẽ được sửa khi người dùng chọn hình ảnh từ input[type=file]
document.querySelector('input[name="image[]"]').addEventListener('change', function(event) {
    var editImagesDiv = document.querySelector('.edit-images');
    editImagesDiv.innerHTML = ''; // Xóa bỏ hình ảnh cũ trước khi thêm hình ảnh mới

    var files = event.target.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();

        reader.onload = function (event) {
            var img = document.createElement('img');
            img.src = event.target.result;
            img.alt = 'Edited Image';
            editImagesDiv.appendChild(img); // Thêm hình ảnh vào vùng hiển thị hình ảnh sẽ được sửa
        }

        reader.readAsDataURL(file);
    }
});

</script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>



