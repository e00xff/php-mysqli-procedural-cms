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

    <?php include 'includes/footer.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>