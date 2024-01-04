
     <?php 
           $sanphammoi = $sanphamdb->getsanphammoi(); // Danh sách cần chia

           $moi1 = array_slice($sanphammoi, 0, count($sanphammoi) / 2); // Danh sách đầu tiên
           $moi2 = array_slice($sanphammoi, count($sanphammoi) / 2);    // Danh sách thứ hai
           
     ?> 
     <div class="latest-product__text">
                    
                        <h4>Sản Phẩm Mới</h4>
                        <br>
                        <br>
                    
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
  <?php foreach($moi1 as $sanpham){ ?>

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../image/<?php echo $sanpham->gethinhanh(); ?> " alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
                                        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php foreach($moi2 as $sanpham){ ?>

<a href="#" class="latest-product__item">
    <div class="latest-product__item__pic">
    <img src="../image/<?php echo $sanpham->gethinhanh(); ?> " alt="">
    </div>
    <div class="latest-product__item__text">
        <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
    </div>
</a>
<?php } ?>
                               
                            </div>
                        </div>
                    </div>