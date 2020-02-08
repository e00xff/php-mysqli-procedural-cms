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
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="login.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-sm">Login</button>
                            <a href="forgot.php" class="btn btn-light btn-sm">Forgot password?</a>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = mysqli_real_escape_string($connection, $_POST['password']);

                    $query = "SELECT * FROM `users` WHERE username = '$username' ";
                    $result = mysqli_query($connection, $query) or die('Query Error: '.mysqli_error($connection));
                    $row = mysqli_fetch_assoc($result);

                    $userID = $row['id'];
                    $dbUsername = $row['username'];
                    $dbPassword = $row['password'];
                    $dbFirstName = $row['first_name'];
                    $dbLastName = $row['last_name'];
                    $dbRole = $row['role'];

                    if ($username !== $dbUsername && $password !== $dbPassword) {
                        redirect('login.php');
                    } elseif($username == $dbUsername && $password == $dbPassword) {
                        redirect('admin');
                    } else {
                        redirect('login.php');
                    }
                }
                ?>

            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>
