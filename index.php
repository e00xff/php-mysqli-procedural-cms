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
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-md-6">
                            <div class="card mb-3 shadow-sm">
                                <img class="card-img-top" src="dist/img/posts/<?php echo $row['photo']; ?>" width="350" height="250" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        <a href="post.html"><?php echo $row['title']; ?></a>
                                        <small class="d-block">By <a href="author.html"><?php echo $row['author']; ?></a></small>
                                    </p>
                                    <div class="card-text small">
                                        <?php echo $row['excerpt']; ?>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="post.html" class="btn btn-sm btn-outline-secondary">Read more</a>
                                        </div>
                                        <small class="text-muted"><?php echo $row['date']; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
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
