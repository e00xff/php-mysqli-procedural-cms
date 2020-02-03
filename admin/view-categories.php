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
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-8">
                        <form method="post" action="#" role="form">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Add Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="addCategory" class="btn btn-primary btn-sm btn-flat">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php insertCategories(); ?>

                        <form method="post" action="#" role="form">
                            <div class="card card-danger">
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <select name="bulk" id="bulk"
                                                    class="form-control custom-file-label custom-select">
                                                <option selected disabled>- Bulk Options -</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">Apply
                                    </button>
                                </div>
                            </div>
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Category List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover table-sm mb-0">
                                        <thead>
                                        <tr>
                                            <th style="width: 60px;"><input type="checkbox"></th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th style="width: 200px;" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php getAllCategories(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>

                        <?php deleteCategories(); ?>
                    </div>
                    <div class="col-lg-4 col-4">
                        <?php editCategory(); ?>
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