<?php include 'core/init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main role="main" class="wrapper">
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Posts by category</li>
                    </ol>
                </nav>
                <div class="row">
                    <?php
                    $categoryID = (int)$_GET['categoryID'] ? (int)$_GET['categoryID'] : redirect('index.php');

                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'):
                        $postQuery = "SELECT * FROM posts WHERE category_id = {$categoryID}";
                    else:
                        $postQuery = "SELECT * FROM posts WHERE category_id = {$categoryID} AND status = 'published'";
                    endif;

                    $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));
                    $postCount = mysqli_num_rows($postResult);

                    if ($postCount > 0) {
                        while($postRow = mysqli_fetch_assoc($postResult)) {
                            ?>
                            <div class="col-md-6">
                                <div class="card mb-3 shadow-sm">
                                    <img class="card-img-top" src="dist/img/posts/<?php echo $postRow['photo']; ?>" width="350" height="250" alt="">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="post.php?postID=<?php echo $postRow['id']; ?>"><?php echo $postRow['title']; ?></a>
                                            <small class="d-block">By <a href="author-posts.php"><?php echo $postRow['author']; ?></a></small>
                                        </p>
                                        <div class="card-text small mb-3">
                                            <?php echo $postRow['excerpt']; ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="post.php?postID=<?php echo $postRow['id']; ?>" class="btn btn-sm btn-outline-secondary">Read more</a>
                                            </div>
                                            <small class="text-muted"><?php echo $postRow['date']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="alert alert-warning" role="alert">
                                No records found.
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
