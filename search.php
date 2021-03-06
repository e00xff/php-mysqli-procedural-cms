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
                    if(isset($_POST['submit'])) {
                        $search = $_POST['search'];

                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'):
                            $searchQuery = "SELECT * FROM posts WHERE tags LIKE '%$search%'";
                        else:
                            $searchQuery = "SELECT * FROM posts WHERE tags LIKE '%$search%' AND status= 'published'";
                        endif;

                        $searchResult = mysqli_query($connection, $searchQuery) or die('Query Error: '.mysqli_error($connection));

                        $searchCount = mysqli_num_rows($searchResult);

                        if ($searchCount > 0) {
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
                        } else {
                            ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="alert alert-warning" role="alert">
                                    No records found.
                                </div>
                            </div>
                            <?php
                        }
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
