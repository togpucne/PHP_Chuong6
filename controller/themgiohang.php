<div class="inner-right">
    <?php
    if (!class_exists('cGioHang')) {
        include './model/cGioHang.php';
    }
    $soLuong = (int)($_POST['soLuong']);

    if ($soLuong <= 0) {
        echo "<script>alert('Số lượng phải lớn hơn 0');</script>";
        exit;
    } else {
        $p = new cGioHang();
        $idsp = $_GET['idsp'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $giamgia = $_POST['giamgia'];
        $soluong = $_POST['soLuong'];
        $hinh = $_POST['hinh'];
        $tongtien = ($giamgia - $gia) * $soluong;
        $idkh = $_COOKIE['idkh'];

        if (empty($_GET['idsp']) || empty($_POST['tensp']) || empty($_POST['gia']) || empty($_POST['giamgia']) || empty($_POST['soLuong']) || empty($_POST['hinh'])) {
            echo "<script>
            alert('Bạn cần điền đủ thông tin sản phẩm');
            history.back();
        </script>";
        } else {




            $result = $p->insertGioHang($idsp, $tensp, $gia, $giamgia, $soluong, $tongtien, $hinh,  $idkh);
            if ($result) {
                echo "<script>
                alert('Thêm giỏ hàng thành công');
                window.location.href = 'index.php';
            </script>";
            } else {
                echo "<script>
                alert('Thêm không  thành công');
                history.back();
            </script>";
            }
        }
    }










    ?>


</div>
</main>