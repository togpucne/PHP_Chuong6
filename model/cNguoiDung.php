<?php
if(!class_exists('cKetNoi')){
    include './model/cKetNoi.php';
}
class cNguoiDung
{
    
    public function cDangKy($name, $password)
    {
        $password = md5($password);
        $sql = "INSERT INTO taikhoan(username, password, phanquyen) VALUES('$name', '$password', 'user')";
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        $result = $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }



    public function cDangNhap($name, $password){
        $password = md5($password); 
        $p = new cKetNoi();
        $conn = $p->ketNoi();
    
        $sql = "SELECT * FROM taikhoan WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();
        $result = $stmt->get_result();
    
        
        if ($row = $result->fetch_assoc()) {
         
            setcookie('idkh', $row['iduser'], time() + (86400 * 30), "/");
            return true;
        } else {
            return false;
        }
    }
    
    
}


?>