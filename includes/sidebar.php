<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <ul class="list-unstyled mb-0">
            <?php
            $categoryQuery = "SELECT * FROM categories LIMIT 10";
            $categoryResult = mysqli_query($connection, $categoryQuery) or die('Query Error: '.mysqli_error($connection));
            $categoryCount = mysqli_num_rows($categoryResult);

            if ($categoryCount > 0) {
                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                    $catID = $categoryRow['id'];
                    $catTitle = $categoryRow['title'];
                    ?>
                    <li>
                        <a href="category.php?categoryID=<?php echo $catID; ?>">
                            <?php echo $catTitle; ?>
                        </a>
                    </li>
                    <?php
                }
            } else {
                echo '<li>No categories</li>';
            }
            ?>
        </ul>
    </div>
</div>

<form action="search.php" method="post" class="mb-3">
    <div class="input-group">
        <input type="search" name="search" placeholder="Search keyword" class="form-control py-2">
        <span class="input-group-append">
            <button type="submit" name="submit" class="btn btn-outline-secondary">
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