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
                        <h1 class="m-0 text-dark">Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="view-slides.php">Slider</a></li>
                            <li class="breadcrumb-item active">View Photo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Slider Photos List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-sm projects mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 60px;"><input type="checkbox" name="" id=""></th>
                                        <th>Order</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Published</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>1</td>
                                        <td><img alt="Avatar" src="https://via.placeholder.com/150x50"></td>
                                        <td>Lorem ipsum dolor sit.</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                        <td><span class="badge badge-success">Yes</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="edit-slide.php" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="new-slide.php" class="btn btn-success btn-sm btn-flat">New Photo</a>
                            </div>
                        </div>

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