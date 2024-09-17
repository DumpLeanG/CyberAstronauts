<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - компьютерный клуб в москве, играть в компьютер, СS 2, Dota 2</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <script defer src="assets/js/games_slider.js"></script>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="start">
            <img src="assets/images/background.png" alt="" class="start_back">
            <img src="assets/images/border.svg" alt="" class="start_border_top">
            <img src="assets/images/border.svg" alt="" class="start_border_bottom">
            <div class="container start_block">
                <span class="start_block_txt">ДОБРО ПОЖАЛОВАТЬ В КОМПЬЮТЕРНЫЙ КЛУБ</span>
                <h1 class="start_block_title">CYBER ASTRONAUTS</h1>
                <button class="start_block_btn" onclick="openBookingForm()">Забронировать</button>
                <img src="assets/images/start_img.png" alt="" class="start_block_img">
            </div>
        </section>
        <section class="current_discounts">
            <div class="container current_discounts_block">
                <div class="current_discounts_block_top">
                <span class="current_discounts_block_top_pretitle">Текущие</span>
                    <h2 class="current_discounts_block_top_title">Акции</h2>
                    <span class="current_discounts_block_top_txt">Эксклюзивные предложения для геймеров нашего клуба</span>
                </div>
                <ul class="current_discounts_block_list">
                    <?php
                        $select_discounts = "SELECT * FROM discounts ORDER BY id_discount DESC LIMIT 0,3;"; 
                        $discounts_result = mysqli_query($connect, $select_discounts) or die(mysqli_error($connect));
                        while ($discounts_row = mysqli_fetch_assoc($discounts_result)) {
                            $discounts_array[] = $discounts_row;
                        } 
                        if (isset($discounts_array)) {
                            foreach ($discounts_array as $array){
                                echo "<li class='current_discounts_block_list_item'>
                                <img src='".$array['img']."' alt='' class='current_discounts_block_list_item_img'>
                                <a href='discount.php?id_discount=".$array['id_discount']."' class='current_discounts_block_list_item_btn button'>Подробнее</a>
                            </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="upcoming_tournaments">
            <div class="container upcoming_tournaments_block">
                <div class="upcoming_tournaments_block_top">
                    <span class="upcoming_tournaments_block_top_pretitle">БЛИЖАЙШИЕ</span>
                    <h2 class="upcoming_tournaments_block_top_title">ТУРНИРЫ</h2>
                    <span class="upcoming_tournaments_block_top_txt">Принимайте участие в турнирах и выигрывайте призы</span>
                </div>
                <table class="upcoming_tournaments_block_table">
                    <tr class="upcoming_tournaments_block_table_row">
                        <th class="upcoming_tournaments_block_table_row_title">Название</th>
                        <th class="upcoming_tournaments_block_table_row_title media_phone_hidden">Формат</th>
                        <th class="upcoming_tournaments_block_table_row_title">Дата</th>
                        <th class="upcoming_tournaments_block_table_row_title media_tablet_hidden media_phone_hidden">Время начала</th>
                        <th class="upcoming_tournaments_block_table_row_title media_phone_hidden">Призовой фонд</th>
                    </tr>
                    <?php
                        $select_tournaments = "SELECT * FROM tournaments WHERE date > NOW() ORDER BY date ASC LIMIT 3;"; 
                        $tournaments_result = mysqli_query($connect, $select_tournaments) or die(mysqli_error($connect));
                        while ($tournaments_row = mysqli_fetch_assoc($tournaments_result)) {
                            $tournaments_array[] = $tournaments_row;
                        } 

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
                          

                        if (isset($tournaments_array)) {
                            foreach ($tournaments_array as $array){
                                $date = date("m", strtotime($array['date']))-1;
                                echo "<tr class='upcoming_tournaments_block_table_row'>
                                        <td class='upcoming_tournaments_block_table_row_txt'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['name']."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['format']."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".date("d ", strtotime($array['date'])).$arr[$date]." ".date("Y ", strtotime($array['date']))."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_tablet_hidden media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".date("h:i", strtotime($array['start_time']))."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['prize_pool']." РУБ.</a></td>
                                </tr>";
                            }
                        }
                    ?>
                </table>
                <button class="upcoming_tournaments_block_btn" onclick="openTournamentForm()">Принять участие</button>
            </div>
        </section>
        <section class="gallery">
            <div class="container gallery_block">
                <div class="gallery_block_top">
                    <span class="gallery_block_top_pretitle">НАША</span>
                    <h2 class="gallery_block_top_title">ГАЛЕРЕЯ</h2>
                    <span class="gallery_block_top_txt">Ознакомьтесь с интерьером клуба благодаря нашей галерее</span>
                </div>
                <div class="gallery_block_bottom">
                    <input class="gallery_block_bottom_btn" type="radio" name="gallery_slider" id="gallery_btn1" checked>
                    <input class="gallery_block_bottom_btn" type="radio" name="gallery_slider" id="gallery_btn2">
                    <input class="gallery_block_bottom_btn" type="radio" name="gallery_slider" id="gallery_btn3">
                    <div class="gallery_block_bottom_images">
                        <label class="gallery_block_bottom_images_label" for="gallery_btn1" id="gallery_img1">
                            <img class="gallery_block_bottom_images_label_img" src="assets/images/gallery1.png" alt="игровой зал">
                        </label>
                        <label class="gallery_block_bottom_images_label" for="gallery_btn2" id="gallery_img2">
                            <img class="gallery_block_bottom_images_label_img" src="assets/images/gallery2.png" alt="девайсы для геймеров">
                        </label>
                        <label class="gallery_block_bottom_images_label" for="gallery_btn3" id="gallery_img3">
                            <img class="gallery_block_bottom_images_label_img" src="assets/images/gallery3.png" alt="playstation 5">
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="last_news">
            <div class="container last_news_block">
                <div class="last_news_block_top">
                    <span class="last_news_block_top_pretitle">последние</span>
                    <h2 class="last_news_block_top_title">новости</h2>
                    <span class="last_news_block_top_txt">Следите за новостями и всегда будьте в курсе дел киберспорта</span>
                </div>
                <ul class="last_news_block_list">
                    <?php
                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT 0,3;"; 
                        $news_result = mysqli_query($connect, $select_news) or die(mysqli_error($connect));
                        while ($news_row = mysqli_fetch_assoc($news_result)) {
                            $news_array[] = $news_row;
                        } 
                        if (isset($news_array)) {
                            foreach ($news_array as $array){
                                $date = date("m", strtotime($array['date']))-1;
                                echo "<li class='last_news_block_list_item'>
                                    <img src='".$array['img']."' alt='' class='last_news_block_list_item_img'>
                                    <div class='last_news_block_list_item_text'>
                                        <span class='last_news_block_list_item_text_date'>".date("d ", strtotime($array['date'])).$arr[$date].", ".date("Y ", strtotime($array['date']))."</span>
                                        <h3 class='last_news_block_list_item_text_title'>".$array['name']."</h3>
                                        <p class='last_news_block_list_item_text_txt'>".$array['description']."</p>
                                        <a href='new.php?id_new=".$array['id_new']."' class='last_news_block_list_item_text_btn button'>Читать далее</a>
                                    </div>
                                </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="games">
            <div class="container games_block">
                <div class="games_block_top">
                    <span class="games_block_top_pretitle">ваши любимые</span>
                    <h2 class="games_block_top_title">игры</h2>
                    <span class="games_block_top_txt">Установим любую игру за 30 минут и возместим время за скачивание</span>
                </div>
                <div class="games_block_bottom">
                    <ul class="games_block_bottom_list">
                        <?php
                            $select_games = "SELECT * FROM games ORDER BY id_game;"; 
                            $games_result = mysqli_query($connect, $select_games) or die(mysqli_error($connect));
                            while ($games_row = mysqli_fetch_assoc($games_result)) {
                                $games_array[] = $games_row;
                            } 
                            if (isset($games_array)) {
                                foreach ($games_array as $array){
                                    echo "<li class='games_block_bottom_list_item'>
                                        <img src='".$array['img']."' alt='' class='games_block_bottom_list_item_img'>
                                        <div class='games_block_bottom_list_item_text'>
                                            <span class='games_block_bottom_list_item_text_title'>".$array['name']."</span>
                                        </div>
                                    </li>";
                                }
                            }
                        ?>
                    </ul>
                    <div class="games_block_bottom_arrows">
                        <button class="games_block_bottom_arrows_btn" id="games_left_arrow"><img src="assets/images/slider_arrow.svg" alt="" class="games_block_bottom_arrows_btn_left_img"></button>
                        <button class="games_block_bottom_arrows_btn" id="games_right_arrow"><img src="assets/images/slider_arrow.svg" alt="" class="games_block_bottom_arrows_btn_right_img"></button>
                    </div>        
                </div>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/tournament_form.php";
        include "php-handler/booking_form.php";
    ?>
</body>
</html>