<?php include 'core/init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main role="main" class="wrapper">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        Contact
                    </div>
                    <div class="card-body">

                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Send</button>
                        </form>

                        <?php

                        if (isset($_POST['submit'])) {

                            $to = "info@company.com";
                            $subject = wordwrap($_POST['subject'], 70);
                            $message = wordwrap($_POST['message'], 150);
                            $header = "From ".$_POST['email'];

                            mail($to, $subject, $message, $header);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
