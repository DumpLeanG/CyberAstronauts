<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - компьютерный клуб рядом в москве, контакты, адрес</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="map">
            <div class="map_box">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6c21722e56b8b2c0b22a4c5d7ab9558b101ef03e9e2ea88557a761de7dffec6b&amp;width=100%25&amp;height=600&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <img src="assets/images/border.svg" alt="" class="map_border_top">
        </section>
        <section class="contacts">
            <div class="container contacts_block">
                <div class="contacts_block_top">
                    <span class="contacts_block_top_pretitle">СВЯЖИТЕСЬ С НАМИ!</span>
                    <h2 class="contacts_block_top_title">Контактная информация</h2>
                </div>
                <div class="contacts_block_bottom">
                    <div class="contacts_block_bottom_left">
                        <p class="contacts_block_bottom_left_txt">Если у вас возникли вопросы или предложения, не стесняйтесь связаться с нами. Мы доступны для общения и помощи по любым вопросам. Для связи с нами, пожалуйста, используйте следующие контактные данные:</p>
                        <ul class="contacts_block_bottom_left_list">
                            <li class="contacts_block_bottom_left_list_item">
                                <div class="contacts_block_bottom_left_list_item_image">
                                    <img src="assets/images/map.svg" alt="компьютерный клуб адрес" class="contacts_block_bottom_left_list_item_img">
                                </div>
                                <div class="contacts_block_bottom_left_list_item_text">
                                    <span class="contacts_block_bottom_left_list_item_text_title">Наш адрес:</span>
                                    <span class="contacts_block_bottom_left_list_item_text_txt">г. Москва, ул. Профсоюзная, д. 5/9</span>
                                </div>
                            </li>
                            <li class="contacts_block_bottom_left_list_item">
                                <div class="contacts_block_bottom_left_list_item_image">
                                    <img src="assets/images/phone.svg" alt="компьютерный клуб телефон" class="contacts_block_bottom_left_list_item_img">
                                </div>
                                <div class="contacts_block_bottom_left_list_item_text">
                                    <span class="contacts_block_bottom_left_list_item_text_title">номер телефона:</span>
                                    <span class="contacts_block_bottom_left_list_item_text_txt">8 (968) 785-01-01</span>
                                </div>
                            </li>
                            <li class="contacts_block_bottom_left_list_item">
                                <div class="contacts_block_bottom_left_list_item_image">
                                    <img src="assets/images/mail.svg" alt="компьютерный клуб почта" class="contacts_block_bottom_left_list_item_img">
                                </div>
                                <div class="contacts_block_bottom_left_list_item_text">
                                    <span class="contacts_block_bottom_left_list_item_text_title">Электронная почта:</span>
                                    <span class="contacts_block_bottom_left_list_item_text_txt">info@ca.ru</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="contacts_block_bottom_right">
                        <form action="php-handler/mail.php" class="contacts_block_bottom_right_form" method="post">
                            <?php 
                                if(isset($_SESSION['id_user'])) {
                                    $id_user = $_SESSION['id_user'];
                                    $select_user = "SELECT * FROM `users` WHERE `id_user` = '$id_user'";
                                    $result = mysqli_query($connect, $select_user);
                                    $info_user = mysqli_fetch_array($result);

                                    echo "<div class='contacts_block_bottom_right_form_inputs'>
                                        <input type='text' name='contact_name' class='contacts_block_bottom_right_form_inputs_input' placeholder='Ваше имя' required value='".$info_user['first_name']."'>
                                        <input type='tel' name='contact_phone' class='contacts_block_bottom_right_form_inputs_input' placeholder='Номер телефона' required value='".$info_user['phone_number']."'>
                                    </div>
                                    <input type='email' name='contact_email' class='contacts_block_bottom_right_form_input' placeholder='Электронный адрес' required value='".$info_user['email_address']."'> ";
                                } else {
                                    echo "<div class='contacts_block_bottom_right_form_inputs'>
                                        <input type='text' name='contact_name' class='contacts_block_bottom_right_form_inputs_input' placeholder='Ваше имя' required>
                                        <input type='tel' name='contact_phone' class='contacts_block_bottom_right_form_inputs_input' placeholder='Номер телефона' required>
                                    </div>
                                    <input type='email' name='contact_email' class='contacts_block_bottom_right_form_input' placeholder='Электронный адрес' required> ";
                                }
                            ?>
                            <textarea class="contacts_block_bottom_right_form_textarea" name="contact_text" placeholder="Сообщение" required></textarea>
                            <button class="contacts_block_bottom_right_form_btn" type="submit">Отправить сообщение</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
    ?>
</body>
</html>