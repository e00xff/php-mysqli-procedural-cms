<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PHP Procedural CMS with MySQLi">
    <meta name="author" content="e00xff">
    <title>CMS - Content Management System</title>

    <link rel="icon" type="image/png" href="dist/img/favicon.png">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-danger fixed-top">
        <a class="navbar-brand" href="index.html">CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(Current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="registration.html">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main role="main" class="wrapper">
    <section class="container">
        <div class="row">
            <div class="col-md-3">

                <form method="get" action="search.html" class="mb-3">
                    <div class="input-group">
                        <input class="form-control py-2" type="search" id="search-input" placeholder="Search article">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">News</a></li>
                            <li><a href="#">Health</a></li>
                            <li><a href="#">Planet Earth</a></li>
                            <li><a href="#">Strange News</a></li>
                            <li><a href="#">Space & Physics</a></li>
                            <li><a href="#">Animals</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Culture</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-header">Recent Posts</div>
                    <table class="table table-hover table-sm mb-0">
                        <tbody>
                        <tr>
                            <td style="width: 50px"><img src="https://via.placeholder.com/25" alt=""></td>
                            <td>
                                <a href="#"><small>Post 1</small></a>
                                <small class="d-block">By: Author</small>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/25" alt=""></td>
                            <td>
                                <a href="#"><small>Post 2</small></a>
                                <small class="d-block">By: Author</small>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-9">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.html">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">The 11 Biggest Unanswered Questions About Dark Matter</li>
                    </ol>
                </nav>

                <div class="card mb-3 shadow-sm">
                    <img class="card-img-top" src="//placehold.it/1000x250" alt="">
                    <div class="card-body">
                        <h5 class="card-text">The 11 Biggest Unanswered Questions About Dark Matter</h5>
                        <hr>

                        <ul class="list-unstyled">
                            <li><strong>Date:</strong> 23/01/2020</li>
                            <li><strong>Category:</strong> News</li>
                            <li><strong>Author:</strong> <a href="author.html">Adam Mann</a></li>
                        </ul>

                        <p>
                            In the 1930s, a Swiss astronomer named Fritz Zwicky noticed that galaxies in a distant cluster were orbiting one another much faster than they should have been given the amount of visible mass they had. He proposed than an unseen substance, which he called dark matter, might be tugging gravitationally on these galaxies.
                        </p>

                        <p>
                            Since then, researchers have confirmed that this mysterious material can be found throughout the cosmos, and that it is six times more abundant than the normal matter that makes up ordinary things like stars and people. Yet despite seeing dark matter throughout the universe, scientists are mostly still scratching their heads over it. Here are the 11 biggest unanswered questions about dark matter.
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-info">Post a comment</a>
                            </div>
                            <small class="text-muted">Views 55</small>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Your comment
                    </div>
                    <div class="card-body">

                        <div class="alert alert-primary" role="alert">
                            Message
                        </div>

                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Your comment
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td style="width: 100px;">
                                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                                    </td>
                                    <td>
                                        <div class="title h6">
                                            <a href="#"><b>John Smith</b></a>
                                            made a post.
                                        </div>
                                        <h6 class="text-muted time small">1 minute ago</h6>

                                        <p class="small">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus ducimus eos iure reiciendis totam veniam.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<footer>
    <div class="text-muted text-center">
        <small>&copy; 2020 All Rights Reserved.</small>
    </div>
</footer>

<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
