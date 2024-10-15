<?php
    require_once './database/connect.php';
    $_SESSION['user_id'] = null;
    header('Location: ./main.php');
?>