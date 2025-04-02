<?php
    if(!class_exists('cNguoiDung')){
        include './model/cKetNoi.php';
    }
    class cSanPham{
        public function getDB(){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }


        public function getCongTy(){
            $p = new cKetNoi();
            $sql = "SELECT * FROM danhmuc";
            $conn = $p->ketNoi();
            $result = $conn->query($sql);
            if($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }

        public function getDbOfType($type){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham where iddm = '$type'"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }

        public function getDetailsProduct($idsp){
            $p = new cKetNoi();
            $conn = $p->ketNoi();
            $sql = "SELECT * FROM sanpham where idsp = '$idsp'"; 
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }


        }

 

        
    }

?>