<?php 
    header("Location: ../../BizLand/index.php");
    unset($_SESSION['idong']);
    session_destroy();
?>