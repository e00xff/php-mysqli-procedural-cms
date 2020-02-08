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
                        Reset Password
                    </div>
                    <div class="card-body">
                        <p>You can reset your password here.</p>
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            </div>
                            <button type="submit" name="resetPassword" class="btn btn-primary btn-sm">Reset Password</button>
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
