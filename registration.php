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

                <div class="card mb-3">
                    <div class="card-header">
                        <?php echo REGISTER; ?>
                    </div>
                    <div class="card-body">
                        <form method="post" action="registration.php" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo FIRST_NAME; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo LAST_NAME; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo USERNAME; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo EMAIL; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo PASSWORD; ?>">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?php echo CONFIRM_PASSWORD; ?>">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    <?php echo I_AGREE; ?>
                                </label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><?php echo REGISTER; ?></button>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_POST['submit'])) {

                    $firstName  = mysqli_real_escape_string($connection, $_POST['first_name']);
                    $lastName   = mysqli_real_escape_string($connection, $_POST['last_name']);
                    $username   = mysqli_real_escape_string($connection, $_POST['username']);
                    $email      = mysqli_real_escape_string($connection, $_POST['email']);
                    $password   = mysqli_real_escape_string($connection, $_POST['password']);
                    $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirm_password']);
                    $date       = date('Y-m-d');

                    $hashedPassword   = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

                    if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {

                        if ($password !== $confirmPassword) {
                            echo '<p>Confirm your password.</p>';
                        } else {

                            $query = "INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`, `role`, `status`, `date`) ";
                            $query .= "VALUES ('$username', '$hashedPassword', '$firstName', '$lastName', '$email', 'subscriber', 'unapproved', '$date')";

                            $result = mysqli_query($connection, $query) or die('Query Error: '.mysqli_error($connection));
                            if ($result) {
                                echo '<p>Successfully registered. <a href="login.php">Please Log in</a></p>';
                            } else {
                                echo '<p>Fields cannot be empty.</p>';
                            }
                        }

                    } else {
                        echo '<p>Fields are required.</p>';
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
