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
                                $userQuery = "SELECT * FROM users";
                                $userResult = mysqli_query($connection, $userQuery) or die('Query Error: '.mysqli_error($connection));
                                $userCount = mysqli_num_rows($userResult);

                                if ($userCount > 0) {
                                    while ($userRow = mysqli_fetch_assoc($userResult)) {
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
                                            <td><?php echo $role; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td class="text-center">
                                                <a href="users.php?page=view-user&userID=1" class="btn btn-info btn-xs btn-flat" title="View User"><i class="far fa-eye"></i></a>
                                                <a href="users.php?page=edit-user&userID=1" class="btn btn-primary btn-xs btn-flat" title="Edit User"><i class="far fa-edit"></i></a>
                                                <a href="users.php?approved=1" class="btn btn-success btn-xs btn-flat" title="Approve User"><i class="fas fa-check"></i></a>
                                                <a href="users.php?unapproved=1" class="btn btn-warning btn-xs btn-flat" title="Unapprove User"><i class="fas fa-ban"></i></a>
                                                <a href="users.php?delete=1" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure you want to delete this record?');" title="Remove User"><i class="far fa-trash-alt"></i></a>
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