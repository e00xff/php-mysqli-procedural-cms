<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="posts.php?source=view-posts">Posts</a></li>
                        <li class="breadcrumb-item active">New Post</li>
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
                        <div class="card-header">
                            <h3 class="card-title">New Post</h3>
                        </div>
                        <form action="posts.php?source=new-post" method="post" enctype="multipart/form-data" role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option selected disabled>- Select Status -</option>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" id="tags" name="tags">
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option selected disabled>- Select Category -</option>
                                        <?php
                                        $categoryQuery = "SELECT * FROM categories";
                                        $categoryResult = mysqli_query($connection, $categoryQuery) or die('Query Failed: '.mysqli_error($connection));
                                        $categoryCount = mysqli_num_rows($categoryResult);

                                        if ($categoryCount > 0) {
                                            while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                                ?>
                                                <option value="<?php echo $categoryRow['id']; ?>">
                                                    <?php echo $categoryRow['title']; ?>
                                                </option>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <option>No categories</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo" name="photo">
                                        <label class="custom-file-label" for="photo">Choose file...</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea class="form-control textarea" id="excerpt" name="excerpt" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="content">Description</label>
                                    <textarea class="form-control textarea" id="content" name="content" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">Add</button>
                                <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $postCategoryID = $_POST['category'];
                        $postAuthorID = $_SESSION['id'];
                        $postTitle = $_POST['title'];
                        $postStatus = $_POST['status'];
                        $postTags = $_POST['tags'];
                        $postAuthor = $_POST['author'];
                        $postDate = date("Y-m-d");
                        $postExcerpt = $_POST['excerpt'];
                        $postContent = $_POST['content'];

                        $postPhoto = $_FILES['photo']['name'];
                        $postPhotoTemp = $_FILES['photo']['tmp_name'];
                        move_uploaded_file($postPhotoTemp, "../dist/img/posts/$postPhoto");

                        $query = "INSERT INTO posts(`category_id`, `author_id`, `title`, `status`, `tags`, `comment_count`, `author`, `date`, `photo`, `excerpt`, `content`) ";
                        $query .= "VALUES($postCategoryID, $postAuthorID, '$postTitle', '$postStatus', '$postTags', '0', '$postAuthor', '$postDate', '$postPhoto', '$postExcerpt', '$postContent')";
                        $result = mysqli_query($connection, $query) or die('Query Error: '.mysqli_error($connection));

                        if ($result) {
                            echo '<p>Post inserted, <a href="posts.php?source=view-posts">view post</a></p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

</div>