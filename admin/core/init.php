<?php
ob_start();
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
}

require 'database.php';
require 'functions.php';
require 'helpers.php';
?>