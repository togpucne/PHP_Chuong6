<?php
class cDatHang
{
    public function cTaiKhoan($ten, $hodem, $diachi, $diachinhanhang, $dienthoai) {
        $sql = "INSERT INTO khachhang1 (ten, hodem, diachi, diachinhanhang, dienthoai) VALUES(?, ?, ?, ?, ?)";
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $ten, $hodem, $diachi, $diachinhanhang, $dienthoai);
        $result = $stmt->execute();
    
        if ($result) {
            $idkh = $conn->insert_id; 
            setcookie("idkh", $idkh, time() + 3600, "/"); 
            return $idkh;
        } else {
            return false;
        }
    }
    
    
    public function cDatHangNe($idkh ) {
     
    
        $p = new cKetNoi();
        $conn = $p->ketNoi();
    
        $trangthai = 0; 
    
        $sql = "INSERT INTO dathang (idkh, ngaydathang, trangthai) VALUES (?, NOW(), ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $idkh, $trangthai);
    
        if ($stmt->execute()) {
            return $conn->insert_id;
        } else {
            return false;
        }
    }
    
    
    public function cDatHangChiTiet($idsp, $soLuong, $iddh) {
        $p = new cKetNoi();
        $conn = $p->ketNoi();
    
        $idsp = (int)$idsp; 
        $soLuong = (int)$soLuong;
        $iddh = (int)$iddh;
    
        $sql = "SELECT gia, COALESCE(giamgia, 0.00) AS giamgia FROM sanpham WHERE idsp = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idsp);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dongia = $row['gia']; 
            $giamgia = $row['giamgia']; 
            $insert = "INSERT INTO dathang_chitiet (iddh, idsp, soluong, dongia, giamgia) VALUES (?, ?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($insert);
            $stmtInsert->bind_param("iiidd", $iddh, $idsp, $soLuong, $dongia, $giamgia);
    
            if ($stmtInsert->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
        }
        return false;
    }
    
}
    

?>
