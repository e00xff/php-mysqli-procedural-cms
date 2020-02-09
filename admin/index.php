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
                        <h1 class="m-0 text-dark">Dashboard <small>Welcome <?php echo $_SESSION['username']; ?></small></h1>
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
        $categoriesQuery = "SELECT * FROM categories";
        $categoriesResult = mysqli_query($connection, $categoriesQuery);
        $categoriesCount = mysqli_num_rows($categoriesResult);

        // Posts
        $postsQuery = "SELECT * FROM posts";
        $postsResult = mysqli_query($connection, $postsQuery);
        $postsCount = mysqli_num_rows($postsResult);

        $unpublishedPostsQuery = "SELECT * FROM posts WHERE status = 'unpublished'";
        $unpublishedPostsResult = mysqli_query($connection, $unpublishedPostsQuery);
        $unpublishedPostsCount = mysqli_num_rows($unpublishedPostsResult);

        // Comments
        $commentsQuery = "SELECT * FROM comments";
        $commentsResult = mysqli_query($connection, $commentsQuery);
        $commentsCounts = mysqli_num_rows($commentsResult);

        $unapprovedCommentsQuery = "SELECT * FROM comments WHERE status = 'unapproved'";
        $unapprovedCommentsResult = mysqli_query($connection, $unapprovedCommentsQuery);
        $unapprovedCommentsCount = mysqli_num_rows($unapprovedCommentsResult);

        // Users
        $usersQuery = "SELECT * FROM users";
        $usersResult = mysqli_query($connection, $usersQuery);
        $usersCounts = mysqli_num_rows($usersResult);

        $usersSubscriberQuery = "SELECT * FROM users WHERE role = 'subscriber'";
        $usersSubscriberResult = mysqli_query($connection, $usersSubscriberQuery);
        $usersSubscriberCount = mysqli_num_rows($usersSubscriberResult);
        ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $categoriesCount; ?></h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-list-alt"></i>
                            </div>
                            <a href="view-categories.php" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $postsCount; ?></h3>
                                <p>Posts</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-file-alt"></i>
                            </div>
                            <a href="posts.php?source=view-posts" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $commentsCounts; ?></h3>
                                <p>Comments</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <a href="comments.php?page=comments" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
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
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $usersCounts; ?></h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="users.php?page=view-users" class="small-box-footer">View Details <i class="fas fa-arrow-circle-right"></i></a>
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
            $elementText = ['Categories', 'Blog Posts', 'Unpublished Posts', 'Comments', 'Unapproved Comments', 'Users', 'Subscriber Role Users'];
            $elementCount = [$categoriesCount, $postsCount, $unpublishedPostsCount, $commentsCounts, $unapprovedCommentsCount, $usersCounts, $usersSubscriberCount];

            for ($i = 0; $i < 7; $i++) {
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