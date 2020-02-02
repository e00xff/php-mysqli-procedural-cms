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
                    if(isset($_POST['submit'])) {
                        $search = $_POST['search'];

                        $searchQuery = "SELECT * FROM posts WHERE tags LIKE '%$search%' ";
                        $searchResult = mysqli_query($connection, $searchQuery);

                        if (!$searchResult) {
                            die("Query Failed". mysqli_error($connection));
                        }

                        $searchCount = mysqli_num_rows($searchResult);

                        if ($searchCount == 0) {
                            echo '<div class="col-md-6">';
                            echo '<p>Nothing found.</p>';
                            echo '</div>';
                        } else {

                            while($searchRow = mysqli_fetch_assoc($searchResult)) {
                                ?>
                                <div class="col-md-6">
                                    <div class="card mb-3 shadow-sm">
                                        <img class="card-img-top" src="dist/img/posts/<?php echo $searchRow['photo']; ?>" width="350" height="250" alt="">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <a href="post.html"><?php echo $searchRow['title']; ?></a>
                                                <small class="d-block">By <a href="author.html"><?php echo $searchRow['author']; ?></a></small>
                                            </p>
                                            <div class="card-text small">
                                                <?php echo $searchRow['excerpt']; ?>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="post.html" class="btn btn-sm btn-outline-secondary">Read more</a>
                                                </div>
                                                <small class="text-muted"><?php echo $searchRow['date']; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                        }

                    }
                    ?>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>
