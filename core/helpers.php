<?php
function kill() {
    session_destroy();
    die();
}

function stop() {
    die();
}

function dd($value) {
    var_dump($value);
    die();
}

function redirect($value) {
    header("Location: $value");
    die();
}

function redirect2($filename) {
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

?>