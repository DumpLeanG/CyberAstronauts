<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - новости киберспорта</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="new">
            <div class="container new_block">
                <?php
                    $id_new = $_GET['id_new'];
                    $select_new = "SELECT * FROM news WHERE id_new = '$id_new';"; 
                    $new_result = mysqli_query($connect, $select_new) or die(mysqli_error($connect));
                    $new_rows = mysqli_fetch_array($new_result);

                    $arr = [
                        'января',
                        'февраля',
                        'марта',
                        'апреля',
                        'мая',
                        'июня',
                        'июля',
                        'августа',
                        'сентября',
                        'октября',
                        'ноября',
                        'декабря'
                      ];

                    $date = date('n')-1;
                    echo "<h2 class='new_block_title'>".$new_rows['name']."</h2>
                    <img src='".$new_rows['img']."' alt='' class='new_block_img'>
                    <span class='new_block_date'>".date("d ", strtotime($new_rows['date'])).$arr[$date].", ".date("Y ", strtotime($new_rows['date']))."</span>
                    <p class='new_block_txt'>".$new_rows['description']."</p>";
                ?>
                <button class="new_block_btn" onclick='openBookingForm()'>Забронировать</button>
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