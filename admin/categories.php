<?php include '../inc/db.php'; ?>
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
                <li class="breadcrumb-item active">Dashboard</li>
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
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">Add</button>
                            </div>
                        </div>
                    </form>
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
                                <button type="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
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
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>News</td>
                                        <td>news</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Health</td>
                                        <td>health</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Planet Earth</td>
                                        <td>planet-earth</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Strange News</td>
                                        <td>strange-news</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Space & Physics</td>
                                        <td>space-and-physics</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Animals</td>
                                        <td>animals</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>History</td>
                                        <td>history</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Tech</td>
                                        <td>tech</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Culture</td>
                                        <td>culture</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-xs btn-flat">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-4">
                    <form method="post" action="#" role="form">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat">Update</button>
                            </div>
                        </div>
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