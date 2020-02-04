<?php

function getAllCategories() {
    global $connection;

    $categoryQuery = "SELECT * FROM categories";
    $categoryResult = mysqli_query($connection, $categoryQuery);
    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
        ?>
        <tr>
            <td><input type="checkbox"></td>
            <td><?php echo $categoryRow['title']; ?></td>
            <td><?php echo $categoryRow['slug']; ?></td>
            <td class="text-center">
                <a href="view-categories.php?edit=<?php echo $categoryRow['id']; ?>" class="btn btn-primary btn-xs btn-flat">Edit</a>
                <a href="view-categories.php?delete=<?php echo $categoryRow['id']; ?>" class="btn btn-danger btn-xs btn-flat">Delete</a>
            </td>
        </tr>
        <?php
    }
}

function insertCategories() {
    global $connection;

    if (isset($_POST['addCategory'])) {

        $categoryTitle = $_POST['title'];
        $categorySlug = $_POST['slug'];

        if (empty($categoryTitle) && empty($categorySlug)) {
            echo "<p>This field should not be empty</p>";
        } else {
            $addCategoryQuery = "INSERT INTO categories(title, slug) VALUES('$categoryTitle','$categorySlug')";
            $addCategoryResult = mysqli_query($connection, $addCategoryQuery);

            if (!$addCategoryResult) {
                die('Query Failed: ' . mysqli_error($connection));
            }
        }

    }
}

function editCategory() {
    if (isset($_GET['edit'])) {
        global $connection;

        $categoryID = $_GET['edit'];

        $selectQuery = "SELECT * FROM categories WHERE id = {$categoryID}";
        $selectResult = mysqli_query($connection, $selectQuery);
        $selectRow = mysqli_fetch_assoc($selectResult);
        ?>
        <form method="post" action="#" role="form">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" name="title" value="<?php if(isset($selectRow['title'])) { echo $selectRow['title']; } ?>">
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

            $updateQuery = "UPDATE categories SET title='$title' ";
            $updateQuery .= "WHERE id={$categoryID}";
            $updateResult = mysqli_query($connection, $updateQuery);

            if (!$updateResult) {
                die('Query Failed: ' . mysqli_error($connection));
            } else {
                header("Location: view-categories.php");
            }
        }
    }
}

function deleteCategories() {
    global $connection;

    if (isset($_GET['delete'])) {
        $categoryID = $_GET['delete'];

        $deleteQuery = "DELETE FROM categories WHERE id = {$categoryID}";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult) {
            header("Location: view-categories.php");
        } else {
            die('Query Failed: ' . mysqli_error($connection));
        }
    }
}

?>