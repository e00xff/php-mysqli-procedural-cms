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
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php
                    if (isset($_GET['postID'])) {
                        $postID = (int)$_GET['postID'];

                        $query = "SELECT * FROM posts WHERE id = '{$postID}'";
                        $result = mysqli_query($connection, $query) or die('Query Error: ' . mysqli_error($connection));
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Post</h3>
                                    </div>
                                    <form action="posts.php?source=edit-post" method="post"
                                          enctype="multipart/form-data" role="form">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
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
                                                <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $row['tags']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="author">Author</label>
                                                <input type="text" class="form-control" id="author" name="author" value="<?php echo $row['author']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option selected disabled>- Select Category -</option>
                                                    <?php
                                                    $query = "SELECT * FROM categories";
                                                    $result = mysqli_query($connection, $query) or die('Error Query: '.mysqli_error($connection));
                                                    $count = mysqli_num_rows($result);

                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row['title'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>

<!--                                                    <option value="1">Health</option>-->
<!--                                                    <option value="2">Planet Earth</option>-->
<!--                                                    <option value="3">Strange News</option>-->
<!--                                                    <option value="4">Space & Physics</option>-->
<!--                                                    <option value="5">Animals</option>-->
<!--                                                    <option value="6">History</option>-->
<!--                                                    <option value="7">Tech</option>-->
<!--                                                    <option value="8">Culture</option>-->
                                                </select>
                                            </div>
                                            <p>
                                                <img src="<?php echo !empty($row['photo']) ? '../dist/img/posts/' . $row['photo'] : 'https://via.placeholder.com/150x50'; ?>" width="150" height="80" alt="">
                                            </p>
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="photo"
                                                           name="photo">
                                                    <label class="custom-file-label" for="photo">Choose file...</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="excerpt">Excerpt</label>
                                                <textarea class="form-control textarea" id="excerpt" name="excerpt"
                                                          rows="3"><?php echo $row['excerpt']; ?></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="content">Description</label>
                                                <textarea class="form-control textarea" id="content" name="content"
                                                          rows="5"><?php echo $row['content']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat">
                                                Update
                                            </button>
                                            <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <p>No records found.</p>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

</div>