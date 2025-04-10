<?php 
    if(!class_exists('cNguoiDung')){
        include './model/cNguoiDung.php';
    }

    $p = new cNguoiDung();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        echo '
        <script>alert("Vui lòng nhập đầy đủ thông tin");
        // history.back();
        </script>
        ';
        return;
    }
    $result = $p->cDangNhapAdmin($username, $password);
    if($result){
        echo "
        <script>alert('Chào mừng bạn đến với admin');
        // window.location.href = 'admin.php?act=trangchuAdmin'
        </script>
        ";
    }else{
        echo '
        <script>alert("Bạn chưa có tài khoản admin");
        // history.back();
        </script>
        ';
    }

?>