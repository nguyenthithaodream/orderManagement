<body>
    <?php
                include('./ketNoi.php');
                if($_SESSION['phanQuyen'] == 'Khách hàng'){
                    $ma = $_GET['id'];
                    $thoiGian = time();
                    $hieu = $thoiGian-$_SESSION[$ma];
                    if($hieu>1800) header('location:index_staff.php?xem=24');
                }
                $result16 = mysqli_query($con,"select * from donhang where maDH = '$ma'") or die(mysqli_error($con));
                if(mysqli_num_rows($result16)==1){
                    list($maHD,$sdt,$tinh16,$huyen16,$diaChi16,$DCLayHang16,$TGMuonLay16,$tenSP16,$soLuong16,$phiShip16,$nguoiTraTien16,$tienThuHo16,$giaTriHang16,$tongTien16,$tinhLayHang16,$trongLuong16) = mysqli_fetch_array($result16,MYSQLI_NUM);
                }
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['dangDon'])){
                    $errors = array();
                    if(empty($_POST['sdt'])) $errors[] = 'sdt';
                    else $_sdt = $_POST['sdt'];
                    if(empty($_POST['tinh'])) $errors[] = 'tinh';
                    else $_tinh = $_POST['tinh'];
                    if(empty($_POST['huyen'])) $errors[] = 'huyen';
                    else $_huyen = $_POST['huyen']; 
                    if(empty($_POST['diaChi'])) $errors[] = 'diaChi'; 
                    else $_diaChi = $_POST['diaChi'];
                    if(empty($_POST['tinhLayHang'])) $errors[] = 'tinhLayHang'; 
                    else $_tinhLayHang = $_POST['tinhLayHang'];
                    if(empty($_POST['tienThuHo'])) $errors[] = 'tienThuHo';
                    else $_tienThuHo = $_POST['tienThuHo']; 
                    if(empty($_POST['giaTriHang'])) $errors[] = 'giaTriHang';
                    else $_giaTriHang = $_POST['giaTriHang']; 
                    if(empty($_POST['tenSP'])) $errors[] = 'tenSP';
                    else $_tenSP = $_POST['tenSP']; 
                    if(empty($_POST['trongLuong'])) $errors[] = 'trongLuong';
                    else $_trongLuong = $_POST['trongLuong']; 
                    if(empty($_POST['soLuong'])) $errors[] = 'soLuong'; 
                    else  $_soLuong = $_POST['soLuong'];
                    }
                }
    ?>  
     
    <div class="taoMoiDonHang">
        <form method="POST">
        <div class="left">
             <table class="table2">
                    <tr>
                        <td style="text-align: center;" colspan="2"><h3>Thông tin người nhận hàng</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input style="width: 400px;" class="input1" type="text" name="sdt" placeholder="Nhập số điện thoại của khách hàng" value="<?php if(isset($_sdt)){ echo $_sdt;} else if(isset($sdt)){echo $sdt;}?>" />
                            <span class="loi"> 
                                <?php
                                    if(isset($errors)&&in_array('sdt',$errors)) echo "Số điện thoại khách hàng không được bỏ trống";
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <select class="input1" id="tinh" name="tinh">
                                <option value="">
                                    <?php 
                                            if(isset($_POST['tinh'])){
                                                $result11 = mysqli_query($con,"select tenTinh from tinh where maTinh = '".$_POST['tinh']."'") or die(mysqli_error($con));
                                                $t1 = mysqli_fetch_array($result11,MYSQLI_ASSOC);
                                                echo $t1['tenTinh'];//code dòng để lấy mã miên PHỤC VỤ CHO HIỆN PHÍ SHIP
                                            }
                                            else echo '---Chọn tỉnh---';
                                    ?>
                                </option>
                                <?php
                                    
                                    $result = mysqli_query($con,"select * from tinh") or die(mysqli_error($con));
                                    while($tinh = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        echo '<option value="'.$tinh['maTinh'].'">'.$tinh['tenTinh'].'</option>'; 
                                    }
                                ?>
                            </select>
                            <span class="loi"> 
                                <?php
                                    if(isset($errors)&&in_array('tinh',$errors)) echo "Bạn chưa chọn tỉnh/thành phố";
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <select class="input1" id="huyen" name="huyen">
                            <option value="">
                                <?php 
                                        if(isset($_POST['huyen'])){
                                            $result12 = mysqli_query($con,"select tenHuyen from huyen where maHuyen = '".$_POST['huyen']."'") or die(mysqli_error($con));
                                            $huyen11 = mysqli_fetch_array($result12,MYSQLI_NUM);
                                            echo $huyen11[0];
                                        }  
                                        else echo '---Chọn huyện---';
                                    ?>
                            </option>
                                <script>
                                    jQuery(document).ready(function($){
                                        $("#tinh").change(function(event){
                                            
                                            maTinh = $("#tinh").val();
                                            // lấy danh sách các huyện theo tỉnh chọn
                                            $.post('huyen.php',{"matinh":maTinh}, function(data){
                                                $("#huyen").html(data);
                                            });
                                            
                                        });
                                    });
                                </script>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="input1" type="text" name="diaChi" placeholder="Nhập địa chỉ chi tiết" value="<?php if(isset($_diaChi)) echo $_diaChi; else if(isset($diaChi16)) echo $diaChi16; ?>" />
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('diaChi',$errors)) echo "Địa chỉ giao hàng không được bỏ trống.";?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"><h3>Thông tin cửa hàng của bạn</h3></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ lấy hàng</td>
                        <td>
                            <select class="input1" name="tinhLayHang" id="tinhLayHang">
                                <option value="">
                                    <?php 
                                        
                                        if(isset($_POST['tinhLayHang'])){
                                            $result13 = mysqli_query($con,"select tenTinh from tinh where maTinh = '".$_POST['tinhLayHang']."'") or die(mysqli_error($con));
                                            $t2 = mysqli_fetch_array($result13,MYSQLI_ASSOC);
                                            echo $t2['tenTinh'];
                                        }
                                        else echo '---Chọn tỉnh---';
                                    ?>
                                </option>
                                <?php
                                    
                                    $resultd = mysqli_query($con,"select * from tinh") or die(mysqli_error($con));
                                    while($tinhd = mysqli_fetch_array($resultd,MYSQLI_ASSOC)){
                                        echo '<option value="'.$tinhd['maTinh'].'">'.$tinhd['tenTinh'].'</option>'; 
                                    }
                                ?>
                            </select>
                            <span class="loi"> 
                                <?php
                                    if(isset($errors)&&in_array('tinhLayHang',$errors)) echo "Bạn chưa chọn tỉnh/thành phố";
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ lấy hàng</td>
                        <td>
                            <input class="input1" type="text" name="DCLayHang" value="<?php if(isset($_POST['DCLayHang'])) echo $_POST['DCLayHang']; else if(isset($DCLayHang16)) echo $DCLayHang16;?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Dự kiến lấy hàng</td>
                        <td>
                            <select id="DKLayHang78" class="input1" name="DKLayHang78">
                                <option value="Chiều nay" selected="<?php if((isset($_POST['DKLayHang78']))&&($_POST['DKLayHang78']=='Chiều nay')) echo 'selected';?>">Chiều nay</option>
                                <option value="Tối nay" selected="<?php if((isset($_POST['DKLayHang78']))&&($_POST['DKLayHang78']=='Tối nay')) echo 'selected';?>">Tối nay</option>
                                <option value="Sáng mai" selected="selected="<?php if((isset($_POST['DKLayHang78']))&&($_POST['DKLayHang78']=='Sáng mai')) echo 'selected';?>"">Sáng mai</option>
                            </select>
                        </td>
                        
                    </tr>
                </table>
            
        </div>
        <div class="right">
                <table class="table2">
                    <tr>
                        <td style="text-align: center;" colspan="3"><h3>Thông tin hàng hóa</h3></td>
                    </tr>
                    <tr>
                        <td>Thời gian giao</td>
                        <td colspan="2">
                            <input id="TGGiao1" class="input1" type="radio" name="TGGiao" value="Giao nhanh" checked="<?php if(isset($TGMuonLay16)&&($TGMuonLay16=='Giao nhanh')) echo 'checked';?>"/> Giao nhanh&emsp;
                            &emsp;&emsp;&emsp;<input id="TGGiao2" class="input1" type="radio" name="TGGiao" value="Giao chuẩn" checked="<?php if(isset($TGMuonLay16)&&($TGMuonLay16=='Giao chuẩn')) echo 'checked';?>" /> Giao chuẩn
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Phí ship</td>
                        <td>
                            <p><input id="phiShip" name="phiShip" type="text" placeholder="0" style="width: 143px;" readonly="" value="<?php if(isset($_POST['phiShip'])) echo $_POST['phiShip']; else if(isset($phiShip16)) echo $phiShip16;?>"/></p>
                            <script>
                                  
                                    var maTinh;var maTinhLayHang;var c; var tg;var ti; 
                                    var tggiao1 = document.getElementById('TGGiao1');
                                    var tggiao2 = document.getElementById('TGGiao2');
                                    var tinhlayhang = document.getElementById("tinhLayHang");
                                    var tin = document.getElementById("tinh");
                                    tin.onchange = tinh1;
                                    function tinh1(){
                                        maTinh = tin.value;
                                        if (maTinhLayHang!='') hienPhiShip(maTinh,maTinhLayHang);
                                    };
                                    tinhlayhang.onchange = tinh2;
                                    function tinh2(){
                                        maTinhLayHang = tinhlayhang.value;
                                        if (maTinh!='') hienPhiShip(maTinh,maTinhLayHang);
                                    };
                                    tggiao1.onclick = nhanh;
                                    tggiao2.onclick = chuan;
                                    function nhanh(){
                                            tg = 'nhanh';
                                            if((maTinh!='')&&(maTinhLayHang!='')){
                                                hienPhiShip(maTinh,maTinhLayHang);
                                            }
                                    };
                                    function chuan(){
                                            tg = 'chuẩn';
                                            if((maTinh!='')&&(maTinhLayHang!='')){
                                                hienPhiShip(maTinh,maTinhLayHang);
                                            }
                                            
                                    };
                                    
                                     function hienPhiShip(a,b){
                                            ti = dklayhang78.value;
                                            if((maTinh!="")&&(maTinhLayHang!="")){
                                                if(a == b){
                                                    if(tg=='nhanh'){
                                                        phiShip.value = '25000';
                                                        if(ti == 'Chiều nay') phiShip.value = '30000';
                                                        if(ti == 'Tối nay') phiShip.value = '27500';
                                                    }else{
                                                        phiShip.value = '18000';
                                                        if(ti == 'Chiều nay') phiShip.value = '23000';
                                                        if(ti == 'Tối nay') phiShip.value = '20500';
                                                    } 
                                                } 
                                                if(a!=b){
                                                    if(tg=='nhanh'){
                                                        phiShip.value = '35000';
                                                        if(ti == 'Chiều nay') phiShip.value = '40000';
                                                        if(ti == 'Tối nay') phiShip.value = '37500';
                                                    } 
                                                    else{
                                                        phiShip.value = '25000';
                                                        if(ti == 'Chiều nay') phiShip.value = '30000';
                                                        if(ti == 'Tối nay') phiShip.value = '27500';
                                                    } 
                                                } 
                                            }
                                        }
                                     
                                    var dklayhang78 = document.getElementById('DKLayHang78');
                                    dklayhang78.onchange = function(){
                                        hienPhiShip(maTinh,maTinhLayHang);
                                    };
                        
                                       /* $("#tinh").change(function(event){
                                            maTinh = $("#tinh").val();
                                            //lấy mã miền để tính phí ship
                                            $.post('layMaMienTinh.php',{"matinh":maTinh},function(data){
                                                $('#phiShip').html(data);
                                                
                                               
                                            });
                                            maa = $('#phiShip').val();
                                        });
                                        $("#tinhLayHang").change(function(){
                                            maTinh = $("#tinhLayHang").val();
                                            
                                            $.post('layMaMienTinhLayHang.php',{"matinh":maTinh},function(data){
                                                $('#phiShip').html(data);
                                                
                                            });
                                            mab = $('#phiShip').val();
                                        });*/
                            </script>
                        </td>
                        <td>
                            <input class="input1" type="radio" name="NguoiChiuShip" value="Shop trả" checked="<?php if((isset($_POST['NguoiChiuShip']))&&($_POST['NguoiChiuShip']=='Shop trả')) echo 'checked';?>" /> Shop trả&emsp;
                            <input class="input1" type="radio" name="NguoiChiuShip" value="Khách trả" checked="<?php if((isset($_POST['NguoiChiuShip']))&&($_POST['NguoiChiuShip']=='Khách trả')) echo 'checked';?>"> Khách trả
                        </td>
                    </tr>
                    <tr>
                        <td>Tiền thu hộ</td>
                        <td colspan="2">
                            <input id="tienThuHo" class="input1" type="text" name="tienThuHo" placeholder="Nhập tiền thu hộ" value="<?php if(isset($_POST['tienThuHo'])) echo $_POST['tienThuHo']; else if(isset($tienThuHo16)) echo $tienThuHo16;?>"/> 
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('tienThuHo',$errors)) echo "Tiền thu hộ không được bỏ trống";?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Giá trị hàng</td>
                        <td colspan="2">
                            <input id="giaTriHang" class="input1" type="text" name="giaTriHang" placeholder="Nhập giá trị hàng" value="<?php if(isset($_POST['giaTriHang'])) echo $_POST['giaTriHang']; else if(isset($giaTriHang16)) echo $giaTriHang16;?>"/>
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('giaTriHang',$errors)) echo "Giá trị hàng không được bỏ trống";?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng giá trị</td>
                        <td colspan="2">
                            <input id="tongGiaTri" class="input1" type="text" name="tongGiaTri" readonly="" value="<?php if(isset($_POST['tongGiaTri'])) echo $_POST['tongGiaTri']; else if(isset($tongTien16)) echo$tongTien16;?>"/>
                            <script>
                                var so = 0;
                                tienThuHo.onchange = function(){
                                    so = so + 1;
                                    var tienThuHo = document.getElementById('tienThuHo').value;
                                    if(so==1){
                                        var giatrihang = document.getElementById('giaTriHang');
                                        giatrihang.value = tienThuHo;
                                    } 
                                    
                                    tongGiaTri.value = tienThuHo;
                                }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td colspan="2">
                            <input id="maDonHang" name="maDonHang" type="text" readonly="" value="<?php if(isset($_POST['maDonHang'])) echo $_POST['maDonHang']; else if(isset($maHD)) echo $maHD;?>" readonly=""/>
                            
                        </td>
                    </tr>
                </table>
                <div id="bangSPThem">
                <table class="table2">
                    <tr>
                        <td colspan="2">
                            <input class="input1" type="text" name="tenSP" placeholder="Nhập tên sản phẩm" value="<?php if(isset($_POST['tenSP'])) echo $_POST['tenSP']; else if(isset($tenSP16)) echo $tenSP16;?>"/>
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('tenSP',$errors)) echo "Tên sản phẩm không được bỏ trống";?>
                            </span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <input id="trongLuong" name="trongLuong" type="text" class="input1" placeholder="Nhập trọng lượng (kg)" value="<?php if(isset($_POST['trongLuong'])) echo $_POST['trongLuong']; else if(isset($trongLuong16)) echo $trongLuong16;?>"/>
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('trongLuong',$errors)) echo "Nhập trọng lượng";?>
                            </span>
                            <script>
                                var trongluong = document.getElementById('trongLuong');
                                trongluong.onchange = function(){
                                    var can;
                                    can = trongluong.value;
                                    if(can>0.5){
                                        var tam;
                                        tam = can/0.5;
                                        tam = tam.toFixed(0);
                                        var phiShipThem;
                                        phiShipThem = tam*2500;
                                        var phiship = document.getElementById('phiShip');
                                        var x = phiship.value;
                                        phiship.value = x*1 + phiShipThem;
                                    }
                                }
                            </script>
                        </td>
                        <td>
                            <input name="soLuong" type="text" class="input1" placeholder="Nhập số lượng sản phẩm" value="<?php if(isset($_POST['soLuong'])) echo $_POST['soLuong']; else if(isset($soLuong16)) echo $soLuong16;?>"/>
                            <span class="loi">
                                <?php if(isset($errors)&&in_array('soLuong',$errors)) echo "Nhập số lượng";?>
                            </span>
                        </td>
                    </tr>
                </table>
                </div>
                
                &emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="submit" name="SuaDon" value="Sửa đơn" style="width: 80px; height: 35px; background-color: deepskyblue"/> &emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="submit" name="Thoat" value="Thoát" style="width: 80px; height: 35px; background-color: deepskyblue"/> 
                <script>
                    function tao_moi(){
                        window.location.reload('http://localhost:84/practise/php/index_staff.php?xem=11');
                    }
                </script>
                <?php
                    if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
                        if(isset($_POST['SuaDon'])){
                            if(empty($errors)){
                                $result15 = mysqli_query($con,"update donhang set maDH = '".$_POST['maDonHang']."',sdtKhach='".$_POST['sdt']."',tinh='".$t1['tenTinh']."',huyen='".$huyen11[0]."',
                                diaChi='".$_POST['diaChi']."',DCLayHang='".$_POST['DCLayHang']."',
                                TGMuonLay='".$_POST['DKLayHang78']."',tenSP='".$_POST['tenSP']."',soLuong='".$_POST['soLuong']."',phiShip='".$_POST['phiShip']."',nguoiTraTien='".$_POST['NguoiChiuShip']."',
                                tienThuHo='".$_POST['tienThuHo']."',giaTriHang='".$_POST['giaTriHang']."',tongTien='".$_POST['tongGiaTri']."',tinhLayHang='".$t2['tenTinh']."',trongLuong='".$_POST['trongLuong']."',TGgiao='".$_POST['TGGiao']."'") or die(mysqli_error($con));
                                if(mysqli_affected_rows($con)==1) echo '<br/><br/><p style="text-align: center;">Sửa đơn thành công!</p>';
                                //date_default_timezone_set('Asia/Ho_Chi_Minh');
                                
                            }
                        }
                        if(isset($_POST['Thoat'])){
                            header('location: index_staff.php?xem=12');
                        }
                    }
                ?>
                
        </div>        
        </form>
    </div>
</body>
