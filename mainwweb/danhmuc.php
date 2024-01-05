<?php
$loaidb=new loaidb();
$listallloai= $loaidb->getallloai();


?> 
<style>
    /* Ẩn danh mục khi chưa được kích hoạt */
.sub-categories {
    display: none;
}

/* Hiển thị danh mục khi được kích hoạt */
.sub-categories.active {
    display: block;
}

</style>
<center>
<h2>Danh Mục</h2> 
</center>
<br>

<?php foreach($listallloai as $loai) {?>
    
    <div class="hero__categories">
    <div class="hero__categories__all">
        <span><?php echo $loai->gettenloai() ?></span>
    </div>
    <ul class="sub-categories">
    <li>
                <a href="shop.php?idloai=<?php echo $loai->getidloai() ?>"><?php echo 'Tất Cả'?></a>
            </li>
        <?php 
        $loaicondb = new loaicondb();
        $listloai2 = $loaicondb->getloaiconbyloaicha($loai->getidloai());
        foreach ($listloai2 as $loai2) { ?>
            <li>
                <a href="shop.php?idloai=<?php echo $loai->getidloai() ?>&idloaicon=<?php echo $loai2['idloaicon'] ?>"><?php echo $loai2['tenloaicon']?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<br>






<?php } ?>
<script>
// Lấy danh sách các phần tử cần xử lý
// Lấy danh sách các phần tử cần xử lý
// Lấy danh sách các phần tử cần xử lý
// Lấy danh sách các phần tử cần xử lý
const categoriesAll = document.querySelectorAll('.hero__categories__all');
const subCategories = document.querySelectorAll('.sub-categories');

// Thêm sự kiện click cho từng phần danh mục
categoriesAll.forEach((category, index) => {
    category.addEventListener('click', function() {
        // Kiểm tra xem danh sách con hiện tại có đang mở hay không
        const isCurrentlyOpen = subCategories[index].classList.contains('active');

        // Đóng hoặc mở danh sách con hiện tại tùy thuộc vào trạng thái hiện tại của nó
        subCategories[index].classList.toggle('active');
    });
});







</script>

