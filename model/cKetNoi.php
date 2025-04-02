<?php
    class cKetNoi {
        public function ketNoi() {
            $host = "localhost";
            $user = "admin1"; 
            $pass = "admin1"; 
            $db   = "tmdt_db"; 
            $port = 3307;
           
    
            $conn = mysqli_connect($host, $user, $pass, $db, $port);
    
           
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            } 
            return $conn;
        }
    

        public function dongKetNoi($conn) {
            if ($conn) {
                mysqli_close($conn); 
            }
        }
    }
?>
