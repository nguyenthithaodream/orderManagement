<body>
    <div class="dsTaiKhoan1">
        <table class="table1">
            <thead>
                <tr class="rowTK">
                    <td>Mã tài khoản</td>
                    <td>Tên tài khoản</td>
                    <td>Mật khẩu</td>
                    <td>Email</td>
                    <td>Số điện thoại</td>
                    <td>Trạng thái</td>
                    <td>Phân quyền</td>
                    <td>Sửa</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('./ketNoi.php');
                    $result = mysqli_query($con,"SELECT * FROM taikhoan") or die(mysqli_error($con));
                    while($tam = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo ($tam['maTK'])?></td>
                    <td><?php echo ($tam['TenTK'])?></td>
                    <td><?php echo ($tam['matKhau'])?></td>
                    <td><?php echo ($tam['email'])?></td>
                    <td><?php echo ($tam['sdt'])?></td>
                    <td><?php echo ($tam['trangThai'])?></td>
                    <td><?php echo ($tam['phanQuyen'])?></td>
                    <td><a  href="./index_staff.php?xem=21&id=<?php echo ($tam['maTK']);?>"><img width="25px" height="20px" src="../anh/sua.png"/></a></td>
                    <td><a href="./index_staff.php?xem=22&id=<?php echo ($tam['maTK']);?>" onclick = "return confirm('Bạn có chắc chắn muốn xóa không?');"><img width="30px" height="20px" src="../anh/xoa.png"/></a></td>
                </tr>
                <?php 
                   }  
                ?>
            </tbody>
        </table>
        
    </div>
    
</body>

