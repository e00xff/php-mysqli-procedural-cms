<?php include 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">

<div class="wrapper">

    <?php include 'includes/nav.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Slide</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="view-slides.php">Slider</a></li>
                            <li class="breadcrumb-item active">Edit Slide</li>
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
                                <h3 class="card-title">Edit Slider</h3>
                            </div>
                            <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" role="form">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <input type="text" class="form-control" id="message" name="message">
                                    </div>
                                    <div class="form-group">
                                        <label for="access">Published</label>
                                        <select class="form-control" id="access" name="access">
                                            <option selected disabled>Select Options</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <p>
                                        <img src="https://via.placeholder.com/80" alt="">
                                    </p>
                                    <div class="form-group">
                                        <label for="status">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="order">Order</label>
                                        <input type="text" class="form-control" id="order" name="order">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm btn-flat">Update</button>
                                    <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include 'includes/footer.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>