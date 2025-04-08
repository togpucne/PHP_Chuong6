<div class="inner-right">
    <center><h5>Thông tin đặt hàng</h5></center>
    <?php 
        echo '<form action="index.php?act=&idsp='.$_GET['idsp'].'&soLuong='.$_POST['soLuong'].'" method="post" style="display: flex; flex-direction: column; gap: 10px; padding: 10px;">
            <label for="hodem">Họ & Đệm:</label>
            <input type="text" id="hodem" name="hodem" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập họ & đệm">

            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập tên">

            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ">

            <label for="diachinhanhang">Địa chỉ nhận hàng:</label>
            <input type="text" id="diachinhanhang" name="diachinhanhang" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập địa chỉ nhận hàng">

            <label for="dienthoai">Điện thoại:</label>
            <input type="tel" id="dienthoai" name="dienthoai" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Nhập số điện thoại">
            

            <input type="submit" value="Đặt hàng" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #ccc; cursor: pointer;">
        </form>';
    ?>
</div>
</main>