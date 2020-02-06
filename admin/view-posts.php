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

                    <div class="card card-danger">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                        <option selected disabled>- Bulk Options -</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                        <option value="delete">Delete</option>
                                        <option value="clone">Clone</option>
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
                            <h3 class="card-title">Posts List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 60px;"><input type="checkbox"></th>
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
                                $query = "SELECT * FROM posts";
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
                                            <td><input type="checkbox"></td>
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
                                            <td>
                                                <?php
                                                if ($postStatus == 'published') {
                                                    ?>
                                                    <span class="badge badge-success"><?php echo $postStatus; ?></span>
                                                    <?php
                                                } elseif ($postStatus == 'draft') {
                                                    ?>
                                                    <span class="badge badge-danger"><?php echo $postStatus; ?></span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge badge-primary">Without status</span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><img src="<?php echo $postImage ?>" width="150" height="50" alt="<?php echo $postTitle; ?>" title="<?php echo $postTitle; ?>"></td>
                                            <td><?php echo $postTags; ?></td>
                                            <td class="text-center"><a href="comments.php?page=comments"><?php echo $postCommentCount; ?></a></td>
                                            <td><?php echo $postDate; ?></td>
                                            <td class="text-center">
                                                <a href="posts.php?published=<?php echo $postID; ?>" class="btn btn-success btn-xs btn-flat <?php echo $postStatus == 'published' ? 'disabled' : ''; ?>" title="Published">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="posts.php?draft=<?php echo $postID; ?>" class="btn btn-warning btn-xs btn-flat <?php echo $postStatus == 'draft' ? 'disabled' : ''; ?>" title="Draft">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                                <a href="posts.php?source=view-post" class="btn btn-info btn-xs btn-flat" title="View Post"><i class="far fa-eye"></i></a>
                                                <a href="posts.php?source=edit-post&postID=<?php echo $postID; ?>" class="btn btn-primary btn-xs btn-flat" title="Edit Post"><i class="far fa-edit"></i></a>
                                                <a href="posts.php?delete=<?php echo $postID; ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure you want to delete this record?');" title="Remove Post"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No records found</td>
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

                    <?php
                    if (isset($_GET['published'])) {
                        $postID = $_GET['published'];

                        $postQuery = "UPDATE `posts` SET `status` = 'published' WHERE `posts`.`id` = {$postID}";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($postResult) {
                            redirect('posts.php');
                        }
                    }

                    if (isset($_GET['draft'])) {
                        $postID = $_GET['draft'];

                        $postQuery = "UPDATE `posts` SET `status` = 'draft' WHERE `posts`.`id` = {$postID}";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($postResult) {
                            redirect('posts.php');
                        }
                    }

                    if (isset($_GET['delete'])) {
                        $postID = (int)$_GET['delete'];
                        $query = "DELETE FROM posts WHERE id = '{$postID}'";
                        $result = mysqli_query($connection, $query) or die('Query Error: '.mysqli_error($connection));

                        header("Location: posts.php?source=view-post");
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