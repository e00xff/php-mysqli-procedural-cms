<?php
ob_start();
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

//if (isset($_SESSION['role'])) {
//    if ($_SESSION['role'] !== 'administrator') {
//        header('Location: ../login.php');
//    }
//}

require 'database.php';
require 'functions.php';
require 'helpers.php';
?>