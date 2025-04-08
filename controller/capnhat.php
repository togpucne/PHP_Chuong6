

<div class="inner-right">
                    <?php
                        if(!class_exists('cGioHang')){
                            include './model/cGioHang.php';
                        }

                        $p = new cGioHang();
                        $idsp= $_GET['idsp'];
                        $soluong = $_GET['soluong'];
                        if($soluong <= 0){
                            echo '<script>alert("Số lượng phải lớn hơn 0");
                            history.back();
                        </script>';
                            return ;
                        }
                        $tongtien =0;
                        $gia  = 0;
                        $giamgia = 0;
                 

                        $result1 = $p->getGioHang($idsp);
                        if($result1){
                            while($row= $result1->fetch_assoc()){
                                $gia = $row['gia'];
                                $giamgia = $row['giamgia'];
                                

                            }
                        }



                        $result = $p->updateGioHang($idsp, $soluong, $tongtien, $gia, $giamgia);
                        if($result){
                            echo '<script>alert("Cập nhật thành công");
                                history.back();
                            </script>';
                        }else{
                            echo '<script>alert("Cập nhật thất bại");
                            history.back();
                        </script>'; 
                        }


                        
                        
                    
                    
                    
                    ?>
                    
                </div>
            </main>