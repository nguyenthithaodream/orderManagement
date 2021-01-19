<body>
    <div class="taoMoiDonHang">
        <form method="POST">
            <table class="table1">
                <thead>
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td>Tên shop</td>
                        <td>Ngày tạo</td>
                        <td>Tình trạng</td>
                        <td>Tiền thu</td>
                        <td>Thực hiện</td>
                        <td>Xem chi tiết</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = mysqli_query($con,"select tinhtrangdonhang.maDH,khachhang.tenShop,donhang.ngayTao,tinhTrang
                                                        from donhang inner join tinhtrangdonhang on donhang.maDH = tinhtrangdonhang.maDH
                                                        inner join khachhang on khachhang.maKH = donhang.maKH where tinhtrangdonhang.maShipper = '".$_SESSION['maShipper']."'") or die(mysqli_error($con));
                        while($tam = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                            <tr>
                                <td><?php echo $tam['maDH']?></td>
                                <td><?php echo $tam['tenShop']?></td>
                                <td><?php echo $tam['ngayTao']?></td>
                                <td>
                                    <select name="tinhTrang">
                                        <option></option>
                                        <option value="Đã lấy hàng">Đã lấy hàng</option>
                                        <option value="Đã giao hàng">Đã giao hàng</option>
                                        <option value="Không lấy được hàng">Không lấy được hàng</option>
                                        <option value="Không giao được hàng">Không giao được hàng</option>
                                        <option value="Delay giao hàng">Delay giao hàng</option>
                                        <option value="Delay lấy hàng">Delay lấy hàng</option>
                                    </select>
                                </td>
                                <td><input type="text" name="tienThu" class="input1" value="<?php if(isset($_POST['tienThu'])) echo $_POST['tienThu'];?>"/></td>
                                <td><input type="submit" name="capNhat" value="Cập nhật" class="submitDSDangNhap" style="width: 70px;"/></td>
                                <td><a href="index_staff.php?xem=31&ma=<?php echo $tam['maDH']?>">Chi tiết</a></td>
                            </tr>
                    <?php
                            if(isset($_POST['capNhat'])){
                                if(isset($_POST['tinhTrang'])||isset($_POST['tienThu'])){
                                    if($_POST['tinhTrang']!=''){
                                        $result1 = mysqli_query($con,"update tinhtrangdonhang set tinhTrang = '".$_POST['tinhTrang']."',tienDaThu = '".$_POST['tienThu']."' where maDH = '".$tam['maDH']."'")
                                        or die (mysqli_error($con));
                                        if(mysqli_affected_rows($con)==1) echo "Cập nhật thành công!";
                                    }
                                    else echo "Bạn chưa nhập thông tin cập nhật!";
                                }
                                
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    
</body>
