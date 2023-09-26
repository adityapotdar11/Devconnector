<?php
session_start();
if (empty($_SESSION["user_id"])) {
    header("Location: http://localhost/xeni-learning/second/login.php");
    exit;
}
?>