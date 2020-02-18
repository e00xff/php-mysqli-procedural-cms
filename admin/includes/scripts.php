<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script>
    // Loader
    var divBox = '<div class="load-screen"><div class="loading"></div></div>';
    $("body").prepend(divBox);
    $(".load-screen").delay(300).fadeOut(200, function () {
        $(this).remove();
    });

    // Online users using ajax
    function loadUsersOnline() {
        $.get("core/functions.php?onlineUsers=result", function (data) {
            $(".users-online").text(data);
        });
    }

    setInterval(function () {
        loadUsersOnline();
    }, 500);
</script>
