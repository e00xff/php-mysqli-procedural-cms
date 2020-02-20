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
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">All Posts</li>
                    </ol>
                </nav>

                <div class="row">
                    <?php
                    $perPage = 2;
                    $page = isset($_GET['page']) ? $page = (int)$_GET['page'] : $page = '';
                    $firstPage = ($page == "" || $page == 1) ? $firstPage = 0 : $firstPage = ($page * $perPage) - $perPage;

                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($connection, $query) or die('Query error: '.mysqli_error($connection));
                    $count = mysqli_num_rows($result);
                    $count = ceil($count / $perPage);

                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'):
                        $postQuery = "SELECT * FROM posts LIMIT {$firstPage}, {$perPage}";
                    else:
                        $postQuery = "SELECT * FROM posts WHERE status = 'published' LIMIT {$firstPage}, {$perPage}";
                    endif;

                    $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));
                    $postCount = mysqli_num_rows($postResult);

                    if ($postCount > 0) {
                        while($postRow = mysqli_fetch_assoc($postResult)) {
                            $postID = $postRow['id'];
                            $postAuthorID = $postRow['author_id'];
                            $postPhoto = $postRow['photo'];
                            $postTitle = $postRow['title'];
                            $postAuthor = $postRow['author'];
                            $postExcerpt = $postRow['excerpt'];
                            $postDate = $postRow['date'];
                            ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card mb-3 shadow-sm">
                                    <img class="card-img-top" src="dist/img/posts/<?php echo $postPhoto; ?>" width="350" height="150" alt="">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="post.php?postID=<?php echo $postID; ?>"><?php echo $postTitle; ?></a>
                                            <small class="d-block">By <a href="author-posts.php?authorID=<?php echo $postAuthorID; ?>"><?php echo $postAuthor; ?></a></small>
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

                <?php if ($postCount > 0): ?>
                    <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">

                                <li class="page-item">
                                    <a class="page-link" href="#">Previous</a>
                                </li>

                                <?php for($i = 1; $i <= $count; $i++) : ?>
                                    <?php if ($i == $page): ?>
                                        <li class="page-item active">
                                            <a href="index.php?page=<?php echo $i; ?>" class="page-link">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a href="index.php?page=<?php echo $i; ?>" class="page-link">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>

                            </ul>
                        </nav>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php include 'includes/adv.php'; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
