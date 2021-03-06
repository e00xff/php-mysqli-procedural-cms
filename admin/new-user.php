<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php?page=view-users">Users</a></li>
                        <li class="breadcrumb-item active">New User</li>
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
                            <h3 class="card-title">New User</h3>
                        </div>
                        <form method="post" action="users.php?page=new-user" enctype="multipart/form-data" role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">User Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option disabled>Select Options</option>
                                        <option value="subscriber">Subscriber</option>
                                        <option value="administrator">Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">User Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option disabled>Select Options</option>
                                        <option value="unapproved">Unapproved</option>
                                        <option value="approved">Approved</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="photo">Photo</label>
                                    <div class="custom-file">
                                        <input type="file" name="photo" id="photo" class="custom-file-input">
                                        <label class="custom-file-label" for="photo">Choose file...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="addUser" class="btn btn-primary btn-sm btn-flat">Add</button>
                                <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        if (isset($_POST['addUser'])) {
                            $role       = mysqli_real_escape_string($connection, $_POST['role']);
                            $status     = mysqli_real_escape_string($connection, $_POST['status']);
                            $firstName  = mysqli_real_escape_string($connection, $_POST['firstName']);
                            $lastName   = mysqli_real_escape_string($connection, $_POST['lastName']);
                            $username   = mysqli_real_escape_string($connection, $_POST['username']);
                            $email      = mysqli_real_escape_string($connection, $_POST['email']);
                            $password   = mysqli_real_escape_string($connection, $_POST['password']);
                            $date       = mysqli_real_escape_string($connection, date('Y-m-d'));

                            $photo = $_FILES['photo']['name'];
                            $photoTemp = $_FILES['photo']['tmp_name'];
                            move_uploaded_file($photoTemp, "../uploads/users/$photo");

                            $hashedPassword   = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

                            if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email) && !empty($password)) {

                                $userQuery = "INSERT INTO `users` ( `username`, `password`, `first_name`, `last_name`, `email`, `photo`, `role`, `status`, `date`)  ";
                                $userQuery .= "VALUES ('$username', '$hashedPassword', '$firstName', '$lastName', '$email', '$photo', '$role', '$status', '$date')";


                                $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));
                                if ($userResult) {
                                    echo '<p>User inserted, <a href="users.php?page=view-users">view user</a></p>';
                                } else {
                                    echo '<p>Fields cannot be empty.</p>';
                                }

                            } else {
                                echo '<p>Fields are required.</p>';
                            }

                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

</div>