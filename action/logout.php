<?php 
session_start();

unset($_SESSION['cid']);
session_destroy();
header('location:../login.html');
?>