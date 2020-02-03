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
                            <li class="breadcrumb-item active">Comments</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12">

                        <form method="post" action="#" role="form">
                            <div class="card card-danger">
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                                <option selected disabled>- Bulk Options -</option>
                                                <option value="approve">Approve</option>
                                                <option value="unapprove">Unapprove</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
                                </div>
                            </div>

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Post Comments</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover table-sm projects mb-0">
                                        <thead>
                                        <tr>
                                            <th style="width: 60px;"><input type="checkbox"></th>
                                            <th>Author</th>
                                            <th>Comment</th>
                                            <th>E-Mail</th>
                                            <th>Status</th>
                                            <th>In Response To</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>John Smith</td>
                                            <td>Hello from Georgia</td>
                                            <td>john@gmail.com</td>
                                            <td><span class="badge badge-danger">unapproved</span></td>
                                            <td>post number 1</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success btn-xs btn-flat">Approve</a>
                                                <a href="#" class="btn btn-primary btn-xs btn-flat">Unapprove</a>
                                                <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                                <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <nav aria-label="...">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </form>

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