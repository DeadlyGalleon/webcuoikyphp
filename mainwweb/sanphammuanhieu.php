
<?php 
           $sanphammoi = $sanphamdb->getsanphammuanhieu(); // Danh sách cần chia

           $moi1 = array_slice($sanphammoi, 0, count($sanphammoi) / 2); // Danh sách đầu tiên
           $moi2 = array_slice($sanphammoi, count($sanphammoi) / 2);    // Danh sách thứ hai
           $sanphamdb=new sanphamdb();
     ?> 
     <div class="latest-product__text">
                    
                        <h4>Sản Phẩm Mua Nhiều</h4>
                      
                    
                      
                            <div class="latest-prdouct__slider__item">
  <?php foreach($moi1 as $sanpham){ 
    $hinhanh=$sanphamdb->gethinhanhbyidsanpham($sanpham->getidsanpham());
    ?>

                                <a href="ttsanpham.php?spid=<?php echo $sanpham->getidsanpham() ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../image/<?php echo $hinhanh[0]['hinhanh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                      <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
                                      <p>Lần Mua:<?php echo $sanpham->getlanmua() ?> </p>
                                        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php foreach($moi2 as $sanpham){ 
                                  $hinhanh=$sanphamdb->gethinhanhbyidsanpham($sanpham->getidsanpham());
                                  ?>
                              
                                                              <a href="ttsanpham.php?spid=<?php echo $sanpham->getidsanpham() ?>" class="latest-product__item">
                                                                  <div class="latest-product__item__pic">
                                                                  <img  src="../image/<?php echo $hinhanh[0]['hinhanh'] ?>" alt="">
                                                                  </div>
    <div class="latest-product__item__text">
        <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
        <p>Lần Mua:<?php echo $sanpham->getlanmua() ?> </p>
        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
    </div>
</a>
<?php } ?>
                               
                            </div>
                   
                    </div>
