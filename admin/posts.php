<?php
include '../inc/db.php';
include 'inc/functions.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">

<div class="wrapper">

    <?php include 'inc/nav.php'; ?>
    <?php include 'inc/sidebar.php'; ?>

    <?php
        $source = isset($_GET['source']) ? $source = $_GET['source'] : $source = '';

        switch ($source) {
            case 'new-post';
                include "new-post.php";
                break;
            case 'edit-post';
                include "edit-post.php";
                break;
            default:
                include "view-posts.php";
                break;
        }
    ?>

    <?php include 'inc/footer.php'; ?>

</div>

<?php include 'inc/scripts.php'; ?>

</body>
</html>