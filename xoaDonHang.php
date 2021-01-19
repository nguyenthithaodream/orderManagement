<?php
    include('./ketNoi.php');
    if($_SESSION['phanQuyen'] == 'Khách hàng'){
                    $ma = $_GET['id'];
                    $thoiGian = time();
                    $hieu = $thoiGian-$_SESSION[$ma];
                    if($hieu>1800) header('location:index_staff.php?xem=24');
    }
    else{
        $result = mysqli_query($con,"delete from donhang where maDH='".$_GET['id']."'") or die(mysqli_error($con));
        header('location:index_staff.php?xem=12');
    }
    
?>
