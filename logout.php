<?php
ob_start();
include 'header.php';
session_destroy();
session_unset();
header('location:index?logout=true');
?>
