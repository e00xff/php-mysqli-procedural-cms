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
        $page = isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

        switch ($page) {
            case 'new-user';
                include "new-user.php";
                break;
            case 'edit-user';
                include "edit-user.php";
                break;
            default:
                include "view-users.php";
                break;
        }
    ?>

    <?php include 'inc/footer.php'; ?>

</div>

<?php include 'inc/scripts.php'; ?>

</body>
</html>