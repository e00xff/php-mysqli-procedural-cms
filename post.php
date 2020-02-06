<?php
include 'inc/db.php';
include 'inc/functions.php';
?>
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

                <?php
                if (isset($_GET['postID'])) {
                    $postID = (int)$_GET['postID'];

                    $postQuery = "SELECT * FROM posts WHERE id = {$postID}";
                    $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));
                    $postCount = mysqli_num_rows($postResult);

                    $postRow = mysqli_fetch_assoc($postResult);
                    $postPhoto = !empty($postRow['photo']) ? 'dist/img/posts/'.$postRow['photo'] : '//placehold.it/1000x250';
                    ?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="index.php">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $postRow['title']; ?></li>
                        </ol>
                    </nav>

                    <div class="card mb-3 shadow-sm">
                        <img class="card-img-top" src="<?php echo $postPhoto; ?>" width="1000" height="250" alt="">
                        <div class="card-body">
                            <h5 class="card-text"><?php echo $postRow['title']; ?></h5>
                            <hr>

                            <ul class="list-unstyled">
                                <li><strong>Date:</strong> <?php echo $postRow['date']; ?></li>
                                <li><strong>Category:</strong> <?php echo $postRow['category_id']; ?></li>
                                <li><strong>Author:</strong> <a href="author.html"><?php echo $postRow['author']; ?></a></li>
                            </ul>

                            <?php echo $postRow['content']; ?>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-info">Post a comment</a>
                                </div>
                                <small class="text-muted">Views 0</small>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            Your comment
                        </div>
                        <div class="card-body">

                            <div class="alert alert-primary" role="alert">
                                Message
                            </div>

                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-Mail</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="3" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            Your comment
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                <tr>
                                    <td style="width: 100px;">
                                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                                    </td>
                                    <td>
                                        <div class="title h6">
                                            <a href="#"><b>John Smith</b></a>
                                            made a post.
                                        </div>
                                        <h6 class="text-muted time small">1 minute ago</h6>

                                        <p class="small">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus ducimus eos iure reiciendis totam veniam.
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm">
                            <img class="card-img-top" src="dist/img/posts/<?php echo $postRow['photo']; ?>" width="350" height="250" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="post.php"><?php echo $postRow['title']; ?></a>
                                    <small class="d-block">By <a href="author.php"><?php echo $postRow['author']; ?></a></small>
                                </p>
                                <div class="card-text small">
                                    <?php echo $postRow['excerpt']; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="post.php" class="btn btn-sm btn-outline-secondary">Read more</a>
                                    </div>
                                    <small class="text-muted"><?php echo $postRow['date']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                } else {
                    redirect('index.php');
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>