<?php header("HTTP/1.0 404 Not Found"); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - 404</title>
</head>
<body>
<?php
    session_start();
    include "php-connect/connect.php";
    include "php-handler/header.php";
?>
    <main>
        <section class="not_found">
            <div class="container not_found_block">
                <span class="not_found_block_txt">404 Not Found</span>
            </div>
        </section>
    </main>
<?php
    include "php-handler/footer.php";
    include "php-handler/login_form.php";
    include "php-handler/register_form.php";

?>
</body>