<?php
if (!class_exists('cKetNoi')) {
    include './model/cKetNoi.php';
}
class cDatHang
{
    public function cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai)
    {
        $idkh = $_COOKIE['idkh'];
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        $check = $conn->query("SELECT * FROM khachhang WHERE idkh = '$idkh'");
        $sql = '';

        if ($check->num_rows > 0) {
            $sql = "UPDATE khachhang 
                SET ten = '$ten', hodem = '$hodem', diachi = '$diachi', 
                    diachinhanhang = '$diachinhanhang', dienthoai = '$dienthoai' 
                WHERE idkh = '$idkh'";
               

        } else {
            $sql = "INSERT INTO khachhang (iduser, ten, hodem, diachi, diachinhanhang, dienthoai) 
                VALUES ('$idkh', '$ten', '$hodem', '$diachi', '$diachinhanhang', '$dienthoai')";
        }
        $result = $conn->query($sql);
        if($result){
            return true;
        }
        return false;
    }


    public function cDatHangNe()
    {


        $p = new cKetNoi();
        $conn = $p->ketNoi();

        $trangthai = 1;
        $idkh = $_COOKIE['idkh'];
        $today = date('Y-m-d');


        $sql = "INSERT INTO dathang (iduser, ngaydathang, trangthai) VALUES ('$idkh' ,'$today', '$trangthai')";
        $result = $conn->query($sql);


        if ($result) {
            $iddh = $conn->insert_id; 
            return $iddh; 
           
        } else {
            return false;
        }
    }


    public function cDatHangChiTiet($iddh, $idkh)
    {
        $p = new cKetNoi();
        $conn = $p->ketNoi();
    
        $sql = "SELECT idsp, soluong, gia, giamgia FROM giohang WHERE idkh = $idkh";
        $result = $conn->query($sql);
    
        $inserted = false;
    
        while ($row = $result->fetch_assoc()) {
            $idsp = $row['idsp'];
            $soluong = $row['soluong'];
            $dongia = $row['gia'];
            $giamgia = $row['giamgia'];
            $tongtien = ($dongia - $giamgia) * $soluong;
    
            $sqlInsert = "INSERT INTO dathang_chitiet (iddh, idsp, soluong, dongia, giamgia, tongtien)
                          VALUES ($iddh, $idsp, $soluong, $dongia, $giamgia, $tongtien)";
            
            $insertResult = $conn->query($sqlInsert);
            $inserted = true;
        }
        if ($inserted) {
            $updateTrangThai = "UPDATE giohang SET trangthai = 1 WHERE idkh = $idkh AND trangthai = 0";
            $conn->query($updateTrangThai);
        }
    
        return $inserted;
    }
    
    
}
?>