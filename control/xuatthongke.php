<?php

require('../require.php');

$thongkedb=new thongkedb();
$thongkedb->xuatthongke();
header('Location: ../quanly/thongke.php');
exit();


?>