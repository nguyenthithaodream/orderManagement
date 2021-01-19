<?php              
                                        include('./ketNoi.php');
                                        $result2 = mysqli_query($con,"select * from huyen where maTinh = '".$_POST['matinh']."'") or die(mysqli_error($con));
                                        
                                        while($huyen = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                            echo '<option value="'.$huyen['maHuyen'].'">'.$huyen['tenHuyen'].'</option>';
                                        }
                                    
                                ?>
