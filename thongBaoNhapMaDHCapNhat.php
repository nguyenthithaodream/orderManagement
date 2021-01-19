<body>
    
    <div class="tableThongBaoQuyen">
        <form method='POST'>
            <table>
                <tr><h3>THÔNG BÁO</h3></tr>
                <tr><input type="text" name="maShipper" placeholder="Nhập mã shipper của bạn." style="width: 380px;"/></tr>
                <tr><input type="submit" class="submitDSDangNhap" name="submit" value="OK"/></tr>
            </table>
        </form>
    </div>
    <?php
            if(isset($_POST['submit'])){
                $_SESSION['maShipper'] = $_POST['maShipper'];
                header('location:./index_staff.php?xem=30');
            } 
    ?>
</body>
