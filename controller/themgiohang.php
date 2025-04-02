<?php
if (!class_exists('cDatHang')) {
    include './model/cDatHang.php';
}


$idsp = isset($_GET['idsp']) ? (int)$_GET['idsp'] : 0;
$soLuong = isset($_GET['soLuong']) ;

if ($soLuong <= 0) {
    echo "<script>alert('Số lượng phải lớn hơn 0');</script>";
    exit;
}



$cDatHang = new cDatHang();
$ten = $_POST['ten'];
$diachi = $_POST['diachi'];
$hodem = $_POST['hodem'];
$diachinhanhang = $_POST['diachinhanhang'];
$dienthoai = $_POST['dienthoai'];
if(empty($ten) || empty($diachi) || empty($hodem) || empty($diachinhanhang) || empty($dienthoai)){
    echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
    exit;
}

$idkh = $cDatHang->cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai);
if(!$idkh){
    echo "<script>alert('Thêm tài khoản thất bại');</script>";
    exit;
}





$iddh = $cDatHang->cDatHangNe($idkh);

if (!$iddh) {
    echo "<script>alert('Lỗi khi tạo đơn hàng');</script>";
    exit;
}


$result2 = $cDatHang->cDatHangChiTiet($idsp, $soLuong, $iddh);

if ($result2) {
    echo "<script>alert('Đặt hàng thành công');
    window.location.href= 'index.php?act=trangchu';
    </script>";
   
} else {
    echo "<script>alert('Lỗi khi thêm chi tiết đơn hàng');</script>";
}
?>
