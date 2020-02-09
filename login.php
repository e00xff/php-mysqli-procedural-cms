<?php include 'core/init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main role="main" class="wrapper">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="#">
                    <div class="card mb-3">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
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
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['login'])) {

                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = mysqli_real_escape_string($connection, $_POST['password']);

                    $loginQuery = "SELECT * FROM users WHERE username = '{$username}' ";
                    $loginResult = mysqli_query($connection, $loginQuery) or die('Query Error: '.mysqli_error($connection));

                    while ($row = mysqli_fetch_array($loginResult)) {
                        $dbUserID = $row['id'];
                        $dbUsername = $row['username'];
                        $dbUserPassword = $row['password'];
                        $dbUserFirstName = $row['first_name'];
                        $dbUserLastName = $row['last_name'];
                        $dbUserRole = $row['role'];
                    }

                    if ($username === $dbUsername && $password === $dbUserPassword) {

                        $_SESSION['id'] = $dbUserID;
                        $_SESSION['username'] = $dbUsername;
                        $_SESSION['first_name'] = $dbUserFirstName;
                        $_SESSION['last_name'] = $dbUserLastName;
                        $_SESSION['role'] = $dbUserRole;

                        header("Location: admin");
                    } else {
                        header("Location: login.php");
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>