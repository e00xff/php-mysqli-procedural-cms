<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">

                    <form method="post" action="#" role="form">
                        <div class="card card-danger">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                            <option selected disabled>- Bulk Options -</option>
                                            <option value="approve">Approve</option>
                                            <option value="unapprove">Unapprove</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
                            </div>
                        </div>

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Post Comments</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-sm projects mb-0">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Author</th>
                                        <th>Content</th>
                                        <th>E-Mail</th>
                                        <th>Status</th>
                                        <th>In Response To</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $commentQuery = "SELECT * FROM comments";
                                    $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));
                                    $commentCount = mysqli_num_rows($commentResult);

                                    if ($commentCount > 0) {
                                        while ($commentRow = mysqli_fetch_assoc($commentResult)) {
                                            $commentID = $commentRow['id'];
                                            $commentAuthor = $commentRow['author'];
                                            $commentContent = $commentRow['content'];
                                            $commentEmail = $commentRow['email'];
                                            $commentStatus = $commentRow['status'];
                                            $commentPostID = $commentRow['post_id'];
                                            $commentDate = $commentRow['date'];
                                            ?>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><?php echo $commentAuthor; ?></td>
                                                <td><?php echo shorten_text($commentContent, 25, ' <a href="../post.php?postID='.$commentPostID.'">Read more</a>', true); ?></td>
                                                <td><?php echo $commentEmail; ?></td>
                                                <td>
                                                    <?php
                                                    if ($commentStatus == 'approved') {
                                                        ?>
                                                        <span class="badge badge-success"><?php echo $commentStatus; ?></span>
                                                        <?php
                                                    } elseif ($commentStatus == 'unapprove') {
                                                        ?>
                                                        <span class="badge badge-danger"><?php echo $commentStatus; ?></span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="badge badge-primary">Without status</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $postCommentQuery = "SELECT * FROM posts WHERE id = {$commentPostID}";
                                                        $postCommentResult = mysqli_query($connection, $postCommentQuery) or die('Query Error: '.mysqli_error($postCommentQuery));
                                                        $postRow = mysqli_fetch_assoc($postCommentResult);
                                                        $postID = $postRow['id'];
                                                        $postTitle = $postRow['title'];
                                                    ?>
                                                    <a href="../post.php?postID=<?php echo $postID; ?>"><?php echo $postTitle; ?></a>
                                                </td>
                                                <td><?php echo $commentDate; ?></td>
                                                <td class="text-center">
                                                    <a href="comments.php?approve=<?php echo $commentID; ?>" class="btn btn-success btn-xs btn-flat" title="Approve">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </a>
                                                    <a href="comments.php?unapprove=<?php echo $commentID; ?>" class="btn btn-primary btn-xs btn-flat" title="Unapprove">
                                                        <i class="far fa-thumbs-down"></i>
                                                    </a>
                                                    <a href="comments.php?delete=<?php echo $commentID; ?>" class="btn btn-danger btn-xs btn-flat" title="Remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr>';
                                        echo '<td colspan="8">No records</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_GET['approve'])) {
                        $commentID = $_GET['approve'];

                        $commentQuery = "UPDATE `comments` SET `status` = 'approved' WHERE `comments`.`id` = {$commentID}";
                        $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($commentResult) {
                            redirect('comments.php');
                        }
                    }


                    if (isset($_GET['unapprove'])) {
                        $commentID = $_GET['unapprove'];

                        $commentQuery = "UPDATE `comments` SET `status` = 'unapprove' WHERE `comments`.`id` = {$commentID}";
                        $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($commentResult) {
                            redirect('comments.php');
                        }
                    }

                    if (isset($_GET['delete'])) {
                        $commentID = $_GET['delete'];
                        $commentQuery = "DELETE FROM comments WHERE id = {$commentID}";
                        $commentResult = mysqli_query($connection, $commentQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($commentResult) {
                            redirect('comments.php');
                        }
                    }
                    ?>

                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>

</div>