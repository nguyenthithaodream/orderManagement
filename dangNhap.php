<body>
    <?php
        session_start();
        if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
            include('./ketNoi.php');
            if(isset($_POST['dangNhap'])){
                $errors = array();
                if(isset($_POST['ten'])) $ten = $_POST['ten'];
                else $errors[]='ten';
                if(isset($_POST['matkhau'])) $matkhau = md5($_POST['matkhau']);
                else $errors[]='matkhau';
                if(empty($errors)){
                    $result4 = mysqli_query($con,"select TenTK,maTK,phanQuyen from taikhoan 
                                where (TenTK = '$ten' OR email = '$ten' OR sdt='$ten') AND matKhau='$matkhau'") or die(mysqli_error($con));
                    if(mysqli_num_rows($result4)==1){
                        list($tenTK,$maTK,$phanquyen) = mysqli_fetch_array($result4, MYSQLI_NUM);
                        $_SESSION['ten'] = $tenTK;
                        $_SESSION['maTK'] = $maTK;
                        $_SESSION['phanQuyen'] = $phanquyen;
                        header('location:index_staff.php');
                    }
                    else $errors[]='saithongtin';
                }
            }
        }
    ?>
    <div>
        <form method="POST">
            <table class="tableDangNhap">
                <tr>
                    <td colspan="3"><h3 style="text-align: center;">ĐĂNG NHẬP</h3></td>
                </tr>
                <tr>
                    <td>Tên đăng nhập/ Email/ SĐT</td>
                    <td colspan="2">
                        <input type="text" name="ten" placeholder="Điền mật khẩu, email hoặc số điện thoại" value="<?php if(isset($ten))echo $ten?>"/>
                        <span class="loi">
                            <?php
                                if(isset($errors)&&in_array('ten',$errors)) echo 'Thông tin đăng nhập không được bỏ trống';
                            ?>
                        </span>
                        
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td colspan="2"><input type="password" name="matkhau" placeholder="Điền mật khẩu"
                        value="<?php if(isset($matkhau))echo $matkhau;?>"/>
                        <span class="loi">
                            <?php
                                if(isset($errors)&&in_array('matkhau',$errors)) echo 'Thông tin đăng nhập không được bỏ trống';
                                if(isset($errors)&&in_array('saithongtin',$errors)) echo 'Thông tin đăng nhập không đúng';
                            ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="dangNhap" value="Đăng nhập" class="textDangNhap" style="width:80px;height: 30px;margin: 3px 10px;margin-left: 220px;
                                                                                                            background-color: lightblue;border-radius: 4px;text-align: center;"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="text-align: center;">
                        <a href="">Quên mật khẩu</a> &nbsp;&nbsp;&nbsp;
                        <a href="">Đăng ký tài khoản</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
