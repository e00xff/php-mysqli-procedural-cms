<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <ul class="list-unstyled mb-0">
            <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $slug = $row['slug'];
                ?>
                <li>
                    <a href="#"><?php echo $title; ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>

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