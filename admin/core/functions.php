<?php

function escape($str) {
    global $connection;

    $string = trim($str);
    return mysqli_real_escape_string($connection, $string);
}

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function usersOnline () {
    if (isset($_GET['onlineUsers'])) {
        global $connection;

        if (!$connection) {
            session_start();
            include 'database.php';

            $sessionID = session_id();
            $time = time();
            $timeOutInSeconds = 30;
            $timeOut = $time - $timeOutInSeconds;

            $query = "SELECT * FROM online WHERE usr_session = '{$sessionID}'";
            $result = mysqli_query($connection, $query) or die('Error Query:'.mysqli_error($connection));
            $count = mysqli_num_rows($result);

            if ($count == null) :
                mysqli_query($connection, "INSERT INTO online(usr_session, usr_time) VALUES('$sessionID', '$time')");
            else:
                mysqli_query($connection, "UPDATE online SET usr_time = '$time' WHERE usr_session = '{$sessionID}'");
            endif;

            $usersOnlineQuery = mysqli_query($connection, "SELECT * FROM online WHERE usr_time > '{$timeOut}'");
            echo $countUser = mysqli_num_rows($usersOnlineQuery);
        }
    }
}

usersOnline();


//function usersOnline () {
//    global $connection;
//
//    $sessionID = session_id();
//    $time = time();
//    $timeOutInSeconds = 30;
//    $timeOut = $time - $timeOutInSeconds;
//
//    $query = "SELECT * FROM online WHERE usr_session = '{$sessionID}'";
//    $result = mysqli_query($connection, $query) or die('Error Query:'.mysqli_error($connection));
//    $count = mysqli_num_rows($result);
//
//    if ($count == null) :
//        mysqli_query($connection, "INSERT INTO online(usr_session, usr_time) VALUES('$sessionID', '$time')");
//    else:
//        mysqli_query($connection, "UPDATE online SET usr_time = '$time' WHERE usr_session = '{$sessionID}'");
//    endif;
//
//    $usersOnlineQuery = mysqli_query($connection, "SELECT * FROM online WHERE usr_time > '{$timeOut}'");
//    return mysqli_num_rows($usersOnlineQuery);
//}








function isAdmin($username)
{
    global $conn;
    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    confirm($result);
    $row = mysqli_fetch_array($result);
    if (!isset($row['user_role'])) {
        return false;
    } else if ($row['user_role'] == 'admin') {
        return true;
    } else {
        return false;
    }
}


function redirect($filename) {
    if (!headers_sent())
        header('Location: '.$filename);
    else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$filename.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
        echo '</noscript>';
    }
}

function shorten_text($text, $max_length = 140, $cut_off = '...', $keep_word = false)
{
    if(strlen($text) <= $max_length) {
        return $text;
    }

    if(strlen($text) > $max_length) {
        if($keep_word) {
            $text = substr($text, 0, $max_length + 1);

            if($last_space = strrpos($text, ' ')) {
                $text = substr($text, 0, $last_space);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        } else {
            $text = substr($text, 0, $max_length);
            $text = rtrim($text);
            $text .=  $cut_off;
        }
    }

    return $text;
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
                    <a href="view-categories.php?edit=<?php echo $categoryID; ?>" class="btn btn-primary btn-xs btn-flat" title="Edit title"><i class="far fa-edit"></i></a>
                    <a href="view-categories.php?delete=<?php echo $categoryID; ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('Are you sure you want to delete this record?');" title="Remove category"><i class="far fa-trash-alt"></i></a>
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

        // step1: Delete post related comment
        $postCommentsQuery = "DELETE FROM comments WHERE post_id = {$categoryID}";
        $postCommentsResult = mysqli_query($connection, $postCommentsQuery) or die('Query Error: '.mysqli_error($connection));

        // step2: Delete post related category
        $postCategoryQuery = "DELETE FROM posts WHERE category_id = {$categoryID}";
        $postCategoryResult = mysqli_query($connection, $postCategoryQuery) or die('Query Error: '.mysqli_error($connection));

        // step3: Delete category
        $categoryQuery = "DELETE FROM categories WHERE id = {$categoryID}";
        $categoryResult = mysqli_query($connection, $categoryQuery) or die('Query Failed: ' . mysqli_error($connection));

        header("Location: view-categories.php");
    }
}





function emailExist($email) {
    global $connection;
    $query = "SELECT email FROM users WHERE email = '$email' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function ifItIsMethod($method = null) {
    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
        return true;
    }
    return false;
}


?>