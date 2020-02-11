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
        $categoriesQuery = "SELECT * FROM categories";
        $categoriesResult = mysqli_query($connection, $categoriesQuery);
        $viewAllCategories = mysqli_num_rows($categoriesResult);

        // Posts
        $postsQuery = "SELECT * FROM posts";
        $postsResult = mysqli_query($connection, $postsQuery);
        $viewAllPosts = mysqli_num_rows($postsResult);

        $publishedPostsQuery = "SELECT * FROM posts WHERE status = 'published'";
        $publishedPostsResult = mysqli_query($connection, $publishedPostsQuery);
        $viewPublishedPosts = mysqli_num_rows($publishedPostsResult);

        $unpublishedPostsQuery = "SELECT * FROM posts WHERE status = 'unpublished'";
        $unpublishedPostsResult = mysqli_query($connection, $unpublishedPostsQuery);
        $viewUnpublishedPosts = mysqli_num_rows($unpublishedPostsResult);

        // Comments
        $commentsQuery = "SELECT * FROM comments";
        $commentsResult = mysqli_query($connection, $commentsQuery);
        $viewAllComments = mysqli_num_rows($commentsResult);

        $approvedCommentsQuery = "SELECT * FROM comments WHERE status = 'approved'";
        $approvedCommentsResult = mysqli_query($connection, $approvedCommentsQuery);
        $viewApprovedComments = mysqli_num_rows($approvedCommentsResult);

        $unapprovedCommentsQuery = "SELECT * FROM comments WHERE status = 'unapproved'";
        $unapprovedCommentsResult = mysqli_query($connection, $unapprovedCommentsQuery);
        $viewUnapprovedComments = mysqli_num_rows($unapprovedCommentsResult);

        // Users
        $usersQuery = "SELECT * FROM users";
        $usersResult = mysqli_query($connection, $usersQuery);
        $viewAllUsers = mysqli_num_rows($usersResult);

        $usersSubscriberQuery = "SELECT * FROM users WHERE role = 'subscriber'";
        $usersSubscriberResult = mysqli_query($connection, $usersSubscriberQuery);
        $viewSubscribers = mysqli_num_rows($usersSubscriberResult);
        ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $viewAllCategories; ?></h3>
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
                                        <h3><?php echo $viewAllPosts; ?></h3>
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
                                        <h3><?php echo $viewAllComments; ?></h3>
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
                                        <h3><?php echo $viewAllUsers; ?></h3>
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
                                    <li>
                                        <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Alexander Pierce</a>
                                        <span class="users-list-date">Today</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user8-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Norman</a>
                                        <span class="users-list-date">Yesterday</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user7-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Jane</a>
                                        <span class="users-list-date">12 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user6-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">John</a>
                                        <span class="users-list-date">12 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user2-160x160.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Alexander</a>
                                        <span class="users-list-date">13 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user5-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Sarah</a>
                                        <span class="users-list-date">14 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user4-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Nora</a>
                                        <span class="users-list-date">15 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user3-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Nadia</a>
                                        <span class="users-list-date">15 Jan</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="javascript::">View All Users</a>
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
                $viewAllPosts,
                $viewPublishedPosts,
                $viewUnpublishedPosts,
                $viewAllCategories,
                $viewAllComments,
                $viewApprovedComments,
                $viewUnapprovedComments,
                $viewAllUsers,
                $viewSubscribers
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