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
        <section class="tournaments">
            <div class="container tournaments_block">
                <div class="tournaments_block_top">
                    <h2 class="tournaments_block_top_title">Турниры</h2>
                    <p class="tournaments_block_top_txt">Принимайте участие в турнирах и выигрывайте призы</p>
                </div>
                <table class="tournaments_block_table">
                    <tr class="tournaments_block_table_row">
                        <th class="tournaments_block_table_row_title">Название</th>
                        <th class="tournaments_block_table_row_title media_phone_hidden">Формат</th>
                        <th class="tournaments_block_table_row_title">Дата</th>
                        <th class="tournaments_block_table_row_title media_tablet_hidden media_phone_hidden">Время начала</th>
                        <th class="tournaments_block_table_row_title media_phone_hidden">Призовой фонд</th>
                    </tr>
                    <?php
                        $select_tournaments = "SELECT * FROM tournaments WHERE date > NOW() ORDER BY date ASC;"; 
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
                                $date = date("m ",strtotime($array['date']))-1;
                                echo "<tr class='upcoming_tournaments_block_table_row'>
                                        <td class='upcoming_tournaments_block_table_row_txt'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['name']."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['format']."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt '><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".date("d ", strtotime($array['date'])).$arr[$date]." ".date("Y ", strtotime($array['date']))."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_tablet_hidden media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".date("h:i", strtotime($array['start_time']))."</a></td>
                                        <td class='upcoming_tournaments_block_table_row_txt media_phone_hidden'><a href='tournament.php?id_tournament=".$array['id_tournament']."' class='upcoming_tournaments_block_table_row_txt_link'>".$array['prize_pool']." РУБ.</a></td>
                                </tr>";
                            }
                        }
                    ?>
                </table>
                <button class="tournaments_block_btn" onclick="openTournamentForm()">Принять участие</button>
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