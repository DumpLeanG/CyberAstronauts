<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - компьютерный клуб, акции, скидки</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="discount">
            <div class="container discount_block">
                <?php
                    $id_discount = $_GET['id_discount'];
                    $select_discount = "SELECT * FROM discounts WHERE id_discount = '$id_discount';"; 
                    $discount_result = mysqli_query($connect, $select_discount) or die(mysqli_error($connect));
                    $discount_rows = mysqli_fetch_array($discount_result);

                    $start_date = date("d.m.Y", strtotime($discount_rows['start_date']));
                    $end_date = date("d.m.Y", strtotime($discount_rows['end_date']));

                    echo "<h2 class='discount_block_title'>".$discount_rows['name']."</h2>
                    <img src='".$discount_rows['img']."' alt='' class='discount_block_img'>
                    <span class='discount_block_date'>Срок действия: с ".$start_date." до ".$end_date."</span>
                    <p class='discount_block_txt'>".$discount_rows['description']."</p>";
                ?>
                <button class="discount_block_btn" onclick='openBookingForm()'>Забронировать</button>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/booking_form.php";
    ?>
</body>
</html>