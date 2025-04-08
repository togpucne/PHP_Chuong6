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
    if (!isset($idkh)) {
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
                    <th>Hành động</th>
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
            $id_input = 'qty_' . $row['idsp'];
            echo '<td><input type="number" id="' . $id_input . '" name="soluong[' . $row['idsp'] . ']" value="' . $row['soluong'] . '" min="1" style="width:60px; padding:3px;"></td>';

            echo '<td>' . number_format($tongtien, 0, ',', '.') . ' VND</td>';
          
            echo '<td>
                    <a href="#" onclick="capNhatSoLuong(' . $row['idsp'] . ')" class="btn btn-warning" style="text-decoration:none;">Cập nhật</a>
                    <a href="index.php?act=xoagiohang&idsp=' . $row['idsp'] . '" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc muốn xóa sản phẩm này không?\')">Xóa</a>
                </td>';

            echo '</tr>';
        }
        echo '</table>';
        echo '<center style="margin-top: 30px"><a href="index.php?act=thongtindathang" class="btn btn-success" )">Đặt hàng</a></center>';
    } else {
        echo '<p>Giỏ hàng của bạn đang trống.</p>';
    }
    ?>
</div>

</main>
<script>
    function capNhatSoLuong(idsp) {
        const input = document.getElementById('qty_' + idsp);
        const soluong = input.value;

        if (confirm("Bạn có chắc muốn cập nhật sản phẩm này không?")) {
            window.location.href = `index.php?act=capnhat&idsp=${idsp}&soluong=${soluong}`;
        }
    }
</script>
