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
                <div class="card mb-3">
                    <div class="card-header">
                        Forgot Password?
                    </div>
                    <div class="card-body">
                        <form method="post" action="reset.html">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>
