<?php

    if(!class_exists('cNguoiDung')){
        include './model/cNguoiDung.php';
    }

    $p = new cNguoiDung();
    $name = $_POST['name'];
    $password = $_POST['password'];
    if(!empty($name) && !empty($password)){
        $result = $p->cDangKy($name, $password);
        if($result){
            $_SESSION['logOn']=true;
            echo '<script>
            alert("Đăng ký thành công");
            window.location.href = "index.php?act=dangnhap";
            
            </script>';
        }else{
            echo '<script>
            alert("Đăng ký thất bại");
            window.location.href = "index.php?act=dangky";
            
            </script>';
        }

    }else{
        echo '<script>
            alert("Vui lòng điền đủ dữ liệu!");
            window.location.href = "index.php?act=dangky";
            
            </script>';
    }



?>