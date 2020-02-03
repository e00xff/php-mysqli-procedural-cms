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
                    <li class="breadcrumb-item"><a href="view-posts.php">Posts</a></li>
                    <li class="breadcrumb-item active">View Posts</li>
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
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
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
                            <h3 class="card-title">Posts List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 60px;"><input type="checkbox"></th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th style="width: 200px;" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>John Smith</td>
                                    <td><a href="edit-post.php">Lorem ipsum dolor sit amet.</a></td>
                                    <td>News</td>
                                    <td>Published</td>
                                    <td><img src="https://via.placeholder.com/150x50" alt=""></td>
                                    <td>tag1, tag2</td>
                                    <td><a href="view-comments.php">0</a></td>
                                    <td>01/02/2020</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-xs btn-flat"><i class="far fa-eye"></i></a>
                                        <a href="edit-post.php" class="btn btn-primary btn-xs btn-flat"><i class="far fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs btn-flat"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="new-post.php" class="btn btn-success btn-sm btn-flat">New Post</a>
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