<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
               <?php include('danhmuc.php'); ?> 
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="../mainwweb/timkiem.php" method="Post">
                          
                                <input type="text" placeholder="Tìm Kiếm Sản Phẩm">
                                <button type="submit" class="site-btn">Tìm Kiếm</button>
                            </form>
                        </div>
                   
                    </div>
                  <section class="latest-product spad">
      <?php
      $sanphamdb=new sanphamdb();
      $sanphammoi = $sanphamdb->getsanphammoi(); // Danh sách cần chia

$moi1 = array_slice($sanphammoi, 0, count($sanphammoi) / 2); // Danh sách đầu tiên
$moi2 = array_slice($sanphammoi, count($sanphammoi) / 2);    // Danh sách thứ hai

      ?> 
            <div class="row">
            <div class="col-lg-4 col-md-6">
               <?php include('sanphammoi.php'); ?> 

               </div>
                <div class="col-lg-4 col-md-6">
                   <?php include('sanphammuanhieu.php'); ?> 
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm được đánh giá cao</h4>
                  
                    <?php
              $sanpham = new sanphamdb();
              $listid = $sanpham->layhetspid();
              $danhgiadb = new Danhgia_db();
              
              $averageRatings = array();
              
              foreach ($listid as $id) {
                  $listdanhgia = $danhgiadb->getalldanhgiabyidsp($id);
                  $totalRatings = 0;
                  $ratingCount = count($listdanhgia);
                  foreach ($listdanhgia as $danhgia) {
                      $sosao = $danhgia->getsosao();
                      $totalRatings += $sosao;
                  }
                  $averageRating = $ratingCount > 0 ? $totalRatings / $ratingCount : 0;
                  $averageRatings[$id] = $averageRating;
              }
              
              // Sắp xếp mảng theo số sao trung bình giảm dần
              arsort($averageRatings);
              
              // Lấy ra 6 sản phẩm có số sao trung bình cao nhất
              $topProducts = array_slice($averageRatings, 0, 6, true);
              
              // Hiển thị thông tin của 6 sản phẩm
              foreach ($topProducts as $idSanPham => $averageRating) {
                  $sanPham = $sanpham->getSanPhamById($idSanPham);
              
                  echo '<div class="latest-prdouct__slider__item">';
                  echo '    <a href="ttsanpham.php?spid='.$sanPham->getidsanpham().'" class="latest-product__item">';
                  echo '        <div class="latest-product__item__pic">';
                  echo '            <img src="../image/'.$sanphamdb->gethinhanhbyidsanpham($idSanPham)[0]['hinhanh'].'" alt="">';
                  echo '        </div>';
                  echo '        <div class="latest-product__item__text">';
                  echo '            <h6>' . $sanPham->getTenSanPham() . '</h6>';
                  echo '';
                  echo '<h6> '.$averageRating.'/5 <i class="fa-solid fa-star"  style="color: #FFA500;"></i></h6>';
                  echo '';
                  echo '            <span>'.$sanPham->getgiaban().' VNĐ </span>';
                  echo '        </div>';
                  echo '    </a>';
                  echo '</div>';
              }
                            ?>
                   
                        </div>
                    </div>
                </div>
            </div>
     
    </section>
                </div>
            </div>
        </div>
</section>