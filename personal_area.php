<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - личный кабинет</title>
</head>
<body>
    <script src="assets/js/personal_area.js"></script>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="personal_area">
            <div class="container personal_area_block">
                <h2 class="personal_area_block_title">Личный кабинет</h2>
                <ul class="personal_area_block_list">
                    <span class="personal_area_block_list_item personal_area_block_list_current_item" id="personal_form" onclick="openForm()">Профиль</span>
                    <span class="personal_area_block_list_item" onclick="openBookings()" id="personal_bookings">Бронирования</span> 
                </ul>
                <form action="php-handler/personal_edit.php" class="personal_area_block_form" method="post">
                    <h3 class="personal_area_block_form_title">Персональные данные</h3>
                    <span class="personal_area_block_form_txt">Эти данные необходимы, чтобы автоматически заполнять соответствующие поля и ускорять процесс бронирования</span>
                    <div class="personal_area_block_form_block">
                        <input type="text" class="personal_area_block_form_block_input" name="second_name" value="<?php echo $_SESSION['second_name'] ?>" required placeholder="Фамилия">
                        <input type="text" class="personal_area_block_form_block_input" name="first_name" value="<?php echo $_SESSION['first_name'] ?>" required placeholder="Имя">
                        <input type="text" class="personal_area_block_form_block_input" name="patronymic" value="<?php echo $_SESSION['patronymic'] ?>" required placeholder="Отчество">
                        <input type="text" class="personal_area_block_form_block_input" name="birthday" value="<?php echo $_SESSION['birthday'] ?>" required placeholder="Дата рождения" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                        <input type="email" class="personal_area_block_form_block_input" name="email_address" value="<?php echo $_SESSION['email_address'] ?>" required placeholder="Электронный адрес">
                        <input type="tel" class="personal_area_block_form_block_input" name="phone_number" value="<?php echo $_SESSION['phone_number'] ?>" required placeholder="Номер телефона">
                        <button class="personal_area_block_form_block_btn" type="submit">Сохранить</button>
                    </div>
                </form>
                <div class="personal_area_block_bookings">
                    <h3 class="personal_area_block_bookings_title">Ваши бронирования</h3>
                    <span class="personal_area_block_bookings_txt">Здесь вы можете посмотреть все свои бронирования в нашем компьютерном клубе</span>
                    <?php
                        $id_user = $_SESSION['id_user'];
                        $select_info = "SELECT * FROM bookings WHERE id_user = '$id_user';"; 
                        $info_result = mysqli_query($connect, $select_info) or die(mysqli_error($connect));
                        while ($info_row = mysqli_fetch_assoc($info_result)) {
                            $info_array[] = $info_row;
                        }
                    ?>
                    <table class='personal_area_block_bookings_table'>
                        <tr class='personal_area_block_bookings_table_row_title'>
                            <th class='personal_area_block_bookings_table_row_title_cell'>
                                <span class='personal_area_block_bookings_table_row_title_cell_txt'>Дата</span>
                            </th>
                            <th class='personal_area_block_bookings_table_row_title_cell'>
                                <span class='personal_area_block_bookings_table_row_title_cell_txt'>Время начала</span>
                            </th>
                            <th class='personal_area_block_bookings_table_row_title_cell'>
                                <span class='personal_area_block_bookings_table_row_title_cell_txt'>Время окончания</span>
                            </th>
                            <th class='personal_area_block_bookings_table_row_title_cell'>
                                <span class='personal_area_block_bookings_table_row_title_cell_txt'>Место</span>
                            </th>
                        </tr>
                        <?php
                            if (isset($info_array)) {
                                foreach ($info_array as $array){
                                    echo"<tr class='personal_area_block_bookings_table_row'>
                                        <td class='personal_area_block_bookings_table_row_cell'>
                                            <span class='personal_area_block_bookings_table_row_cell_txt'>".$array['date']."</span>
                                        </td>
                                        <td class='personal_area_block_bookings_table_row_cell'>
                                            <span class='personal_area_block_bookings_table_row_cell_txt'>".$array['start_time']."</span>
                                        </td>
                                        <td class='personal_area_block_bookings_table_row_cell'>
                                            <span class='personal_area_block_bookings_table_row_cell_txt'>".$array['end_time']."</span>
                                        </td>
                                        <td class='personal_area_block_bookings_table_row_cell'>
                                            <span class='personal_area_block_bookings_table_row_cell_txt'>".$array['id_place']."</span>
                                        </td>
                                    <tr>";
                                }
                            }
                        ?>
                    </table>
                </div>
                <a class="personal_area_block_exit" href="php-handler/session_exit.php">Выйти</a>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/booking_form.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
</body>
</html>