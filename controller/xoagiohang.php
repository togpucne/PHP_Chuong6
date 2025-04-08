<div class="inner-right">
                    <?php
                        if(!class_exists('cGioHang')){
                            include './model/cGioHang.php';
                        }

                        $p = new cGioHang();
                        $idsp= $_GET['idsp'];
                        if(!empty($idsp)){
                            $result = $p->xoaGioHang($idsp);
                            if($result){
                                echo "
                                <script>alert('Xóa Thành Công');
                                history.back();
                                
                                
                                </script>
                                ";
                            }else{
                                echo "
                                <script>alert('Xóa Không Thành Công');
                                 history.back();
                                </script>
                                ";
                            }

                        }else{
                            echo "
                            <script>alert('Chưa có sản phẩm để xóa');
                            window.location.href = 'index.php';
                            </script>
                            ";
                        }
                    
                    
                    
                    ?>
                    
                </div>
            </main>