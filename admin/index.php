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

        $postsQuery = "SELECT * FROM posts";
        $postsResult = mysqli_query($connection, $postsQuery);
        $postsCount = mysqli_num_rows($postsResult);

        $commentsQuery = "SELECT * FROM comments";
        $commentsResult = mysqli_query($connection, $commentsQuery);
        $commentsCounts = mysqli_num_rows($commentsResult);

        $usersQuery = "SELECT * FROM users";
        $usersResult = mysqli_query($connection, $usersQuery);
        $usersCounts = mysqli_num_rows($usersResult);
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
            </div>
        </section>

    </div>

    <?php include 'includes/footer.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>