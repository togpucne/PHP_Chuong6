<?php 
    if(!class_exists('cKetNoi')){
        include './model/cKetNoi.php';
    }
    class cGioHang{
        public function insertGioHang($idsp, $tensp, $gia, $giamgia, $soluong, $tongtien, $hinhanh, $idkh) {
            $p = new cKetNoi();
            $conn = $p->ketNoi();
        
            $check = "SELECT * FROM giohang WHERE idsp = '$idsp' AND idkh = '$idkh' AND trangthai = 0";
            $resultCheck = $conn->query($check);
        
            if ($resultCheck && $resultCheck->num_rows > 0) {
                $row = $resultCheck->fetch_assoc();
                $newSoLuong = $row['soluong'] + $soluong;
                $newTongTien = ($gia - $giamgia) * $newSoLuong;
        
                $update = "UPDATE giohang 
                           SET soluong = '$newSoLuong', tongtien = '$newTongTien' 
                           WHERE idsp = '$idsp' AND idkh = '$idkh' AND trangthai = 0";
        
                return $conn->query($update);
            } else {
                $sql = "INSERT INTO giohang (idsp, tensp, gia, giamgia, soluong, tongtien, hinhanh, trangthai, idkh)
                        VALUES ('$idsp', '$tensp', '$gia', '$giamgia', '$soluong', '$tongtien', '$hinhanh', 0, '$idkh')";
        
                return $conn->query($sql);
            }
        }
        

        public function getGioHang($idkh){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM giohang where idkh = '$idkh'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                return $result;
            }
            return false;
        }
    }
?>