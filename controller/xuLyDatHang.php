<?php
    if(!class_exists('cDatHang')){
        include './model/cDatHang.php';
    }    

    $p = new cDatHang();
    $ten = $_POST['ten'];
    $hodem = $_POST['hodem'];
    $diachi = $_POST['diachi'];
    $diachinhanhang = $_POST['diachinhanhang'];
    $dienthoai = $_POST['dienthoai'];
    if(empty($ten) || empty($hodem) || empty($diachi) || empty($diachinhanhang) || empty($dienthoai)){
        echo '
        <script>alert("Vui lòng nhập đầy đủ thông tin");
            history.back();
        </script>
        ';
        return;

    }

    $result = $p-> cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai);
    if(!$result){
        echo '
        <script>alert("Bạn chưa có tài khoản");
            history.back();
        </script>
        ';
        return;
        
    }else{
        echo '
        <script>alert("Lưu tài khoản thành công ");
           
        </script>
        ';
    }
    $idkh = $_COOKIE['idkh'];

    $result1 = $p->cDatHangNe();
    if(!$result1){
        echo '
        <script>alert("Lưu đặt hàng ko thành công");
            history.back();
        </script>
        ';
        return;
        
    }else{
        echo '
        <script>alert("Đặt hàng thành công");
            history.back();
        </script>
        ';
    }


    $result2 = $p->cDatHangChiTiet($result1, $idkh);
    if(!$result2){
        echo '
        <script>alert("Đặt hàng chi tiết không thành công");
            history.back();
        </script>
        ';
        return;
        
    }else{
        echo '
        <script>alert("Đặt hàng chi tiet thành công");
            history.back();
        </script>
        ';
    }






?>