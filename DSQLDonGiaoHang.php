<body>
    <div class="taoMoiDonHang">
        <table class="table1" style="margin-left: 150px;">
            <thead>
                <tr>
                    <td>Mã đơn hàng</td>
                    <td>Mã khách hàng</td>
                    <td>Tên shop</td>
                    <td>Tình trạng</td>
                    <td>Ngày tạo đơn</td>
                    <td>Xem chi tiết</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('./ketNoi.php'); 
                    $result  = mysqli_query($con,"select khachhang.maKH,donhang.maDH,tenShop,donhang.duyet,donhang.ngayTao
                                    from donhang 
                                    inner join khachhang on donhang.maKH = khachhang.maKH 
                                    order by donhang.ngayTao desc
                                    ") or die(mysqli_error($con));
                    while($tam = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                        
                ?>
                     <tr>
                        <td><?php echo $tam['maDH'];?></td>
                        <td><?php echo $tam['maKH'];?></td>
                        <td><?php echo $tam['tenShop'];?></td>
                        <td>
                            <?php 
                                $result1 = mysqli_query($con,"select tinhtrang from tinhtrangdonhang where maDH = '".$tam['maDH']."'");
                                if(mysqli_num_rows($result1)==1){
                                    $m = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                    echo $m['tinhtrang'];
                                }
                                else  echo $tam['duyet'];
                            ?>
                        </td>
                        <td><?php echo $tam['ngayTao']?></td>
                        <td><a href="index_staff.php?xem=23&ma=<?php echo $tam['maDH'];?>">Xem chi tiết</a></td>
                    </tr>   
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
