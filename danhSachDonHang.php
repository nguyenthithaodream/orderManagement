<body>
    <div class="taoMoiDonHang">
        <table class="table1">
            <thead>
                <tr>
                    <td>maDH</td>
                    <td>SĐT (người nhận)</td>
                    <td>Tỉnh (người nhận)</td>
                    <td>Huyện (người nhận)</td>
                    <td>Địa chỉ (người nhận)</td>
                    <td>Địa chỉ (người gửi)</td>
                    <td>Thời gian lấy hàng</td>
                    <td>Tên SP</td>
                    <td>Số lượng</td>
                    <td>Phí ship</td>
                    <td>Bên chịu phí</td>
                    <td>Tiền thu hộ</td>
                    <td>Giá trị hàng</td>
                    <td>Tổng tiền</td>
                    <td>Tỉnh (người gửi)</td>
                    <td>Trọng lượng</td>
                    <td>Thời gian giao</td>
                    <td>Ngày tạo đơn</td>
                    <td>Sửa</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('ketNoi.php');
                    $result = mysqli_query($con,"select * from donhang")or die(mysqli_error($con));
                    while($tam = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $tam['maDH']?></td>
                        <td><?php echo $tam['sdtKhach']?></td>
                        <td><?php echo $tam['tinh']?></td>
                        <td><?php echo $tam['huyen']?></td>
                        <td><?php echo $tam['diaChi']?></td>
                        <td><?php echo $tam['DCLayHang']?></td>
                        <td><?php echo $tam['TGMuonLay']?></td>
                        <td><?php echo $tam['tenSP']?></td>
                        <td><?php echo $tam['soLuong']?></td>
                        <td><?php echo $tam['phiShip']?></td>
                        <td><?php echo $tam['nguoiTraTien']?></td>
                        <td><?php echo $tam['tienThuHo']?></td>
                        <td><?php echo $tam['giaTriHang']?></td>
                        <td><?php echo $tam['tongTien']?></td>
                        <td><?php echo $tam['tinhLayHang']?></td>
                        <td><?php echo $tam['trongLuong']?></td>
                        <td><?php echo $tam['TGgiao']?></td>
                        <td><?php echo $tam['ngayTao']?></td>
                        <td id="linkSua"><a href="./index_staff.php?xem=13&id=<?php echo ($tam['maDH']);?>"><img id="sua" src="../anh/sua.jpg" style="width: 20px;" /></a></td>
                        <td id="linkXoa"><a href="./index_staff.php?xem=14&id=<?php echo ($tam['maDH']);?>"><img onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" id="xoa" src="../anh/xoa.png" style="width: 20px;" /></a></td>
                    </tr>
                <?php
                    }
                    
                ?>
                <script>
                    /*var Sua = document.getElementById('sua');
                    Sua.onclick = function(){
                        var time = new Date();
                        var timeEnd = time.getTime();
                        var timeStart = '<?php echo $_SESSION['tg_start'];?>';
                        var hieu = timeEnd - timeStart;
                        var dktg;
                        if (hieu<=1800000) dktg = 'ok';//hiệu số thời gian trôi qua kể từ lúc tạo nhỏ hơn 30'
                        else  dktg = 'no';  
                        $.get("content.php",{'dktg':dktg},function(data){
                                alert(data);
                        });
                    };*/
                </script>
            </tbody>
        </table>
    </div>
</body>
