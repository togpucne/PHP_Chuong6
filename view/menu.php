<main class="inner-main">
    <div class="inner-left">
        <center>
            <h5>Menu</h5>
        </center>
        <div class="inner-nav">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <?php
                if (isset($_SESSION['logOn'])) {
                    if (isset($_SESSION['logIn'])) {
                        echo '<li><a href="index.php?act=xuLyDangXuat">Đăng Xuất</a></li>';
                        echo '<li><a href="index.php?act=gioHang">Giỏ Hàng</a></li>';


                        if (!class_exists('cSanPham')) {
                            include './model/cSanPham.php';
                        }
                        $p = new cSanPham();
                        $result = $p->getCongTy();
                        if (!$result) {
                            echo 'Chưa có dữ liệu';
                            return;
                        }
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li><a href="index.php?iddm=' . $row['iddm'] . '">' . $row['tendanhmuc'] . '</a></li>';
                            }
                        }
                    } else {

                        echo '<li><a href="index.php?act=dangky">Đăng Ký</a></li>
                                        <li><a href="index.php?act=dangnhap">Đăng Nhập</a></li>';
                    }
                } else if (isset($_SESSION['logIn'])) {
                    echo '<li><a href="index.php?act=xuLyDangXuat">Đăng Xuất</a></li>';

                    echo '<li><a href="index.php?act=gioHang">Giỏ Hàng</a></li>';

                    if (!class_exists('cSanPham')) {
                        include './model/cSanPham.php';
                    }
                    echo '<center><h5>Công ty</h5></center>';
                    $p = new cSanPham();
                    $result = $p->getCongTy();
                    if (!$result) {
                        echo 'Chưa có dữ liệu';
                        return;
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li><a href="index.php?iddm=' . $row['iddm'] . '">' . $row['tendanhmuc'] . '</a></li>';
                        }
                    }
                } else {
                    echo '<li><a href="index.php?act=dangky">Đăng Ký</a></li>
                            <li><a href="index.php?act=dangnhap">Đăng Nhập</a></li>';
                }

                ?>
            </ul>
        </div>
    </div>