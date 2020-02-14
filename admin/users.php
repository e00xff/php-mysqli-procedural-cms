<?php include 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">

<div class="wrapper">

    <?php include 'includes/nav.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <?php
        $page = isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

        switch ($page) {
            case 'view-user';
                include "view-user.php";
                break;
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

    <?php include 'includes/footer.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>