<?php 
    if(!class_exists('cKetNoi')){
        include './model/cKetNoi.php';
    }
    class cGioHang{
        public function insertGioHang($idsp, $tensp, $gia, $giamgia, $soluong, $tongtien, $hinhanh, $idkh ){
                    $p = new cKetNoi();
                    $conn = $p->ketNoi();
                    $sql = "INSERT INTO giohang (idsp, tensp, gia, giamgia, soluong, tongtien, hinhanh, trangthai, idkh)
        VALUES ('$idsp', '$tensp', '$gia', '$giamgia', '$soluong', '$tongtien', '$hinhanh', 0, '$idkh')";
                    $result = $conn->query($sql);
                    if($result){
                        return true;
                    }else{
                        return false;
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