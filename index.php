<?php
    session_start();
    include './view/header.php';
    include './view/menu.php';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'dangky':
                include './view/dangky.php';
                break;
            case 'dangnhap':
                include './view/dangnhap.php';
                break;
            case 'trangchu':
                    include './view/trangchu.php';
                    break;
            case 'xuLyDangKy':
                    include './controller/xuLyDangKy.php';
                    break;
            case 'xuLyDangNhap':
                        include './controller/xuLyDangNhap.php';
                        break;
            case 'xuLyDangXuat':
                            include './controller/xuLyDangXuat.php';
                            break;
            case 'xoagiohang':
                include './controller/xoagiohang.php';
                break;
            case 'thongtindathang':
                    include './view/thongtindathang.php';
                    break;
            case 'xuLyDatHang':
                        include './controller/xuLyDatHang.php';
                        break;

            case 'capnhat':
                    include './controller/capnhat.php';
                    break;
            case 'suagiohang':
                    include './controller/suagiohang.php';
                    break;
        
            case 'themgiohang':
                        include './controller/themgiohang.php';
                        break;
            case 'gioHang':
                include './view/gioHang.php';
                break;  
            default:
                include './view/trangchu.php';
                break;
        }
        }else{
            include './view/trangchu.php';
        }
       
    
    include './view/footer.php';



?>
