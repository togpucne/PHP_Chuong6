<div class="inner-right">
    <?php
  
        echo '<center><h5>Danh Sách Sản Phẩm</h5></center>';

        if (!class_exists('cSanPham')) {
            include './model/cSanPham.php';
        }

        $p = new cSanPham();
        $result = $p->getDB();

        if (!$result) {
            echo '<p style="text-align:center;">Chưa có sản phẩm</p>';
        } else {
            echo '<div class="productTotal" style="display:flex; flex-wrap:wrap; gap: 11px;">';

            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                $result1 = $p->getDbOfType($iddm);

                if ($result1 && $result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        echo '<div class="product" style="width: 24%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; text-align:center;">';
                        echo '<a href="chitietsanpham.php?idsp='.$row['idsp'].'">';
                        echo '<img class="product-image" src="' . $row['hinh'] . '" style="width: 100%; object-fit: cover;">';
                        echo '<p class="product-name" style="font-size: 14px; font-weight: bold; margin: 5px 0;">' . $row['tensp'] . '</p>';
                        echo '<p class="product-discount" style="color: red; font-size: 12px;">Giá: ' . $row['giamgia'] . ' VNĐ</p>';
                        echo '<p class="product-price" style="color: #ccc; font-size: 13px;"> ' . $row['gia'] . ' VNĐ</p>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="text-align:center;">Không có sản phẩm nào.</p>';
                }
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product" style="width: 24%; border: 1px solid #ccc; border-radius: 5px; padding: 5px; text-align:center;">';
                        echo '<a href="chitietsanpham.php?idsp='.$row['idsp'].'">';
                        echo '<img class="product-image" src="' . $row['hinh'] . '" style="width: 100%; object-fit: cover;">';
                        echo '<p class="product-name" style="font-size: 14px; font-weight: bold; margin: 5px 0;">' . $row['tensp'] . '</p>';
                        echo '<p class="product-discount" style="color: red; font-size: 12px;">Giá: ' . $row['giamgia'] . ' VNĐ</p>';
                        echo '<p class="product-price" style="color: #ccc; font-size: 13px;"> ' . $row['gia'] . ' VNĐ</p>';
                        echo '</a>';
                        echo '</div>';
                    }
                }
            }

            echo '</div>'; 
        }
  
    ?>
</div>

</main>
