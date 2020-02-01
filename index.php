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
                            <li><a href="category.html">News</a></li>
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
                        <li class="breadcrumb-item">Home</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm">
                            <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="post.html">The 11 Biggest Unanswered Questions About Dark Matter</a>
                                    <small class="d-block">By <a href="author.html">Adam Mann</a></small>
                                </p>
                                <p class="card-text small">
                                    Live Science Contributor
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="post.html" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-muted">01/01/2020</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm">
                            <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="post.html">Coronavirus death toll Up To 213: Live updates on 2019-nCoV</a>
                                    <small class="d-block">By: <a href="#">Ana</a></small>
                                </p>
                                <p class="card-text small">
                                    Here's everything you need to know about the new coronavirus from China, including how lethal it is, how you can catch it and what is being done to prevent widespread infections.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="post.html" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-muted">01/01/2020</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>

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
