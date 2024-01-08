<?php 
require('../require.php');
session_start();
if(isset($_SESSION['idtk'])){
$taikhoandb=new taikhoandb();
$taikhoan=$taikhoandb->gettaikhoan($_SESSION['idtk']);
if($taikhoan->getquanly()==1 || $taikhoan->getadmin()==1){

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản Lý Sản Phẩm</title>
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet">
        <style>
            img{
                width: 200px;
                height: 120px;
            }
            
input[type="submit"], button[type=submit] {
    background: none repeat scroll 0 0 #435d7d;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
}

input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
        </style>
    <body>
       
        <div class="container">
        <div class="row"> 
            <a href="../mainwweb">   <button type="submit">Trở Về Trang Chủ</button></a>
           
<a  href="../quanly/"><button type="submit">Quản lý Sản Phẩm</button></a>
<?php if($taikhoan->getadmin()==1){ ?>

<a href="quanlytaikhoan.php"><button type="submit">Quản lý tài khoản</button></a>
<?php }?> 
<a href="quanlydonhang.php"><button type="submit">Quản lý đơn hàng</button></a>
<a href="thongke.php"><button type="submit">Thống Kê</button></a>
</div> 
            <div class="row">
 
    <!-- ... (các cột khác) ... -->
</div>
<?php 
                $loaidb=new loaidb();
                $listallloai=$loaidb->getallloai();
                $loaicondb=new loaicondb();
                $listallloaicon=$loaicondb->getallloaicon();

                ?> 

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Danh Mục</b></h2>
                        </div>
                      
                    </div>
                </div>
                </div>
      
                <div class="row">

                <div class="col-sm-6">
                <div class="table-wrapper">
                    
                <div class="col-sm-3">
                <h4><b>Loại</b></h4>
                </div>
                <div class="col-sm-3">
              <right><a href="#addloai"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a></right>  
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                         
                            <th>Id Loại</th>
                            <th>Tên Loại</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($listallloai as $loai){ ?>
                            <tr>
                               
                                <td><?php echo $loai->getidloai() ?> </td>
                                <td><?php echo $loai->gettenloai() ?> </td>
                        

            
                                <td>
                                    <a href="sualoai.php?id=<?php echo $loai->getidloai() ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $loai->getidloai(); ?>, 'loai')">
    <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
</a>


                                </td>
                            </tr>
                      
                        <?php  } ?> 
                    </tbody>
                </table>

                </div>

</div>
                <div class="col-sm-6">
                <div class="table-wrapper">
                    
                <div class="col-sm-3">
                <h4><b>Loại Con</b></h4>
                </div>
                <div class="col-sm-3">
              <right><a href="#addloaicon"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a></right>  
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                         
                            <th>Id Loại Con</th>
                            <th>Tên Loại</th>
                            <th>Thuộc Loại</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($listallloaicon as $loaicon){ ?>
                            <tr>
                               
                                <td><?php echo $loaicon->getidloaicon() ?> </td>
                                <td><?php echo $loaicon->gettenloaicon() ?> </td>
                                <td>
                                    <?php
                                    $loai=$loaicondb->getloaichabyloaicon($loaicon->getidloaicon());
                                    echo "ID: ";
                                    echo $loai->getidloai();
                                    echo ", ";
                                    echo $loai->gettenloai();

                                    

                                    ?> 
                                </td>
                                <td>
                                    <a href="sualoaicon.php?id=<?php echo $loaicon->getidloaicon() ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $loaicon->getidloaicon(); ?>, 'loaicon')">
    <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
</a>

                                </td>
                            </tr>
                      
                        <?php  } ?> 
                    </tbody>
                </table> 

                </div>
             
              







                
           
             
    
          

</div>










</div>
      
        
    
        
<div id="addloai" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addsanphamform" action="../control/themloai.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Loại</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên Loại</label>
                        <input name="nameloai" type="text" class="form-control" required>
                    </div>
                 
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Trở Lại">
                    <input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="addloaicon" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addsanphamform" action="../control/themloaicon.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Loại Con</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="nameloaicon" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Thuộc Loại</label>
                        <select name="category" class="form-select" aria-label="Default select example">
                          
                                <?php $loaidb=new loaidb();
                                $listallloai=$loaidb->getallloai();
                                foreach($listallloai as $loai){    ?> 
                                <option value="<?php echo $loai->getidloai() ?>"><?php echo $loai->gettenloai() ?></option>
                           <?php } ?>

                        </select>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Trở Lại">
                    <input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>







</div>




        <script src="js/ajax.js"></script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>
<!-- ... (previous HTML code) ... -->

<script>
    function confirmDelete(id, type) {
        let confirmMessage = "";
        switch (type) {
            case 'loai':
                confirmMessage = "Bạn có chắc chắn muốn xóa loại này không?";
                break;
            case 'loaicon':
                confirmMessage = "Bạn có chắc chắn muốn xóa hãng này không?";
                break;
            case 'lienket':
                confirmMessage = "Bạn có chắc chắn muốn xóa liên kết này không?";
                break;
            default:
                confirmMessage = "Bạn có chắc chắn muốn xóa?";
        }

        if (confirm(confirmMessage)) {
            // Modify the URL based on the type of deletion
            let url = "";
            if (type === 'lienket') {
                // If it's a 'lienket', handle it differently
                window.location.href = "../control/xoalienket.php?idloai=" + id[0] + "&idloaicon=" + id[1];
            } else {
                url = type === 'loai' ? "../control/xoaloai.php?id=" : "../control/xoaloaicon.php?id=";
                window.location.href = url + id;
            }
        }
    }
</script>

<!-- ... (rest of your HTML code) ... -->
<?php 

}
}
?> 