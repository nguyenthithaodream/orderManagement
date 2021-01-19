<div class="content">
                <?php
          		   if(isset($_GET['xem'])) $tam =$_GET['xem'];
                    else $tam = "";
                    include('./ketNoi.php');
                    
                    $result5 = mysqli_query($con,"SELECT phanQuyen from taikhoan where tenTK = '".$_SESSION['ten']."'") or die(mysqli_error($con));
                    if(mysqli_num_rows($result5)==1)
                        list($a)= mysqli_fetch_array($result5,MYSQLI_NUM);
                    switch($tam){
                        case 1:
                            
                        case 2:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==2){ include('./phanCongNhanHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                            
                        case 3:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==3){ include('./phanCongGiaoHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                            
                        case 4:
                            
                        case 5:
                        case 6:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==6){ include('./DSQLDonGiaoHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 7:
                        case 8:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==8){ include('./theoDoiTienDoiSoat.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} //chỉ cho khách hàng xem, ql và nhân viên xem dưới file khác
                        }
                        case 9:
                        case 10:
                        case 11:{
                            if( ($a=='Khách hàng'||$a=='Quản lý'||$a=='Nhân viên')&&$tam==11){ include('./taoMoiDonHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 12:{
                            if( ($a=='Khách hàng'||$a=='Quản lý'||$a=='Nhân viên')&&$tam==12){ include('./danhSachDonHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 13:{
                            
                            if( ($a=='Khách hàng'||$a=='Quản lý'||$a=='Nhân viên')&&$tam==13){ 
                                    include('./suaDonHang.php'); break;
                            } 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 14:{
                            if( ($a=='Khách hàng'||$a=='Quản lý'||$a=='Nhân viên')&&$tam==14){ include('./xoaDonHang.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 15:
                        case 16:
                        case 17:
                        case 18:{
                            if( ($a=='Quản trị viên')&&$tam==18){ include('./taoMoiTK.php'); break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                            }
                        case 19:{
                            if( ($a=='Quản trị viên')&&$tam==19){ include('./danhSachTaiKhoan.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 20:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==20){ include('./baoCao.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 21:{
                            if(($a=='Quản trị viên') && ($tam == 21)) { include('./suaTaiKhoan.php');break;}// về trang sửa tài khoản
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 22:{
                            if(($a=='Quản trị viên')&& ($tam == 22)) { include('./xoaTaiKhoan.php');break;}// về trang sửa tài khoản
                            else{include('./thongBaoQuyen.php');break;}
                        }
                        case 23:{
                            if( ($a=='Quản lý'||$a=='Nhân viên')&&$tam==23){ include('./chiTietDonHang.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 24:{
                            if( ($a=='Khách hàng')&&$tam==24){ include('./thongBaoDKTG.php'); break;} 
                        }
                        case 25:{
                            if(($a=='Quản lý'||$a=='Nhân viên')&&$tam==25){ include('./chiTietPhanCong.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 26:{
                            if(($a=='Quản lý'||$a=='Nhân viên')&&$tam==26){ include('./chiTietPhanCong_DonHang.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 27:{
                            if(($a=='Quản lý'||$a=='Nhân viên')&&$tam==27){ include('./chiTietPhanCongNhanHang.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 28:{
                            if(($a=='Quản lý'||$a=='Nhân viên')&&$tam==28){ include('./chiTietPhanCongNhanHang_DonHang.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 29:{
                            if(($a=='Quản lý'||$a=='Nhân viên')&&$tam==29){ include('./thongBaoNhapMaDHCapNhat.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} 
                        }
                        case 30:{
                            if(($a=='Quản lý'||$a=='Nhân viên'||$a='Shipper')&&$tam==30){ include('./capNhatDonHang_Shipper.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} //bỏ nhân viên
                        }
                        case 31:{
                            if(($a=='Quản lý'||$a=='Nhân viên'||$a='Shipper')&&$tam==31){ include('./chiTietCapNhatDonHang_Shipper.php');break;} 
                            else{include('./thongBaoQuyen.php');break;} //bỏ nhân viên
                        }
                        default: include('./home.php');
                    }
                ?>
            </div>
