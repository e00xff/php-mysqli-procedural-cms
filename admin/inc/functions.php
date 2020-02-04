<?php

function confirmQuery($result) {
    global $connection;
    if (!$result) {
        die('Query Failed: ' . mysqli_error($connection));
    }
}

/*******************************************
 * Categories
 *******************************************/
function getAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query) or die('Query Failed: ' . mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryID = $row['id'];
            $categoryTitle = $row['title'];
            $categorySlug = $row['slug'];
            ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?php echo $categoryTitle; ?></td>
                <td><?php echo $categorySlug; ?></td>
                <td class="text-center">
                    <a href="view-categories.php?edit=<?php echo $categoryID; ?>" class="btn btn-primary btn-xs btn-flat">Edit</a>
                    <a href="view-categories.php?delete=<?php echo $categoryID; ?>" class="btn btn-danger btn-xs btn-flat">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="4">No records found</td>
        </tr>
        <?php
    }

}

function insertCategories() {
    global $connection;

    if (isset($_POST['addCategory'])) {
        $categoryTitle = $_POST['title'];
        $categorySlug = $_POST['slug'];

        if (!empty($categoryTitle) && !empty($categorySlug)) {
            $query = "INSERT INTO categories(title, slug) VALUES('$categoryTitle','$categorySlug')";
            $result = mysqli_query($connection, $query) or die('Query Failed: '.mysqli_error($connection));
        } else {
            echo "<p>This field should not be empty.</p>";
        }
    }
}

function editCategory() {
    if (isset($_GET['edit'])) {
        global $connection;

        $categoryID = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE id = {$categoryID}";
        $result = mysqli_query($connection, $query) or die('Query Failed: ' . mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="#" role="form">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" name="title" value="<?php if(isset($row['title'])) { echo $row['title']; } ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="updateCategory" class="btn btn-primary btn-sm btn-flat">Update</button>
                </div>
            </div>
        </form>
        <?php

        if (isset($_POST['updateCategory'])) {
            $title = $_POST['title'];

            $query = "UPDATE categories SET title='$title' WHERE id={$categoryID}";
            $result = mysqli_query($connection, $query) or die('Query Failed: ' . mysqli_error($connection));

            header("Location: view-categories.php");
        }
    }
}

function deleteCategories() {
    global $connection;

    if (isset($_GET['delete'])) {
        $categoryID = $_GET['delete'];

        $query = "DELETE FROM categories WHERE id = {$categoryID}";
        $result = mysqli_query($connection, $query) or die('Query Failed: ' . mysqli_error($connection));

        header("Location: view-categories.php");
    }
}



?>