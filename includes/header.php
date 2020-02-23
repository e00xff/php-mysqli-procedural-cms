<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Blog <span class="sr-only">(Current)</span></a>
                </li>
                <?php if (isset($_SESSION['role'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin">Admin</a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item <?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'registration.php' ? 'active' : ''; ?>" href="registration.php">Registration</a>
                </li>
                <?php
                if (!isset($_SESSION['role'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
                            <a class="dropdown-item" href="admin">Dashboard</a>
                            <a class="dropdown-item" href="admin/edit-my-profile.php">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="includes/logout.php">Log out</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        English-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">-->
<!--                        <a class="dropdown-item active" href="?lang=en">English</a>-->
<!--                        <a class="dropdown-item" href="?lang=ru">Russian</a>-->
<!--                    </div>-->
<!--                </li>-->
            </ul>

            <form method="get" id="langFrm" action="" class="form-inline mt-2 mt-md-0">
                <select name="lang" class="form-control input-sm mr-sm-2" onchange="changeLanguage()">
                    <option value="en" <?php echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'selected' : '' ?>>English</option>
                    <option value="ru" <?php echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru' ? 'selected' : '' ?>>Russian</option>
                </select>
            </form>
        </div>
    </nav>
</header>