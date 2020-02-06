<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <a href="javascript:void(0)" class="brand-link navbar-navy text-sm">
        <img src="dist/img/AdminLTELogo.png" alt="CMS" class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light">Content Management System</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/users/levan_eradze.png" class="img-circle elevation-2" alt="Levan Eradze">
            </div>
            <div class="info">
                <a href="edit-my-profile.php" class="d-block">Levan Eradze</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="view-categories.php" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="posts.php?source=view-posts" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="posts.php?source=new-post" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="comments.php?page=comments" class="nav-link">
                        <i class="nav-icon far fa-comments"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fab fa-slideshare"></i>
                        <p>
                            Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="view-slides.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Photos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="new-slide.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Photo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="view-users.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="new-user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New User</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>