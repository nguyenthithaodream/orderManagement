<?php

    $con = mysqli_connect("localhost","root","","quanlygiaohang");
    mysqli_set_charset($con,'UTF8');
    if (mysqli_connect_error()){
        echo "kết nối thất bại".mysqli_connect_error();
        
    }
?>
