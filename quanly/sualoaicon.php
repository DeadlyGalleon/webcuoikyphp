<?php require("../require.php"); ?> 
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

        if(isset($_GET['id'])){
$loaicondb=new loaicondb();
$loaidb=new loaidb();
$listallloai=$loaidb->getallloai();
    
$loaicon=$loaicondb->getloaiconbyid($_GET['id']);

        }
        
        ?>

        
        <div class="container">
           <div id="SuaSanPhamForm" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="../control/sualoaicon.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">						
                            <h4 class="modal-title">Sửa Loại Con</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">	
                             <div class="form-group">
                                <label>ID</label>
                                <input value="<?php echo $_GET['id'] ?>" name="idloaicon" type="text" class="form-control" readonly="" required>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input value="<?php echo $loaicon->gettenloaicon() ?>" name="nameloaicon" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
    <label>Thuộc Loại</label>
    <select name="idloaicha" class="form-select" aria-label="Default select example">
        <?php 
       foreach ($listallloai as $loai) {
      if($loaicon->getidloaicha()==$loai->getidloai())  $tenloai = $loai->gettenloai(); 
       }
        foreach ($listallloai as $loai) {
            $selected = ($loai->gettenloai() == $tenloai) ? "selected" : "";
        ?> 
            <option value="<?php echo $loai->getidloai(); ?>" <?php echo $selected; ?>><?php echo $loai->gettenloai(); ?></option>
        <?php } ?> 
    </select>
</div>


                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="quanlydanhmuc.php">  <input type="button" class="btn btn-default" data-dismiss="modal" value="Quay Về"></a>
                            <input type="submit" class="btn btn-success" value="Sửa">
                        </div>
                    </form>
                </div>
            </div>
           
      
        <!-- Edit Modal HTML -->
        
        
        

        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>



