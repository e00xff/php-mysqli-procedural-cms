<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CMS - Content Management System</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">

<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 text-sm">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.html" class="nav-link">Public</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../sign-in.html">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-danger elevation-4">
      <a href="javascript:void(0)" class="brand-link navbar-navy text-sm">
        <img src="dist/img/AdminLTELogo.png" alt="CMS" class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light">Content Management System</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="edit-profile.html" class="d-block">John Smith</a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="view-categories.html" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon far fa-file-alt"></i>
                <p>
                  Posts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="create-post.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Post</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="view-posts.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Posts</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="view-comments.html" class="nav-link">
                <i class="nav-icon far fa-comments"></i>
                <p>
                  Comments
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="create-user.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="view-users.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Users</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
    </aside>

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
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>0</h3>
                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="far fa-list-alt"></i>
                </div>
                <a href="view-categories.html" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>0</h3>
                  <p>Posts</p>
                </div>
                <div class="icon">
                  <i class="far fa-file-alt"></i>
                </div>
                <a href="view-posts.html" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>0</h3>
                  <p>Comments</p>
                </div>
                <div class="icon">
                  <i class="far fa-comments"></i>
                </div>
                <a href="view-comments.html" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>0</h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="view-users.html" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <script type="text/javascript">
                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ["Copper", 8.94, "#b87333"],
                    ["Silver", 10.49, "silver"],
                    ["Gold", 19.30, "gold"],
                    ["Platinum", 21.45, "color: #e5e4e2"]
                  ]);

                  var view = new google.visualization.DataView(data);
                  view.setColumns([0, 1,
                    { calc: "stringify",
                      sourceColumn: 1,
                      type: "string",
                      role: "annotation" },
                    2]);

                  var options = {
                    title: "Density of Precious Metals, in g/cm^3",
                    width: 600,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                  };
                  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                  chart.draw(view, options);
                }
              </script>
              <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
            </div>
          </div>

        </div>
      </section>

    </div>

    <footer class="main-footer border-top-0 text-sm">
      &copy; 2020 All rights reserved.
      <div class="float-right d-none d-sm-inline-block">v1.0</div>
    </footer>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>