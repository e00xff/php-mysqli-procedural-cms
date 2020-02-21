<?php

function confirmQuery($result) {
    global $connection;

    if(!$result):
        die('Query Failed: '.mysqli_error($connection));
    endif;
}

function recordCount($table) {
    global $connection;

    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    confirmQuery($result);
    return $count;
}

function checkStatus($table, $column, $status) {
    global $connection;

    $query = "SELECT * FROM {$table} WHERE {$column} = '$status'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    confirmQuery($result);
    return $count;
}

function checkUserRole($table, $column, $role) {
    global $connection;

    $query = "SELECT * FROM {$table} WHERE {$column} = '$role'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    confirmQuery($result);
    return $count;
}

?>