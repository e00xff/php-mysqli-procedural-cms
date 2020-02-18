<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 text-sm">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../index.php" class="nav-link">Public</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <?php
            $sessionID = session_id();
            $time = time();
            $timeOutInSeconds = 30;
            $timeOut = $time - $timeOutInSeconds;

            $query = "SELECT * FROM online WHERE usr_session = '{$sessionID}'";
            $result = mysqli_query($connection, $query) or die('Error Query:'.mysqli_error($connection));
            $count = mysqli_num_rows($result);

            if ($count == null) {
                mysqli_query($connection, "INSERT INTO online(usr_session, usr_time) VALUES('$sessionID', '$time')");
            } else {
                mysqli_query($connection, "UPDATE online SET usr_time = '$time' WHERE usr_session = '{$sessionID}'");
            }

            $usersOnline = mysqli_query($connection, "SELECT * FROM online WHERE usr_time > '{$timeOut}'");
            $countUser = mysqli_num_rows($usersOnline);
        ?>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-users"></i>
                <sup><?php echo $countUser; ?></sup>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../includes/logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>