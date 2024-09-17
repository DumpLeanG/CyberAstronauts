<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - панель администратора</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";

        if (isset($_SESSION['id_employee'])) {
            $IDemployee = $_SESSION['id_employee'];
            if ($IDemployee === '') {
                unset($IDemployee);
            }

        include "php-handler/admin_header.php";
    ?>
    <main>
        <section class="admin_section">
            <div class="container admin_section_block">
                <ul class="admin_section_block_list">
                    <?php
                    if($_SESSION['id_position'] == '2') {
                        $show_tables = "SHOW FULL TABLES FROM cyberastronauts WHERE Table_Type != 'VIEW' and (Tables_in_cyberastronauts = 'discounts' or Tables_in_cyberastronauts = 'news' or Tables_in_cyberastronauts = 'tournaments' or Tables_in_cyberastronauts = 'halls' or Tables_in_cyberastronauts = 'rental_tariffs' or Tables_in_cyberastronauts = 'games' or Tables_in_cyberastronauts = 'genres' or Tables_in_cyberastronauts = 'devices')";
                    } else if($_SESSION['id_position'] == '3') {
                        $show_tables = "SHOW FULL TABLES FROM cyberastronauts WHERE Table_Type != 'VIEW' and (Tables_in_cyberastronauts != 'employees' and Tables_in_cyberastronauts != 'positions')";
                    } else {
                        $show_tables = "SHOW FULL TABLES FROM cyberastronauts WHERE Table_Type != 'VIEW'"; 
                    }
                        $tables_result = mysqli_query($connect, $show_tables) or die(mysqli_error($connect));
                        while ($tables_row = mysqli_fetch_assoc($tables_result)) {
                            $tables_array[] = $tables_row;
                        } 
                        foreach ($tables_array as $array){
                            if ($array['Tables_in_cyberastronauts'] == 'employees') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Сотрудники</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Сотрудники</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'users') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Пользователи</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Пользователи</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'bookings') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Бронирования</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Бронирования</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'discounts') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Акции</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Акции</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'news') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Новости</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Новости</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'rentals') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Аренда</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Аренда</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'rental_tariffs') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Тарифы аренды</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Тарифы аренды</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'tournaments') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Турниры</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Турниры</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'tournament_participants') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Участники турниров</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Участники турниров</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'halls') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Залы</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Залы</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'devices') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Устройства</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Устройства</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'places') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Места</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Места</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'games') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Игры</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Игры</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'genres') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Жанры</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Жанры</a></li>";
                                }
                            } elseif ($array['Tables_in_cyberastronauts'] == 'positions') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_cyberastronauts']) {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link admin_section_block_list_item_current_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Должности</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_cyberastronauts']."'>Должности</a></li>";
                                }
                            }
                        }
                    ?>
                </ul>
                <div class="admin_section_block_bottom">
                        <?php
                            if (isset($_GET['table_name'])) {
                                echo "<table class='admin_section_block_bottom_table'>
                                    <tr class='admin_section_block_bottom_table_row_title'>";
                                $table_name = $_GET['table_name'];
                                $show_columns = "SHOW COLUMNS FROM $table_name;"; 
                                $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                                while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                                    $columns_array[] = $columns_row;
                                } 
                                $index_col = 0;
                                $col_array = array();
                                foreach ($columns_array as $array){
                                    if($array['Field'] === 'img') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Изображение</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'second_name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Фамилия</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'first_name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Имя</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'patronymic') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Отчество</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'phone_number') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Номер телефона</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'email_address') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Электронный адрес</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'birthday') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата рождения</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'password') {
                                        if($_SESSION['id_position'] == '3') {

                                        } else {
                                            echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                                <span class='admin_section_block_bottom_table_row_title_cell_txt'>Пароль</span>
                                            </th>";
                                        }
                                    } elseif ($array['Field'] === 'id_user') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Пользователь</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_device') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Устройство</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'gpu') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Видеокарта</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'cpu') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Процессор</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'display') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дисплей</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'headset') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Гарнитура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'mouse') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Мышь</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'keyboard') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Клавиатура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'vr_headset') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>VR гарнитура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'console') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Приставка</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_place') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Место</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'start_time') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Время начала</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'end_time') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Время окончания</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Название</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'start_date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата начала</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'end_date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата окончания</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'discount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Скидка</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'description') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Описание</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'price') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Цена</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_rental_tariff') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Тариф аренды</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'address') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Адрес</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_tournament') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Турнир</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'prize_pool') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Призовой фонд</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'format') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Формат</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'teams_amount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Кол-во команд</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_hall') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Зал</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_employee') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Сотрудник</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_booking') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Бронирование</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_discount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Акция</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_new') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Новость</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_rental') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Аренда</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_tournament_participant') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Участник турнира</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'team') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Команда</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_game') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Игра</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_genre') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Жанр</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_employee') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Сотрудник</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_position') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Должность</span>
                                    </th>";
                                    }
                                    $index_col++;
                                    $col_array[$index_col] = $array['Field'];
                                }
                                if($_SESSION['id_position'] == '3') {

                                } else {
                                    echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                    <span class='admin_section_block_bottom_table_row_title_cell_txt'>Действие</span>
                                </th>";
                                }
                            echo "</tr>";

                            include "php-handler/delete_line.php";

                                $select_info = "SELECT * FROM $table_name;"; 
                                $info_result = mysqli_query($connect, $select_info) or die(mysqli_error($connect));
                                while ($info_row = mysqli_fetch_assoc($info_result)) {
                                    $info_array[] = $info_row;
                                } 
                                if (isset($info_array)) {
                                    foreach ($info_array as $arr){
                                        $index = 0;
                                        echo "<tr class='admin_section_block_bottom_table_row'>";
                                        foreach ($columns_array as $array) {
                                            $index++;
                                            if($array['Field'] === 'img') {
                                            echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'><img src='".$arr[$col_array[$index]]."' alt='' class='admin_section_block_bottom_table_row_cell_txt_img'></span>
                                            </td>";
                                            } else if($array['Field'] === 'description') {
                                                $description = substr($arr[$col_array[$index]], 0, 200);
                                                $description = $description . "...";
                                                echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'>".$description."</span>
                                            </td>";
                                            } else if(($_SESSION['id_position'] == '3') and ($array['Field'] === 'password')) {

                                            } else {
                                            echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'>".$arr[$col_array[$index]]."</span>
                                            </td>";
                                            }
                                        }
                                        $id_line = $arr[$col_array[1]];
                                        if($_SESSION['id_position'] == '3') {

                                        } else {
                                            echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <div class='admin_section_block_bottom_table_row_cell_buttons'>
                                                    <a href='admin_area_edit.php?table_name=$table_name&edit_id_line=$id_line' class='admin_section_block_bottom_table_row_cell_buttons_btn'><img src='assets/images/edit.svg' alt='' class='admin_section_block_bottom_table_row_cell_buttons_btn_img'></a>
                                                    <a href='?table_name=$table_name&delete_id_line=$id_line' class='admin_section_block_bottom_table_row_cell_buttons_btn'><img src='assets/images/delete.svg' alt='' class='admin_section_block_bottom_table_row_cell_buttons_btn_img'></a>
                                                </div>
                                            </td>";
                                        }
                                        echo "</tr>";
                                    }
                                }
                            echo "</table>";
                            if($_SESSION['id_position'] == '3') {

                            } else {
                                echo "<a href='admin_area_create.php?table_name=$table_name' class='button admin_section_block_bottom_create'>Добавить запись</a>
                                </div>";
                            }
                            }
                        ?>
                </div>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/admin_footer.php";
                } else {
                    http_response_code(404);
                    header('Location: 404.php');
                }
    ?>
</body>
</html>