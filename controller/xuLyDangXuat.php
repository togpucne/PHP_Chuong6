<?php
    session_unset();
    session_destroy();
    setcookie('idkh', $row['iduser'], time() - 3600, "/");

    header("Location: index.php");
    exit();

?>