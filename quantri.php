<?php 
     if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_SESSION['admin'])){
        echo'<div style="margin: 0 auto; width: 100%; max-width: 600px;">';
        include './view/dangnhap.php';



        echo '</div>';
      

    }
?>