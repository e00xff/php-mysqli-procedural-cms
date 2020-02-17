<footer>
    <div class="text-muted text-center">
        <small>&copy; 2020 All Rights Reserved.</small>
    </div>
</footer>

<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>

<script>
    var divBox = '<div class="load-screen"><div class="loading"></div></div>';
    $("body").prepend(divBox);
    $(".load-screen").delay(300).fadeOut(200, function () {
        $(this).remove();
    });
</script>