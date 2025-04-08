<?php 
   if (!class_exists('cDatHang')) {
    include './model/cDatHang.php';
}


$idsp = isset($_GET['idsp']) ? (int)$_GET['idsp'] : 0;
$soLuong = isset($_GET['soLuong']) ;

if ($soLuong > 0) {
    echo "<script>alert('Số lượng phải lớn hơn 0');</script>";
    exit;
}





$idkh = $cDatHang->cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai);


$iddh = $cDatHang->cDatHangNe($idkh);

if (!$iddh) {
    echo "<script>alert('Lỗi khi tạo đơn hàng');</script>";
    exit;
}

?>