<?php

function confirmQuery($result) {
    global $connection;

    if(!$result):
        die('Query Failed: '.mysqli_error($connection));
    endif;
}

function recordCount($query) {
    global $connection;

    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    confirmQuery($result);
    return $count;
}

?>