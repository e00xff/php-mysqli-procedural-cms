<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="posts.php?source=view-posts">Posts</a></li>
                        <li class="breadcrumb-item active">View Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">

                    <form method="post" action="#">
                        <div class="card card-danger">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="input-group" id="bulkOptions">
                                        <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                            <option selected disabled>- Bulk Options -</option>
                                            <option value="publish">Publish</option>
                                            <option value="draft">Unpublish</option>
                                            <option value="delete">Delete</option>
                                            <option value="clone">Clone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
                            </div>
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Posts List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-sm mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 60px;"><input type="checkbox" id="selectAllBoxes"></th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Comments</th>
                                        <th>Date</th>
                                        <th style="width: 200px;" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM posts ORDER BY id DESC";
                                    $result = mysqli_query($connection, $query);
                                    $count = mysqli_num_rows($result);

                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $postID = $row['id'];
                                            $postAuthor = $row['author'];
                                            $postTitle = $row['title'];
                                            $postCategory = $row['category_id'];
                                            $postStatus = $row['status'];
                                            $postImage = !empty($row['photo']) ? '../dist/img/posts/'.$row['photo'] : 'https://via.placeholder.com/150x50';
                                            $postTags = $row['tags'];
                                            $postCommentCount = $row['comment_count'];
                                            $postDate = $row['date'];
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value="<?php echo $postID; ?>"></td>
                                                <td><?php echo $postAuthor; ?></td>
                                                <td>
                                                    <a href="../post.php?postID=<?php echo $postID; ?>">
                                                        <?php echo shorten_text($postTitle, 25); ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $categoryQuery = "SELECT * FROM categories WHERE id = {$postCategory}";
                                                    $categoryResult = mysqli_query($connection, $categoryQuery) or die('Query Error: '.mysqli_error($connection));
                                                    $categoryCount = mysqli_num_rows($categoryResult);

                                                    if ($categoryCount) {
                                                        while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                                            echo $categoryRow['title'];
                                                        }
                                                    } else {
                                                        echo 'Not selected';
                                                    }
                                                    ?>
                                                </td>
                                                <td><span class="badge <?php echo $postStatus == 'published' ? 'badge-success' : 'badge-warning'; ?>"><?php echo ucfirst($postStatus); ?></span></td>
                                                <td><img src="<?php echo $postImage ?>" width="150" height="50" alt="<?php echo $postTitle; ?>" title="<?php echo $postTitle; ?>"></td>
                                                <td><?php echo $postTags; ?></td>
                                                <td class="text-center"><a href="comments.php?page=comments"><?php echo $postCommentCount; ?></a></td>
                                                <td><?php echo $postDate; ?></td>
                                                <td class="text-center">
                                                    <a href="posts.php?source=view-post&postID=<?php echo $postID; ?>" class="btn btn-info btn-xs btn-flat" title="View Post"><i class="far fa-eye"></i></a>
                                                    <a href="posts.php?source=edit-post&postID=<?php echo $postID; ?>" class="btn btn-primary btn-xs btn-flat" title="Edit Post"><i class="far fa-edit"></i></a>
                                                    <a href="posts.php?published=<?php echo $postID; ?>" class="btn btn-success btn-xs btn-flat <?php echo $postStatus == 'published' ? 'disabled' : ''; ?>" title="Publish Post"><i class="fas fa-check"></i></a>
                                                    <a href="posts.php?unpublished=<?php echo $postID; ?>" class="btn btn-warning btn-xs btn-flat <?php echo $postStatus == 'unpublished' ? 'disabled' : ''; ?>" title="Unpublish Post"><i class="fas fa-ban"></i></a>
                                                    <a href="posts.php?delete=<?php echo $postID; ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure you want to delete this record?');" title="Remove Post"><i class="far fa-trash-alt"></i></a>
                                                    <!-- <button onclick="deleteRecord()" id="deleteRecord" type="button" class="btn btn-danger btn-xs btn-flat"><i class="far fa-trash-alt"></i></button> -->
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="10">Add a new post</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="posts.php?source=new-post" class="btn btn-success btn-sm btn-flat">New Post</a>
                            </div>
                        </div>
                    </form>

                    <?php

                    if (isset($_GET['published'])) {
                        $postID = $_GET['published'];

                        $postQuery = "UPDATE `posts` SET `status` = 'published' WHERE `posts`.`id` = {$postID}";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($postResult) {
                            redirect('posts.php');
                        }
                    }

                    if (isset($_GET['unpublished'])) {
                        $postID = $_GET['unpublished'];

                        $postQuery = "UPDATE `posts` SET `status` = 'unpublished' WHERE `posts`.`id` = {$postID}";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($postResult) {
                            redirect('posts.php');
                        }
                    }

                    if (isset($_GET['delete'])) {
                        $postID = (int)$_GET['delete'];

                        // Delete post comment
                        $postCommentsQuery = "DELETE FROM comments WHERE post_id = {$postID}";
                        $postCommentsResult = mysqli_query($connection, $postCommentsQuery) or die('Query Error: '.mysqli_error($connection));

                        // Delete post
                        $postQuery = "DELETE FROM posts WHERE id = {$postID}";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));

                        redirect('posts.php');
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