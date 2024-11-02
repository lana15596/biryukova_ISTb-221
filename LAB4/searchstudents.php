<?php
session_start();
if (!empty($_SESSION['login']))
    header("Location: logic.php");
else {
    header('Location: auth.php');
}
?>
