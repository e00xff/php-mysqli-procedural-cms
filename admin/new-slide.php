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

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">New Photo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        ...
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include 'inc/footer.php'; ?>

</div>

<?php include 'inc/scripts.php'; ?>

</body>
</html>