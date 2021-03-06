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

        <?php
        $categories = recordCount('categories');

        $posts = recordCount('posts');
        $postsPublished = checkStatus('posts','status','published');
        $postsUnpublished = checkStatus('posts', 'status', 'unpublished');

        $comments = recordCount('comments');
        $commentsApproved = checkStatus('comments', 'status', 'approved');
        $commentsUnapproved = checkStatus('comments', 'status', 'unapproved');

        $users = recordCount('users');
        $usersSubscribers = checkUserRole('users', 'role','subscriber');
        $usersAdministrators = checkUserRole('users', 'role','administrator');
        ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $categories; ?></h3>
                                        <p>Categories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-list-alt"></i>
                                    </div>
                                    <a href="view-categories.php" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $posts; ?></h3>
                                        <p>Posts</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                    <a href="posts.php?source=view-posts" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $comments; ?></h3>
                                        <p>Comments</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-comments"></i>
                                    </div>
                                    <a href="comments.php?page=comments" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Slides</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fab fa-slideshare"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $users; ?></h3>
                                        <p>Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <a href="users.php?page=view-users" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Members Online</h3>
                                <div class="card-tools">
                                    <span class="badge badge-danger">8 New Members</span>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    <?php
                                    $usersQuery = "SELECT * FROM users";
                                    $usersResult = mysqli_query($connection, $usersQuery) or die('Query Error: '.mysqli_error($connection));
                                    $usersCount = mysqli_num_rows($usersResult);

                                    if ($usersCount > 0) {
                                        while ($usersRow = mysqli_fetch_assoc($usersResult)) {
                                            $userPhoto = $usersRow['photo'];
                                            $userFullName = $usersRow['first_name'] . ' ' . $usersRow['last_name'];
                                            $date = $usersRow['date'];
                                            ?>
                                            <li>
                                                <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                                <a class="users-list-name" href="#"><?php echo $userFullName; ?></a>
                                                <span class="users-list-date"><?php echo $date; ?></span>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="users.php?page=view-users">View All Users</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Statistics</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include 'includes/footer.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
            <?php
            $elementText = [
                'All Posts',
                'Published Posts',
                'Unpublished Posts',
                'All Categories',
                'All Comments',
                'Approved Comments',
                'Unapproved Comments',
                'All Users',
                'Subscribers'];
            $elementCount = [
                $posts,
                $postsPublished,
                $postsUnpublished,
                $categories,
                $comments,
                $commentsApproved,
                $commentsUnapproved,
                $users,
                $usersSubscribers
            ];

            for ($i = 0; $i < 9; $i++) {
                echo "['{$elementText[$i]}'" . "," . "{$elementCount[$i]}],";
            }
            ?>
        ]);

        var options = {
            chart: {
                title: 'Content Management System',
                subtitle: 'Statistics about Categories, Posts, Comments, Users',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>


</body>
</html>