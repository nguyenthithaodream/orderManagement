<body>
    <?php
        //bắt lỗi người dùng không điền đầy đủ thông tin
        include('./ketNoi.php');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errors = array();
            if(empty($_POST['tenTK'])) $errors[] = 'tenTK';
            else $tenTK = $_POST['tenTK'];
            if(empty($_POST['matKhau'])) $errors[] = 'matKhau';
            else $matKhau = md5($_POST['matKhau']);
            if(empty($_POST['xacthucmatKhau'])) $errors[] = 'xacthucmatKhau';
            else $xacthucmatKhau = $_POST['xacthucmatKhau'];            
            if(empty($_POST['email'])) $errors[] = 'email';
            else $email = $_POST['email'];
            if(empty($_POST['soDT'])) $errors[] = 'soDT';
            else $soDT = $_POST['soDT'];
            if(empty($_POST['trangThai'])) $errors[] = 'trangThai';
            else $trangThai = $_POST['trangThai'];
            if(empty($_POST['phanQuyen'])) $errors[] = 'phanQuyen';
            else $phanQuyen = $_POST['phanQuyen'];
            if(isset($_POST['taoTK'])){
                    $result1 = mysqli_query($con,"select tenTK from taikhoan where tenTK='$tenTK'") or die(mysqli_error($con));
                    $result2 = mysqli_query($con,"select email from taikhoan where email='$email'") or die(mysqli_error($con));
                    $resultc = mysqli_query($con,"select sdt from taikhoan where sdt='$soDT'") or die(mysqli_error($con));
                    if(mysqli_num_rows($result1)==1) $errors[] = 'trungten';
                    if(mysqli_num_rows($result2)==1) $errors[] = 'trungemail';
                    if(mysqli_num_rows($resultc)==1) $errors[] = 'trungsdt';
                    if(trim($_POST['matKhau']) != trim($_POST['xacthucmatKhau'])) $errors[] = 'xacThuc';
                    if(empty($errors)){
                        $result3 = mysqli_query($con,"INSERT INTO taikhoan(tenTK, matKhau, email, sdt, trangThai,phanQuyen) 
                            VALUES('$tenTK','$matKhau','$email',$soDT,'$trangThai','$phanQuyen')") or die(mysqli_error($con));
                        if (mysqli_affected_rows($con)==1){
                            echo 'Tạo tài khoản thành công';
                        }
                        else echo 'Tạo tài khoản thất bại';
                }
            }
        }
    ?>
    <div class="dsTaiKhoan">
        <form method="POST" class="form1">
            <h3 style="text-align: center;">TẠO MỚI TÀI KHOẢN</h3>
            <span>Tên tài khoản</span><br />
            <input type="text" name="tenTK" placeholder="Điền tên tài khoản" value="<?php if(isset($tenTK)) echo $tenTK;?>"/>
            <span class="loi"><?php if(isset($errors)&&in_array('tenTK',$errors)) echo"Tên tài khoản không được bỏ trống"; 
                                    if(isset($errors)&&in_array('trungten',$errors)) echo"Tên tài khoản đã tồn tại";?></span><br />
            <span>Mật khẩu</span><br />
            <input type="password" name="matKhau" placeholder="Điền mật khẩu" value="<?php if(isset($matKhau)) echo $matKhau;?>"/>
            <span class="loi"><?php if(isset($errors)&&in_array('matKhau',$errors)) echo"Mật khẩu không được bỏ trống";?></span><br />
            <span>Xác thực mật khẩu</span><br />
            <input type="password" name="xacthucmatKhau" placeholder="Nhập lại mật khẩu bên trên" value="<?php if(isset($xacthucmatKhau)) echo $xacthucmatKhau;?>"/>
            <span class="loi">
                <?php 
                    if(isset($errors)&&in_array('xacthucmatKhau',$errors)) echo "Mật khẩu xác thực không được bỏ trống";
                    if(isset($errors)&&in_array('xacThuc',$errors)) echo "Mật khẩu không khớp";
                ?>
            </span><br />
            <span>Email</span><br />
            <input type="email" name="email" placeholder="Điền email" value="<?php if(isset($email)) echo $email;?>"/>
            <span class="loi"><?php if(isset($errors)&&in_array('email',$errors)) echo"Email không được bỏ trống";
                                    if(isset($errors)&&in_array('trungemail',$errors)) echo"Email đã tồn tại";?></span><br />
            <span>Số điện thoại</span><br />
            <input type="text" name="soDT" placeholder="Điền số điện thoại" value="<?php if(isset($soDT)) echo $soDT;?>"/>
            <span class="loi"><?php if(isset($errors)&&in_array('soDT',$errors)) echo"Số điện thoại không được bỏ trống";
                                    if(isset($errors)&&in_array('trungsdt',$errors)) echo"Số điện thoại đã tồn tại";?></span><br />
            <span>Trạng thái</span><br />
            <input type="radio" name="trangThai" value="Kích hoạt" checked="<?php if($trangThai=='Kích hoạt') echo 'checked';?>"/><span>  Kích hoạt</span><br />
            <input type="radio" name="trangThai" value="Khóa" checked="<?php if($trangThai=='Khóa') echo 'checked';?>"/><span>  Khóa <br /></span>
            <span class="loi"><?php if(isset($errors)&&in_array('trangThai',$errors)) echo"Trạng thái chưa được chọn";?></span>
            <br /><span>Phân quyền</span><br />
            <select name="phanQuyen" >
                <option value="Nhân viên" selected="<?php if($phanQuyen=='Nhân viên') echo 'selected';?>">Nhân viên</option>
                <option value="Khách hàng" selected="<?php if($phanQuyen=='Khách hàng') echo 'selected';?>">Khách hàng</option>
                <option value="Quản lý" selected="<?php if($phanQuyen=='Quản lý') echo 'selected';?>">Quản lý</option>
                <option value="Quản trị viên" selected="<?php if($phanQuyen=='Quản trị viên') echo 'selected';?>">Quản trị viên</option>
            </select>
            <span class="loi"><?php if(isset($errors)&&in_array('phanQuyen',$errors)) echo"Phân quyền chưa được chọn";?></span><br />
            <input class="submitDSDangNhap"  type="submit" value="Hủy" name="huyTaoTK" onclick="return confirm('Bạn có chắc chắn muốn hủy không?');" style="margin-left: 450px;"/>
            <input class="submitDSDangNhap"  type="submit" value="Tạo" name="taoTK"/>
        </form>
    </div>
    
</body>

