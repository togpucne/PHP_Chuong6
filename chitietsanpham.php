<?php
session_start();
include './view/header.php';
include './view/menu.php';
?>
<div class="inner-right" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <center><h4>Chi tiết sản phẩm</h4></center>
    <?php
    if (!class_exists('cSanPham')) {
        include './model/cSanPham.php';
    }
    $p = new cSanPham();
    if (isset($_GET['idsp'])) {
        $idsp = $_GET['idsp'];
        $result = $p->getDetailsProduct($idsp);
        if (!$result) {
            echo 'Chưa có sản phẩm';
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<form action="index.php?act=thongtindathang&idsp='.$row['idsp'].'" method="post">';
                echo '<div class="product-info">';
                echo '<div class="inner-left">';
                echo '<img src="' . $row['hinh'] . '" alt="' . $row['tensp'] . '">';
                echo '</div>';
                echo '<div class="inner-right">';
                echo '<p class="product-title">' . $row['tensp'] . '</p>';
                echo '<p class="product-cost">Giá: ' . $row['giamgia'] . ' VND</p>';
                echo '<p class="product-discount"> ' . $row['gia'] . ' VNĐ</p>';
                echo '<p class="product-desc">' . $row['mota'] . '</p>';
                echo ' <label for="soLuong">Số lượng: </label> &emsp;';
                echo '<input type="number" id="soLuong" value="1" name="soLuong" placeholder="1" style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;"> </br> </br>';

                if (isset($_SESSION['logIn'])) {
                    echo '<input type="submit" value="Thêm vào giỏ hàng" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">';
                } else {
                    echo '<button type="button" onclick="requireLogin()" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">Thêm vào giỏ hàng</button>';
                }

                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
        }
    }
    ?>
</div>

<script>
function requireLogin() {
    alert("Vui lòng đăng nhập để mua hàng!");
    window.location.href = "index.php?act=dangnhap";
}
</script>

</main>
<?php include './view/footer.php'; ?>
