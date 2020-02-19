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
                        <h1 class="m-0 text-dark">Edit My Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit My Profile</li>
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
                        isset($_SESSION['id']) ? $userID = $_SESSION['id'] : redirect('../index.php');

                        $userQuery = "SELECT * FROM users WHERE id = {$userID}";
                        $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error());
                        $userRow = mysqli_fetch_assoc($userResult);

                        $username = $userRow['username'];
                        $firstName = $userRow['first_name'];
                        $lastName = $userRow['last_name'];
                        $email = $userRow['email'];
                        $role = $userRow['role'];
                        $status = $userRow['status'];
                        $date = date('Y-m-y');
                        $photo = $userRow['photo'];
                        ?>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Edit My Profile</h3>
                            </div>
                            <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" role="form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                    </div>
                                    <p>
                                        <img src="<?php echo !empty($userRow['photo']) ? '../uploads/users/' . $userRow['photo'] : 'https://via.placeholder.com/150x50'; ?>" width="80" height="80" alt="">
                                    </p>
                                    <div class="form-group mb-0">
                                        <label for="photo">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" id="photo" class="custom-file-input">
                                            <label class="custom-file-label" for="photo">Choose file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" name="updateUser" class="btn btn-primary btn-sm btn-flat">Update</button>
                                    <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['updateUser'])) {
                            $username = $_POST['username'];
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $date = date('Y-m-y');

                            $photo      =  $_FILES['photo']['name'];
                            $photo_temp =  $_FILES['photo']['tmp_name'];
                            move_uploaded_file($photo_temp, "../uploads/users/$photo");

                            if (empty($photo)) {
                                $photoQuery = "SELECT * FROM users WHERE id = $userID ";
                                $photoResult = mysqli_query($connection, $photoQuery) or die('Query Error: ' . mysqli_error($connection));

                                while($photoRow = mysqli_fetch_array($photoResult)) {
                                    $photo = $photoRow['photo'];
                                }
                            }

                            $userQuery = "UPDATE users SET ";
                            $userQuery .= "username  = '$username', ";
                            $userQuery .= "first_name = '$firstName', ";
                            $userQuery .= "last_name   = '$lastName', ";
                            $userQuery .= "email= '$email', ";
                            $userQuery .= "photo  = '$photo', ";
                            $userQuery .= "date   = '$date' ";
                            $userQuery .= "WHERE id = $userID";

                            $updateUser = mysqli_query($connection, $userQuery);

                            confirmQuery($updateUser);

                            echo "<p>Profile Updated.</p>";

                        }
                        ?>
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