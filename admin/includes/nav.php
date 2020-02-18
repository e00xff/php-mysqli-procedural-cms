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
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-users"></i>
                <sup><?php echo usersOnline(); ?></sup>
                <sup><span class="users-online"></span></sup>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../includes/logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>