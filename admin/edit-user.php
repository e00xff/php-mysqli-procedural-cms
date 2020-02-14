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
                    isset($_GET['userID']) ? $getUserID = (int)$_GET['userID'] : redirect('users.php');

                    $query = "SELECT * FROM users WHERE id = {$getUserID}";
                    $result = mysqli_query($connection, $query);
                    confirmQuery($result);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);

                    if ($count > 0) {
                        $dbUsername   = $row['username'];
                        $dbFirstName  = $row['first_name'];
                        $dbLastName   = $row['last_name'];
                        $dbEmail      = $row['email'];
                        $dbPassword   = $row['password'];
                        $dbRole       = $row['role'];
                        $dbStatus     = $row['status'];
                        $dbDate       = date('Y-m-y');
                        $dbPhoto      = $row['photo'];
                        ?>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <form method="post" action="users.php?page=edit-user&userID=<?php echo $getUserID; ?>" enctype="multipart/form-data" role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="role">User Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option disabled>Select Options</option>
                                            <option value="administrator" <?php if ($dbRole == "administrator" ) echo "selected" ; ?>>Administrator</option>
                                            <option value="subscriber" <?php if ($dbRole == "subscriber" ) echo "selected" ; ?>>Subscriber</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">User Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option disabled>Select Options</option>
                                            <option value="subscriber" <?php if ($dbStatus == "approved" ) echo "selected" ; ?>>Approved</option>
                                            <option value="unapproved" <?php if ($dbStatus == "unapproved" ) echo "selected" ; ?>>Unapproved</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $dbFirstName; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $dbLastName; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $dbUsername; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dbEmail; ?>">
                                    </div>
                                    <p>
                                        <img src="<?php echo !empty($dbPhoto) ? '../uploads/users/' . $dbPhoto : 'https://via.placeholder.com/150x50'; ?>" width="80" height="80" alt="">
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

                    if (isset($_POST['updateUser'])) {
                        $frmUsername   = $_POST['username'];
                        $frmPassword   = $_POST['password'];
                        $frmFirstName  = $_POST['firstName'];
                        $frmLastName   = $_POST['lastName'];
                        $frmEmail      = $_POST['email'];
                        $frmRole       = $_POST['role'];
                        $frmStatus     = $_POST['status'];
                        $frmDate       = date('Y-m-y');
                        $frmPhoto      =  $_FILES['photo']['name'];
                        $frmPhotoTemp  =  $_FILES['photo']['tmp_name'];
                        move_uploaded_file($frmPhotoTemp, "../uploads/users/$frmPhoto");

                        if (empty($frmPhoto)) {
                            $query = "SELECT * FROM users WHERE id = {$getUserID} ";
                            $result = mysqli_query($connection, $query);
                            confirmQuery($result);
                            $row = mysqli_fetch_array($result);
                            $dbPhoto = $row['photo'];
                        }

                        if (!empty($frmPassword)) {
                            $query = "SELECT password FROM users WHERE id = {$getUserID}";
                            $result = mysqli_query($connection, $query);
                            confirmQuery($result);

                            $row = mysqli_fetch_assoc($result);
                            $dbPassword = $row['password'];

                            if ($dbPassword != $frmPassword) {
                                $hashedPassword = password_hash($frmPassword, PASSWORD_BCRYPT, ['cost' => 12]);
                            }

                            $query = "UPDATE users SET ";
                            $query .= "username  = '$frmUsername', ";
                            $query .= "first_name = '$frmFirstName', ";
                            $query .= "last_name   = '$frmLastName', ";
                            $query .= "email= '$frmEmail', ";
                            $query .= "password= '$hashedPassword', ";
                            $query .= "photo  = '$frmPhoto', ";
                            $query .= "role  = '$frmRole', ";
                            $query .= "status  = '$frmStatus', ";
                            $query .= "date   = '$frmDate' ";
                            $query .= "WHERE id = $getUserID";

                            $result = mysqli_query($connection, $query);
                            confirmQuery($result);

                            echo "<p>User Updated. <a href='../user.php?userID={$getUserID}'>View User </a> or <a href='users.php'>Edit More</a></p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

</div>