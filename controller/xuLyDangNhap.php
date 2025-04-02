<?php

    if(!class_exists('cNguoiDung')){
        include './model/cNguoiDung.php';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);

        if (!empty($name) && !empty($password)) {
            $p = new cNguoiDung();
            $result = $p->cDangNhap($name, $password);

            if ($result) {
           
                
                $_SESSION['logIn'] = true;
                echo '<script>
                alert("Đăng nhập thành công!");
                window.location.href = "index.php?act=trangchu";
                </script>';
            } else {
                echo '<script>
                alert("Đăng nhập thất bại! Kiểm tra lại tài khoản hoặc mật khẩu.");
                window.location.href = "index.php?act=dangnhap";
                </script>';
            }
        } else {
            echo '<script>
            alert("Vui lòng nhập đủ thông tin đăng nhập!");
            window.location.href = "index.php?act=dangnhap";
            </script>';
        }
    }
?>
