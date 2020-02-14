<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="users.php?page=view-users">Users</a></li>
                        <li class="breadcrumb-item active">View Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['userID'])) {
        $getUserID = (int)$_GET['userID'];

        $query = "SELECT * FROM users WHERE id = {$getUserID}";
        $result = mysqli_query($connection, $query) or die('Query Error: '.mysqli_error($connection));
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($count > 0) {
            $username   = $row['username'];
            $firstName  = $row['first_name'];
            $lastName   = $row['last_name'];
            $email      = $row['email'];
            $photo      = $row['photo'];
            $role       = $row['role'];
            $status     = $row['status'];
            $date       = $row['date'];

            ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">

                            <div class="card card-widget widget-user">
                                <div class="widget-user-header bg-danger">
                                    <h3 class="widget-user-username"><?php echo $firstName . ' ' . $lastName; ?></h3>
                                    <h5 class="widget-user-desc"><?php echo $username; ?></h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="../uploads/users/<?php echo $photo; ?>" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">0</h5>
                                                <span class="description-text">Posts</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <h5 class="description-header">0</h5>
                                                <span class="description-text">Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Profile Info</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>First Name</td>
                                                <td><?php echo $firstName; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name</td>
                                                <td><?php echo $lastName; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <td>E-Mail</td>
                                                <td><?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <td><?php echo $role; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?php echo $status; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date</td>
                                                <td><?php echo $date; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    } else {
        redirect('users.php');
    }
    ?>

</div>