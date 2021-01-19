<body>
    <div class="taoMoiDonHang_ngan">
        <table class="table1">
            <thead>
                <tr>
                    <td>Mã đơn hàng</td>
                    <td>Tên shop</td>
                    <td>Tỉnh nhận hàng</td>
                    <td>Huyện nhận hàng</td>
                    <td>Địa chỉ</td>
                    <td>Ngày tạo đơn</td>
                    <td>Tình trạng</td>
                    <td>Phân công</td>
                    <td>Xem chi tiết đơn hàng</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('ketNoi.php');$a = 0;
                    $result = mysqli_query($con,"select maDH,khachhang.tenShop,donhang.tinh,donhang.huyen,donhang.diaChi,donhang.ngayTao,donhang.duyet 
                                                    from donhang inner join khachhang on khachhang.maKH = donhang.maKH
                                                    where donhang.tinhLayHang='".$_GET['tinh']."'  
                                                    order by ngayTao DESC")or die(mysqli_error($con));
                    while($tam = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $tam['maDH']?></td>
                        <td><?php echo $tam['tenShop']?></td>
                        <td><?php echo $tam['tinh']?></td>
                        <td><?php echo $tam['huyen']?></td>
                        <td><?php echo $tam['diaChi']?></td>
                        <td><?php echo $tam['ngayTao']?></td>
                        <td><?php echo $tam['duyet']?></td>
                        <td>
                            <?php
                                $result1 = mysqli_query($con,"select tinhtrang from tinhtrangdonhang where maDH = '".$tam['maDH']."' and tinhtrang = 'Phân công lấy hàng'");
                                if(mysqli_num_rows($result1)==1) echo "Đã phân công";
                                else echo "Chưa phân";
                            ?>
                        </td>
                        <td><a href="./index_staff.php?xem=28&ma=<?php echo ($tam['maDH']);?>&ma1=<?php echo $_GET['id'];?>">Xem chi tiết</a></td>
                    </tr>
                <?php
                    $a= $a+1;
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>
    <div>
        <form method="POST">
            <p style="color: blue; font-weight: bold;">&emsp;&emsp;&emsp;Tổng đơn hàng: 
            <?php echo $a ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="submit" name="Thoat" value="Thoát" style="width: 110px; height: 35px; background-color: deepskyblue;" />
            </p>
            <?php
                
                        
                        if(isset($_POST['Thoat'])){
                                    header('location: index_staff.php?xem=2');
                        }
               
            ?>
        </form>
        
    </div>
    
</body>
