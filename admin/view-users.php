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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">

                    <div class="card card-danger">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <select name="bulk" id="bulk" class="form-control custom-file-label custom-select">
                                        <option selected disabled>- Bulk Options -</option>
                                        <option value="granted">Granted</option>
                                        <option value="denied">Denied</option>
                                        <option value="delete">Delete</option>
                                        <option value="clone">Clone</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Apply</button>
                        </div>
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Users List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm projects mb-0">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th>Photo</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>E-Mail</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $authUserID = $_SESSION['id'];
                                $userQuery = "SELECT * FROM users WHERE id <> {$authUserID} ORDER BY id DESC";
                                $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));
                                $userCount = mysqli_num_rows($userResult);

                                if ($userCount > 0) {

                                    while ($userRow = mysqli_fetch_assoc($userResult)) {
                                        $userID = $userRow['id'];
                                        $photo = !empty($userRow['photo']) ? '../uploads/users/'.$userRow['photo'] : 'https://via.placeholder.com/150x50';
                                        $username = $userRow['username'];
                                        $firstName = $userRow['first_name'];
                                        $lastName = $userRow['last_name'];
                                        $email = $userRow['email'];
                                        $status = $userRow['status'];
                                        $role = $userRow['role'];
                                        $date = $userRow['date'];
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img class="table-avatar" src="<?php echo $photo; ?>" alt="<?php echo $firstName . ' ' . $lastName; ?>" width="40" height="40"></td>
                                            <td><?php echo $firstName; ?></td>
                                            <td><?php echo $lastName; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><span class="badge <?php echo $status == 'approved' ? 'badge-success' : 'badge-warning'; ?>"><?php echo ucfirst($status); ?></span></td>
                                            <td><span class="badge <?php echo $role == 'administrator' ? 'bg-gray' : 'bg-light'; ?>"><?php echo ucfirst($role); ?></span></td>
                                            <td><?php echo $date; ?></td>
                                            <td class="text-center">
                                                <a href="users.php?page=view-user&userID=<?php echo $userID ?>" class="btn btn-info btn-xs btn-flat" title="View User"><i class="far fa-eye"></i></a>
                                                <a href="users.php?page=edit-user&userID=<?php echo $userID ?>" class="btn btn-primary btn-xs btn-flat" title="Edit User"><i class="far fa-edit"></i></a>

                                                <a href="users.php?changeToAdm=<?php echo $userID ?>" class="btn btn-secondary btn-xs btn-flat <?php echo $role == 'administrator' ? 'disabled' : ''; ?>" title="Change to admin"><i class="fas fa-user-astronaut"></i></a>
                                                <a href="users.php?changeToSub=<?php echo $userID ?>" class="btn btn-secondary btn-xs btn-flat <?php echo $role == 'subscriber' ? 'disabled' : ''; ?>" title="Change to subscriber"><i class="fas fa-user-alt"></i></a>

                                                <a href="users.php?approved=<?php echo $userID ?>" class="btn btn-success btn-xs btn-flat <?php echo $status == 'approved' ? 'disabled' : ''; ?>" title="Approve User"><i class="fas fa-check"></i></a>
                                                <a href="users.php?unapproved=<?php echo $userID ?>" class="btn btn-warning btn-xs btn-flat <?php echo $status == 'unapproved' ? 'disabled' : ''; ?>" title="Unapprove User"><i class="fas fa-ban"></i></a>

                                                <a href="users.php?delete=<?php echo $userID ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure you want to delete this record?');" title="Remove User"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <tr>
                                            <td colspan="10">No records found</td>
                                        </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="users.php?page=new-user" class="btn btn-success btn-sm btn-flat">New User</a>
                        </div>
                    </div>

                    <?php

                    if (isset($_GET['changeToAdm'])) {
                        $userID = $_GET['changeToAdm'];

                        $userQuery = "UPDATE `users` SET `role` = 'administrator' WHERE `users`.`id` = {$userID}";
                        $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($userResult) {
                            redirect('users.php');
                        }
                    }

                    if (isset($_GET['changeToSub'])) {
                        $userID = $_GET['changeToSub'];

                        $userQuery = "UPDATE `users` SET `role` = 'subscriber' WHERE `users`.`id` = {$userID}";
                        $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($userResult) {
                            redirect('users.php');
                        }
                    }

                    if (isset($_GET['approved'])) {
                        $userID = $_GET['approved'];

                        $userQuery = "UPDATE `users` SET `status` = 'approved' WHERE `users`.`id` = {$userID}";
                        $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($userResult) {
                            redirect('users.php');
                        }
                    }

                    if (isset($_GET['unapproved'])) {
                        $userID = $_GET['unapproved'];

                        $userQuery = "UPDATE `users` SET `status` = 'unapproved' WHERE `users`.`id` = {$userID}";
                        $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));

                        if ($userResult) {
                            redirect('users.php');
                        }
                    }

                    if (isset($_GET['delete'])) {
                        $userID = mysqli_real_escape_string($connection, $_GET['delete']);

                        // Step 1: Delete post related comment
                        $postQuery = "SELECT * FROM posts";
                        $postResult = mysqli_query($connection, $postQuery) or die('Query Error: '.mysqli_error($connection));
                        $postRow = mysqli_fetch_assoc($postResult);
                        $postID = $postRow['id'];

                        $postRelatedCommentQuery = "DELETE FROM comments WHERE post_id = {$postID}";
                        $postRelatedCommentResult = mysqli_query($connection, $postRelatedCommentQuery) or die('Query Error: '.mysqli_error($connection));

                        // Step 2: Delete user related post
                        $userPostQuery = "DELETE FROM posts WHERE author_id = {$userID}";
                        $userPostResult = mysqli_query($connection, $userPostQuery) or die('Query Error: '.mysqli_error($connection));

                        // Step 3: Delete user account
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'administrator') {

                            $userQuery = "DELETE FROM users WHERE id = {$userID}";
                            $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));
                            if ($userResult) {
                                redirect('users.php');
                            }
                        }
                    }

                    ?>

                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>

</div>