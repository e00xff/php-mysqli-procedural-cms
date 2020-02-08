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
            <div class="col-md-3">
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <div class="col-md-9">

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
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $username = mysqli_real_escape_string($connection, $username);
                    $password = mysqli_real_escape_string($connection, $password);

                    $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $select_user_query = mysqli_query($connection, $query);

                    if (!$select_user_query) {
                        die("Query Failed". mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($select_user_query)) {
                        $db_user_id = $row['id'];
                        $db_username = $row['username'];
                        $db_user_password = $row['password'];
                        $db_user_first_name = $row['first_name'];
                        $db_user_last_name = $row['last_name'];
                        $db_user_role = $row['role'];
                    }

                    if ($username === $db_username && $password === $db_user_password) {

                        $_SESSION['username'] = $db_username;
                        $_SESSION['first_name'] = $db_user_first_name;
                        $_SESSION['last_name'] = $db_user_last_name;
                        $_SESSION['role'] = $db_user_role;

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