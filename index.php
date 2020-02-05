<?php include 'inc/db.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'inc/head.php'; ?>
</head>
<body>

<?php include 'inc/header.php'; ?>

<main role="main" class="wrapper">
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include 'inc/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                    </ol>
                </nav>
                <div class="row">
                    <?php
                    $postQuery = "SELECT * FROM posts";
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
                                            <small class="d-block">By <a href="author.php"><?php echo $postRow['author']; ?></a></small>
                                        </p>
                                        <div class="card-text small">
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
                        echo '<div class="col-md-12">';
                        echo '<p>No records</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>
