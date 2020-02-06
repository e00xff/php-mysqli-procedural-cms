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

                            <form method="post" action="post.php?postID=<?php echo $postRow['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author">Author</label>
                                            <input type="text" class="form-control" id="author" name="author">
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
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" rows="3" class="form-control"></textarea>
                                </div>
                                <button type="submit" name="insertComment" class="btn btn-primary btn-sm mb-3">Post a comment</button>
                            </form>
                            <?php
                            if (isset($_POST['insertComment'])) {
                                $commentAuthor = $_POST['author'];
                                $commentEmail = $_POST['email'];
                                $commentContent = $_POST['content'];
                                $commentStatus = 'unapproved';
                                $commentDate = date("Y-m-d");

                                $commentQuery = "INSERT INTO `comments` (`post_id`, `author`, `email`, `content`, `status`, `date`) ";
                                $commentQuery .= "VALUES ($postID, '$commentAuthor', '$commentEmail', '$commentContent', '$commentStatus', '$commentDate')";
                                $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));

                                if ($commentResult) {
                                    ?>
                                    <div class="alert alert-primary mb-0" role="alert">The message will be posted by the administrator after moderation.</div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            Your comment
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                <?php
                                $commentQuery = "SELECT * FROM comments WHERE status = 'approved'";
                                $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));
                                $commentCount = mysqli_num_rows($commentResult);

                                if ($commentCount > 0) {
                                    while ($commentRow = mysqli_fetch_assoc($commentResult)) {
                                        $commentAuthor = $commentRow['author'];
                                        $commentDate = date('Y-m-d');
                                        $commentContent = $commentRow['content'];
                                        ?>
                                        <tr>
                                            <td style="width: 100px;">
                                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                                            </td>
                                            <td>
                                                <div class="title h6">
                                                    <a href="#"><b><?php echo $commentAuthor; ?></b></a>
                                                </div>
                                                <h6 class="text-muted time small"><?php echo $commentDate; ?></h6>

                                                <p class="small">
                                                    <?php echo $commentContent; ?>
                                                </p>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr>';
                                    echo '<td colspan="2">No comments yet.</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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