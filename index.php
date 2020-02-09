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
                        <li class="breadcrumb-item">Home</li>
                    </ol>
                </nav>
                <div class="row">
                    <?php
                    $postQuery = "SELECT * FROM posts WHERE status = 'published'";
                    $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));
                    $postCount = mysqli_num_rows($postResult);

                    if ($postCount > 0) {
                        while($postRow = mysqli_fetch_assoc($postResult)) {
                            $postID = $postRow['id'];
                            $postPhoto = $postRow['photo'];
                            $postTitle = $postRow['title'];
                            $postAuthor = $postRow['author'];
                            $postExcerpt = $postRow['excerpt'];
                            $postDate = $postRow['date'];
                            ?>
                            <div class="col-md-6">
                                <div class="card mb-3 shadow-sm">
                                    <img class="card-img-top" src="dist/img/posts/<?php echo $postPhoto; ?>" width="350" height="250" alt="">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="post.php?postID=<?php echo $postID; ?>"><?php echo $postTitle; ?></a>
                                            <small class="d-block">By <a href="author.php"><?php echo $postAuthor; ?></a></small>
                                        </p>
                                        <div class="card-text small">
                                            <?php echo $postExcerpt; ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="post.php?postID=<?php echo $postID; ?>" class="btn btn-sm btn-outline-secondary">Read more</a>
                                            </div>
                                            <small class="text-muted"><?php echo $postDate; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } // end while loop
                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-12">
                            <p>No records</p>
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
