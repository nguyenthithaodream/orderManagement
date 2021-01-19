<?php

    include("ketNoi.php");
    $result = mysqli_query($con,"select diaChi,tinh,huyen,xa from khachhang where maTK = '".$_SESSION['maTK']."'");
    list($diaChi,$tinh,$huyen,$xa) = mysqli_fetch_array($result);
    echo $diaChi.','.$xa.','.$huyen.','.$tinh;
?>
