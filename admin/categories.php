<?php include 'inc/connection.php'; ?>
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
                                <button type="submit" name="addCategory" class="btn btn-primary btn-sm btn-flat">Add</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['addCategory'])) {

                        $categoryTitle = $_POST['title'];
                        $categorySlug = $_POST['slug'];

                        if (empty($categoryTitle) && empty($categorySlug)) {
                            echo "<p>This field should not be empty</p>";
                        } else {
                            $addCategoryQuery = "INSERT INTO categories(title, slug) VALUES('$categoryTitle','$categorySlug')";
                            $addCategoryResult = mysqli_query($connection, $addCategoryQuery);

                            if (!$addCategoryResult) {
                                die('Query Failed: ' . mysqli_error($connection));
                            }
                        }

                    }
                    ?>

                    <form method="post" action="#" role="form">
                        <div class="card card-danger">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                            <option selected disabled>- Bulk Options -</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
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
                                        <th><input type="checkbox"></th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th style="width: 200px;" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $categoryQuery = "SELECT * FROM categories";
                                    $categoryResult = mysqli_query($connection, $categoryQuery);
                                    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?php echo $categoryRow['title']; ?></td>
                                            <td><?php echo $categoryRow['slug']; ?></td>
                                            <td class="text-center">
                                                <a href="categories.php?edit=<?php echo $categoryRow['id']; ?>" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                                <a href="categories.php?delete=<?php echo $categoryRow['id']; ?>" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['delete'])) {
                        $categoryID = $_GET['delete'];

                        $deleteQuery = "DELETE FROM categories WHERE id = {$categoryID}";
                        $deleteResult = mysqli_query($connection, $deleteQuery);

                        if ($deleteResult) {
                            header("Location: categories.php");
                        } else {
                            die('Query Failed: ' . mysqli_error($connection));
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-4 col-4">
                    <?php
                    if (isset($_GET['edit'])) {
                        $categoryID = $_GET['edit'];

                        $selectQuery = "SELECT * FROM categories WHERE id = {$categoryID}";
                        $selectResult = mysqli_query($connection, $selectQuery);
                        $selectRow = mysqli_fetch_assoc($selectResult);
                        ?>
                        <form method="post" action="#" role="form">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" name="title" value="<?php if(isset($selectRow['title'])) { echo $selectRow['title']; } ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="updateCategory" class="btn btn-primary btn-sm btn-flat">Update</button>
                                </div>
                            </div>
                        </form>
                        <?php

                        if (isset($_POST['updateCategory'])) {
                            $title = $_POST['title'];

                            $updateQuery = "UPDATE categories SET title='$title' ";
                            $updateQuery .= "WHERE id={$categoryID}";
                            $updateResult = mysqli_query($connection, $updateQuery);

                            if (!$updateResult) {
                                die('Query Failed: ' . mysqli_error($connection));
                            } else {
                                header("Location: categories.php");
                            }
                        }

                    }
                    ?>

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