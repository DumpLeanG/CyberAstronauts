<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - компьютерный клуб, кибер турниры, играть в комп</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="tournament">
            <div class="container tournament_block">
            <?php
                    $id_tournament = $_GET['id_tournament'];
                    $select_tournament = "SELECT tournaments.id_tournament, tournaments.name, tournaments.format, tournaments.date, tournaments.start_time, tournaments.prize_pool, tournaments.teams_amount, games.name as game_name FROM tournaments INNER JOIN games ON tournaments.id_game = games.id_game WHERE id_tournament = '$id_tournament';"; 
                    $tournament_result = mysqli_query($connect, $select_tournament) or die(mysqli_error($connect));
                    $tournament_rows = mysqli_fetch_array($tournament_result);

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

                    $date = date("m", strtotime($tournament_rows['date']))-1;
                    $first = $tournament_rows['prize_pool']/2;
                    $second = $tournament_rows['prize_pool']/3;
                    $third = $tournament_rows['prize_pool']/6;
                    echo "<h2 class='tournament_block_title'>".$tournament_rows['name']."</h2>
                    <div class='tournament_block_content'>
                        <span class='tournament_block_content_date'>Дата проведения: <span class='tournament_block_content_date_blue'>".date("d ", strtotime($tournament_rows['date'])).$arr[$date].", ".date("Y ", strtotime($tournament_rows['date']))."</span></span>
                        <ul class='tournament_block_content_list'>
                            <li class='tournament_block_content_list_item'>Время начала: <span class='tournament_block_content_list_item_blue'>".$tournament_rows['start_time']."</span></li>
                            <li class='tournament_block_content_list_item'>Дисциплина: <span class='tournament_block_content_list_item_blue'>".$tournament_rows['game_name']."</span></li>
                            <li class='tournament_block_content_list_item'>Формат:  <span class='tournament_block_content_list_item_blue'>".$tournament_rows['format']."</span></li>
                            <li class='tournament_block_content_list_item'>Призовой фонд:  <span class='tournament_block_content_list_item_blue'>".$tournament_rows['prize_pool']." рублей</span></li>
                            <li class='tournament_block_content_list_item'>Кол-во команд:  <span class='tournament_block_content_list_item_blue'>".$tournament_rows['teams_amount']."</span></li>
                        </ul>
                        <ul class='tournament_block_content_prizes'>
                            <li class='tournament_block_content_prizes_item'>
                                <img src='assets/images/gold.svg' alt='' class='tournament_block_content_prizes_item_img'>
                                <div class='tournament_block_content_prizes_item_box'>
                                    <span class='tournament_block_content_prizes_item_box_gold'>1 Место</span>
                                    <span class='tournament_block_content_prizes_item_box_prize'>".$first." рублей</span>
                                </div>
                            </li>
                            <li class='tournament_block_content_prizes_item'>
                                <img src='assets/images/silver.svg' alt='' class='tournament_block_content_prizes_item_img'>
                                <div class='tournament_block_content_prizes_item_box'>
                                    <span class='tournament_block_content_prizes_item_box_silver'>2 Место</span>
                                    <span class='tournament_block_content_prizes_item_box_prize'>".$second." рублей</span>
                                </div>
                            </li>
                            <li class='tournament_block_content_prizes_item'>
                                <img src='assets/images/bronze.svg' alt='' class='tournament_block_content_prizes_item_img'>
                                <div class='tournament_block_content_prizes_item_box'>
                                    <span class='tournament_block_content_prizes_item_box_bronze'>3 Место</span>
                                    <span class='tournament_block_content_prizes_item_box_prize'>".$third." рублей</span>
                                </div>
                            </li>
                        </ul>
                        <button class='tournament_block_content_btn' onclick='openTournamentForm()'>Принять участие</button>
                    </div>";
                ?>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/tournament_form.php";
    ?>
</body>
</html>