<body>
    <div class="taoMoiDonHang" >
        <table class="table1" style="margin-left: 200px;">
            <thead>
                <tr>
                    <td>Mã shipper</td>
                    <td>Tên shipper</td>
                    <td>Tỉnh hoạt động</td>
                    <td>Huyện hoạt động</td>
                    <td>Xem số đơn giao</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('ketNoi.php');
                    $result = mysqli_query($con,"select shipper.maShipper,shipper.hoTen,tinh.tenTinh,huyen.tenHuyen from shipper inner join tinh on shipper.maTinh = tinh.maTinh
                                                                        inner join huyen on shipper.maHuyen = huyen.maHuyen")or die(mysqli_error($con));
                    while($tam = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $tam['maShipper']?></td>
                        <td><?php echo $tam['hoTen']?></td>
                        <td><?php echo $tam['tenTinh']?></td>
                        <td><?php echo $tam['tenHuyen']?></td>
                        <td><a href="./index_staff.php?xem=27&id=<?php echo ($tam['maShipper']);?>&tinh=<?php echo ($tam['tenTinh']);?>">Xem chi tiết</a></td>
                    </tr>
                <?php
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>
</body>
