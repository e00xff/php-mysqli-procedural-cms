<?php
ob_start();
session_start();
require 'helpers.php';
require 'database.php';

// Language
if (isset($_GET['lang']) && !empty($_GET['lang'])):
    $_SESSION['lang'] = $_GET['lang'];

    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']):
        echo '<script type="text/javascript">location.reload();</script>';
    endif;

    if (isset($_SESSION['lang'])):
        include 'includes/languages/'.$_SESSION['lang'].'.php';
    else:
        include 'includes/languages/en.php';
    endif;
endif;

?>