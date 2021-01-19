<body>
    <?php
            if(isset($_POST['submit'])){
                header('location:index_staff.php');
            } 
    ?>
    <div class="tableThongBaoQuyen">
        <form method='POST'>
            <table>
                <tr><h3>THÔNG BÁO</h3></tr>
                <tr><p><img src="../anh/X-icon.png" width="25px" height="20px"/> &nbsp;&nbsp;Bạn không được phép truy cập vào chức năng này</p></tr>
                <tr><input type="submit" class="submitDSDangNhap" name="submit" value="Đóng"/></tr>
            </table>
        </form>
