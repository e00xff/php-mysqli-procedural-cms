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
                            <li class="breadcrumb-item"><a href="view-users.php">Users</a></li>
                            <li class="breadcrumb-item active">View Users</li>
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
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                            <option selected disabled>- Bulk Options -</option>
                                            <option value="granted">Granted</option>
                                            <option value="denied">Denied</option>
                                            <option value="delete">Delete</option>
                                            <option value="clone">Clone</option>
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
                                <h3 class="card-title">Users List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-sm projects mb-0">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>E-Mail</th>
                                        <th>Posts</th>
                                        <th>Access</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/user2-160x160.jpg"></td>
                                        <td>John</td>
                                        <td>Smith</td>
                                        <td>john@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-success">Granted</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="edit-user.php" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td><img alt="Avatar" class="table-avatar" src="dist/img/user4-128x128.jpg"></td>
                                        <td>Ann</td>
                                        <td>Miller</td>
                                        <td>ann@gmail.com</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-xs btn-flat">View</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Approve</a>
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Deny</a>
                                            <a href="edit-profile.html" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="new-user.php" class="btn btn-success btn-sm btn-flat">New User</a>
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