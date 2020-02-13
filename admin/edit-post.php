<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="view-posts.php">Posts</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <?php
            isset($_GET['postID']) ? $postID = (int)$_GET['postID'] : redirect('posts.php');

            $postQuery = "SELECT * FROM posts WHERE id = {$postID}";
            $postResult = mysqli_query($connection, $postQuery) or die('Query Error: ' . mysqli_error($connection));
            $postCount = mysqli_num_rows($postResult);

            if ($postCount > 0) {
                while ($postRow = mysqli_fetch_assoc($postResult)) {
                    $postCategoryID = $postRow['category_id'];
                    $postTitle = $postRow['title'];
                    $postStatus = $postRow['status'];
                    $postTags = $postRow['tags'];
                    $postAuthor = $postRow['author'];
                    $postPhoto = !empty($postRow['photo']) ? '../dist/img/posts/' . $postRow['photo'] : 'https://via.placeholder.com/150x50';
                    $postExcerpt = $postRow['excerpt'];
                    $postContent = str_replace('\r\n', '</br>',$postRow['content']);
                    ?>
                    <form action="posts.php?source=edit-post&postID=<?php echo $postID; ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Content</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $postTitle; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt">Excerpt</label>
                                        <textarea class="form-control textarea" id="excerpt" name="excerpt" rows="3"><?php echo $postExcerpt; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                        <textarea class="form-control textarea" id="content" name="content" rows="5"><?php echo $postContent; ?></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control" id="author" name="author" value="<?php echo $postAuthor; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Status</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <select name="status" class="form-control">
                                            <option disabled>- Select Status -</option>
                                            <option value="published" <?php echo $postStatus == 'published' ? 'selected' : ''; ?>>Published</option>
                                            <option value="unpublished" <?php echo $postStatus == 'unpublished' ? 'selected' : ''; ?>>Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Tags</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" name="tags" value="<?php echo $postTags; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <select name="category" class="form-control">
                                            <option disabled>- Select Category -</option>
                                            <?php
                                            $categoryQuery = "SELECT * FROM categories";
                                            $categoryResult = mysqli_query($connection, $categoryQuery) or die('Query Error: '.mysqli_error($connection));

                                            while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                                $categoryID = $categoryRow['id'];
                                                $categoryTitle = $categoryRow['title'];

                                                if ($categoryID == $postCategoryID) {
                                                    ?>
                                                    <option value="<?php echo $categoryID; ?>" selected>
                                                        <?php echo $categoryTitle; ?>
                                                    </option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $categoryID; ?>">
                                                        <?php echo $categoryTitle; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Photo</h3>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <img src="<?php echo $postPhoto; ?>" width="150" height="80" alt="">
                                    </p>
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo">
                                            <label class="custom-file-label" for="photo">Choose file...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <button type="submit" name="updatePost" class="btn btn-primary btn-sm btn-flat">Update</button>
                                <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                    <?php
                }

                if (isset($_POST['updatePost'])) {
                    $author = $_POST['author'];
                    $title = $_POST['title'];
                    $categoryID = $_POST['category'];
                    $authorID = $_SESSION['id'];
                    $status = $_POST['status'];
                    $photo      =  $_FILES['photo']['name'];
                    $photo_temp =  $_FILES['photo']['tmp_name'];
                    $tags = $_POST['tags'];
                    $excerpt = $_POST['excerpt'];
                    $content = $_POST['content'];

                    move_uploaded_file($photo_temp, "../dist/img/posts/$photo");

                    if (empty($photo)) {
                        $photoQuery = "SELECT * FROM posts WHERE id = $postID ";
                        $photoResult = mysqli_query($connection, $photoQuery) or die('Query Error: ' . mysqli_error($connection));

                        while($photoRow = mysqli_fetch_array($photoResult)) {
                            $photo = $photoRow['photo'];
                        }
                    }

                    $query = "UPDATE posts SET ";
                    $query .="title  = '{$title}', ";
                    $query .="category_id = '{$categoryID}', ";
                    $query .="author_id = '{$authorID}', ";
                    $query .="date   =  now(), ";
                    $query .="status = '{$status}', ";
                    $query .="tags   = '{$tags}', ";
                    $query .="excerpt= '{$excerpt}', ";
                    $query .="content= '{$content}', ";
                    $query .="photo  = '{$photo}' ";
                    $query .= "WHERE id = {$postID} ";

                    $updatePost = mysqli_query($connection, $query);

                    confirmQuery($updatePost);
                    ?>
                    <div class="callout callout-success">
                        <h5>Post Updated</h5>
                        <p>
                            <a href="../post.php?postID=<?php echo $postID; ?>" class="btn btn-sm btn-flat btn-primary">View Post</a>
                            <a href="posts.php" class="btn btn-sm btn-flat btn-info">Edit Posts</a>
                        </p>
                    </div>
                    <br>
                    <?php
                }

            } else {
                ?>
                <p>No records found.</p>
                <?php
            }
            ?>
        </div>
    </section>

</div>