<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php?page=view-users">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    isset($_GET['userID']) ? $userID = (int)$_GET['userID'] : redirect('users.php');

                    $userQuery = "SELECT * FROM users WHERE id = {$userID}";
                    $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));
                    $userCount = mysqli_num_rows($userResult);

                    if ($userCount > 0) {
                        while ($userRow = mysqli_fetch_assoc($userResult)) {
                            $username = $userRow['username'];
                            $firstName = $userRow['first_name'];
                            $lastName = $userRow['last_name'];
                            $email = $userRow['email'];
                            $password = $userRow['password'];
                            $role = $userRow['role'];
                            $status = $userRow['status'];
                            $date = date('Y-m-y');
                            $photo = $userRow['photo'];
                            ?>
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Edit User</h3>
                                </div>
                                <form method="post" action="users.php?page=edit-user&userID=<?php echo $userID; ?>" enctype="multipart/form-data" role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="role">User Role</label>
                                            <select class="form-control" id="role" name="role">
                                                <option disabled>Select Options</option>
                                                <option value="administrator" <?php if ($role == "administrator" ) echo "selected" ; ?>>Administrator</option>
                                                <option value="subscriber" <?php if ($role == "subscriber" ) echo "selected" ; ?>>Subscriber</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">User Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option disabled>Select Options</option>
                                                <option value="subscriber" <?php if ($status == "approved" ) echo "selected" ; ?>>Approved</option>
                                                <option value="unapproved" <?php if ($status == "unapproved" ) echo "selected" ; ?>>Unapproved</option>
                                            </select>
                                        </div>
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
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
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
                        }
                    }

                    if (isset($_POST['updateUser'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];
                        $status = $_POST['status'];
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


                        $randSaltQuery = "SELECT rand_salt FROM users";
                        $randSaltResult = mysqli_query($connection, $randSaltQuery) or die('Query Error: '.mysqli_error($connection));
                        $randSaltRow = mysqli_fetch_array($randSaltResult);
                        $salt = $randSaltRow['rand_salt'];
                        $cryptPassword = crypt($password, $salt);




                        $userQuery = "UPDATE users SET ";
                        $userQuery .= "username  = '$username', ";
                        $userQuery .= "first_name = '$firstName', ";
                        $userQuery .= "last_name   = '$lastName', ";
                        $userQuery .= "email= '$email', ";
                        $userQuery .= "password= '$cryptPassword', ";
                        $userQuery .= "photo  = '$photo', ";
                        $userQuery .= "role  = '$role', ";
                        $userQuery .= "status  = '$status', ";
                        $userQuery .= "date   = '$date' ";
                        $userQuery .= "WHERE id = $userID";

                        $updateUser = mysqli_query($connection, $userQuery);

                        confirmQuery($updateUser);

                        echo "<p>User Updated. <a href='../user.php?userID={$userID}'>View User </a> or <a href='users.php'>Edit More Mosers</a></p>";

                    }

                    ?>
                </div>
            </div>
        </div>
    </section>

</div>