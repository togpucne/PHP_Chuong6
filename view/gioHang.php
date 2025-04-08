<div class="inner-right">
    <center>
        <h5>Giỏ Hàng Của Bạn</h5>
    </center>
    <?php
    if (!class_exists('cGioHang')) {
        include './model/cGioHang.php';
    }
    $p = new cGioHang();
    $idkh = $_COOKIE['idkh'];
    if(!isset($idkh)){
        return;
    }
    $result = $p->getGioHang($idkh); 

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; border-collapse: collapse;">';
        echo '<tr style="background-color: #f2f2f2;">
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                  </tr>';

        $stt = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $tongtien = ($row['gia'] - $row['giamgia']) * $row['soluong'];
            echo '<tr>';
            echo '<td>' . $stt++ . '</td>';
            echo '<td><img src="' . $row['hinhanh'] . '" alt="' . $row['tensp'] . '" width="60"></td>';
            echo '<td>' . $row['tensp'] . '</td>';
            echo '<td>' . number_format($row['gia'], 0, ',', '.') . ' VND</td>';
            echo '<td>' . number_format($row['giamgia'], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $row['soluong'] . '</td>';
            echo '<td>' . number_format($tongtien, 0, ',', '.') . ' VND</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Giỏ hàng của bạn đang trống.</p>';
    }
    ?>
</div>

</main>