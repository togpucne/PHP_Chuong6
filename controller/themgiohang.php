<div class="inner-right">
    <?php
    $soLuong = (int)($_POST['soLuong']);

    if ($soLuong <= 0) {
        echo "<script>alert('Số lượng phải lớn hơn 0');</script>";
        exit;
    }else{
        echo "<script>
        alert('Thêm giỏ hàng thành công');
        window.location.href = 'index.php';
    </script>";
    
    }

    ?>


</div>
</main>