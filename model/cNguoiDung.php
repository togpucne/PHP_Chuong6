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
    
        $sqlUser = "SELECT * FROM taikhoan WHERE username = '$name' AND password = '$password' AND phanquyen = 'user'";
        $sqlAdmin = "SELECT * FROM taikhoan WHERE username = '$name' AND password = '$password' AND phanquyen = 'admin'";
    
        $resultUser = $conn->query($sqlUser);
        $resultAdmin = $conn->query($sqlAdmin);
    
        if($row = $resultUser->fetch_assoc()){
            setcookie('idkh', $row['iduser'], time() + (86400 * 30), "/");
            return true;
        } else if($row1 = $resultAdmin->fetch_assoc()){
            setcookie('idkh', $row1['iduser'], time() + (86400 * 30), "/");
            $_SESSION['admin'] = true;
            return true;
        } else {
            return false;
        }
    }
    
    

    public function cDangNhapAdmin($username, $password){
        $password = md5($password);
        $p = new cKetNoi();
        $conn = $p->ketNoi();
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' and password = '$password' and phanquyen = 'admin'";
        $result = $conn->query($sql);
        if($result){
            return 1;
        }
        return 0;

    }
    
}


?>