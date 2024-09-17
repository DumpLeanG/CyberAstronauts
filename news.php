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
        <section class="news">
            <div class="container news_block">
                <div class="news_block_top">
                    <h2 class="news_block_top_title">новости</h2>
                    <span class="news_block_top_txt">Следите за новостями и всегда будьте в курсе дел киберспорта</span>
                </div>
                <div class="news_block_bottom">
                    <?php
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                            $page_items = ($page-1)*4;
                            if(isset($_POST['search']) && strlen($_POST['search']) >= 1) {
                                $search = trim($_POST['search']);
                                if(strlen($search) < 3) {
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news`;";  
                                } else if(strlen($search) > 54) {
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news`;"; 
                                } else {
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news` WHERE news.name LIKE '%$search%' or news.description LIKE '%$search%'";
                                }
                            } else if((isset($_POST['game_filter'])) && (isset($_POST['genre_filter']))) {
                                if(($_POST['game_filter'] == 'all') && ($_POST['genre_filter'] == 'all')) {
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news`;";
                                } else if($_POST['game_filter'] <> 'all') {
                                    $game = $_POST['game_filter'];
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news` INNER JOIN games ON games.id_game = news.id_game WHERE games.name = '$game';";
                                } else if($_POST['genre_filter'] <> 'all') {
                                    $genre = $_POST['genre_filter'];
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news` INNER JOIN games ON games.id_game = news.id_game INNER JOIN genres ON genres.id_genre = games.id_genre WHERE genres.name = '$genre';";
                                } else {
                                    $game = $_POST['game_filter'];
                                    $genre = $_POST['genre_filter'];
                                    $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news` INNER JOIN games ON games.id_game = news.id_game INNER JOIN genres ON genres.id_genre = games.id_genre WHERE games.name = '$game' and genres.name = '$genre';";
                                }
                            } else {
                                $select_pages = "SELECT CEILING(COUNT(*)/4) FROM `news`;"; 
                            }
                            $pages_result = mysqli_query($connect, $select_pages) or die(mysqli_error($connect));
                            while ($pages_row = mysqli_fetch_array($pages_result)) {
                                if (isset($pages_row)) {
                                    for ($i = 1; $i <= $pages_row[0]; ++$i) {
                                        if ($i==$page) {
                                            echo "<form class='news_block_bottom_filters' action='?page=".$i."' method='POST'>";
                                        } else {
                                            echo "<form class='news_block_bottom_filters' action='?page=1' method='POST'>";
                                        }
                                    }
                                }
                            }
                    ?>
                        <div class="news_block_bottom_filters_search">
                            <input type="text" class="news_block_bottom_filters_search_input" placeholder="Поиск" name="search">
                            <img src="assets/images/search.svg" alt="" class="news_block_bottom_filters_search_img">
                        </div>
                        <?php 
                            if(isset($_POST['game_filter'])) {
                                $game_id = str_replace(' ', '', $_POST['game_filter']); 
                            } else {
                                $game_id = 'all';
                            }
                        ?>
                        <div class="news_block_bottom_filters_group">
                            <span class="news_block_bottom_filters_group_title">Игры</span>
                            <div class="news_block_bottom_filters_group_choose">
                                <input id='all_games' type="radio" value="all" class="news_block_bottom_filters_group_choose_radio" name="game_filter">
                                <label class="news_block_bottom_filters_group_choose_txt">Все</label>
                            </div>
                            <?php
                                if(isset($_POST['genre_filter']) && ($_POST['genre_filter']) <> 'all') {
                                    $genre = $_POST['genre_filter'];
                                    $select_games = "SELECT games.name FROM games INNER JOIN genres on genres.id_genre = games.id_genre WHERE genres.name = '$genre' ORDER BY name;"; 
                                } else {
                                    $select_games = "SELECT name FROM games ORDER BY name;"; 
                                }
                                $games_result = mysqli_query($connect, $select_games) or die(mysqli_error($connect));
                                while ($games_row = mysqli_fetch_assoc($games_result)) {
                                    $games_array[] = $games_row;
                                } 
                                if (isset($games_array)) {
                                    foreach ($games_array as $array){
                                        $id = str_replace(' ', '', $array['name']);
                                        echo "<div class='news_block_bottom_filters_group_choose'>
                                            <input id='".$id."' type='radio' value='".$array['name']."' class='news_block_bottom_filters_group_choose_radio' name='game_filter'>
                                            <label class='news_block_bottom_filters_group_choose_txt'>".$array['name']."</label>
                                        </div>";
                                    }
                                }
                            ?>
                        </div>
                        <?php 
                            if(isset($_POST['genre_filter'])) {
                                $genre_id = str_replace(' ', '', $_POST['genre_filter']); 
                            } else {
                                $genre_id = 'all';
                            }
                        ?>
                        <div class="news_block_bottom_filters_group">
                            <span class="news_block_bottom_filters_group_title">Жанр</span>
                            <div class="news_block_bottom_filters_group_choose">
                                <input id='all_genres' type="radio" value="all" class="news_block_bottom_filters_group_choose_radio" name="genre_filter">
                                <label class="news_block_bottom_filters_group_choose_txt">Все</label>
                            </div>
                            <?php
                                if(isset($_POST['game_filter']) && ($_POST['game_filter']) <> 'all') {
                                    $game = $_POST['game_filter'];
                                    $select_genres = "SELECT genres.name FROM genres INNER JOIN games on genres.id_genre = games.id_genre WHERE games.name = '$game' ORDER BY name;"; 
                                } else {
                                    $select_genres = "SELECT name FROM genres ORDER BY name;"; 
                                }
                                $genres_result = mysqli_query($connect, $select_genres) or die(mysqli_error($connect));
                                while ($genres_row = mysqli_fetch_assoc($genres_result)) {
                                    $genres_array[] = $genres_row;
                                } 
                                if (isset($genres_array)) {
                                    foreach ($genres_array as $array){
                                        $id = str_replace(' ', '', $array['name']);
                                        echo "<div class='news_block_bottom_filters_group_choose'>
                                            <input id='".$array['name']."' type='radio' value='".$array['name']."' class='news_block_bottom_filters_group_choose_radio' name='genre_filter'>
                                            <label class='news_block_bottom_filters_group_choose_txt'>".$array['name']."</label>
                                        </div>";
                                    }
                                }
                            ?>
                        </div>
                        <button type="submit" class="news_block_bottom_filters_btn">Применить</button>
                    </form>
                    <ul class="news_block_bottom_list">
                        <?php   
                                if(isset($_POST['search']) && strlen($_POST['search']) >= 1) {
                                    if(strlen($search) < 3) {
                                        echo '<script>alert("Слишком короткий запрос!")</script>';
                                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT $page_items,4;"; 
                                    } else if(strlen($search) > 54) {
                                        echo '<script>alert("Слишком длинный запрос!")</script>';
                                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT $page_items,4;";
                                    } else {
                                        $select_news = "SELECT news.id_new, news.name,  news.description, news.date, news.img, games.name AS game_name FROM news INNER JOIN games ON games.id_game = news.id_game WHERE news.name LIKE '%$search%' or news.description LIKE '%$search%' ORDER BY id_new DESC LIMIT $page_items,4;";
                                    }
                                } else if((isset($_POST['game_filter'])) && (isset($_POST['genre_filter']))) {
                                    if(($_POST['game_filter'] == 'all') && ($_POST['genre_filter'] == 'all')) {
                                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT $page_items,4;";
                                    } else if($_POST['game_filter'] <> 'all') {
                                        $game = $_POST['game_filter'];
                                        $select_news = "SELECT news.id_new, news.name,  news.description, news.date, news.img, games.name AS game_name FROM news INNER JOIN games ON games.id_game = news.id_game WHERE games.name = '$game' ORDER BY id_new DESC LIMIT $page_items,4;";
                                    } else if($_POST['genre_filter'] <> 'all') {
                                        $genre = $_POST['genre_filter'];
                                        $select_news = "SELECT news.id_new, news.name,  news.description, news.date, news.img, games.name AS game_name FROM news INNER JOIN games ON games.id_game = news.id_game INNER JOIN genres ON genres.id_genre = games.id_genre WHERE genres.name = '$genre' ORDER BY id_new DESC LIMIT $page_items,4;";
                                    } else {
                                        $game = $_POST['game_filter'];
                                        $genre = $_POST['genre_filter'];
                                        $select_news = "SELECT news.id_new, news.name,  news.description, news.date, news.img, games.name AS game_name FROM news INNER JOIN games ON games.id_game = news.id_game INNER JOIN genres ON genres.id_genre = games.id_genre WHERE games.name = '$game' and genres.name = '$genre' ORDER BY id_new DESC LIMIT $page_items,4;";
                                    }
                                } else {
                                    $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT $page_items,4;"; 
                                }
                                $news_result = mysqli_query($connect, $select_news) or die(mysqli_error($connect));
                                while ($news_row = mysqli_fetch_assoc($news_result)) {
                                    $news_array[] = $news_row;
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

                                if (isset($news_array)) {
                                    foreach ($news_array as $array){
                                        $date = date("m", strtotime($array['date']))-1;
                                        echo "<li class='news_block_bottom_list_item'>
                                        <img src='".$array['img']."' alt='' class='news_block_bottom_list_item_img'>
                                        <div class='news_block_bottom_list_item_text'>
                                            <span class='news_block_bottom_list_item_text_date'>".date("d ", strtotime($array['date'])).$arr[$date].", ".date("Y ", strtotime($array['date']))."</span>
                                            <h3 class='news_block_bottom_list_item_text_title'>".$array['name']."</h3>
                                            <p class='news_block_bottom_list_item_text_txt'>".$array['description']."</p>
                                            <a href='new.php?id_new=".$array['id_new']."' class='news_block_bottom_list_item_text_btn button'>Читать далее</a>
                                        </div>
                                    </li>";
                                    }
                                } else {
                                    echo "<script>alert('Несуществующая новость!'); window.location.href='?page=1';</script>";
                                }
                        ?>
                    </ul>
                </div>
                <div class="news_block_pages">
                    <?php
                            $pages_result = mysqli_query($connect, $select_pages) or die(mysqli_error($connect));
                            while ($pages_row = mysqli_fetch_array($pages_result)) {
                                if (isset($pages_row)) {
                                    for ($i = 1; $i <= $pages_row[0]; ++$i) {
                                        if ($i==$page) {
                                            echo "<span class='news_block_pages_item news_block_pages_current_item'><a href='?page=$i' class='news_block_pages_item_link'>".$i."</a></span>";
                                        } else {
                                            echo "<span class='news_block_pages_item'><a href='?page=$i' class='news_block_pages_item_link'>".$i."</a></span>";
                                        }
                                    }
                                }
                            }
                    } else {
                        http_response_code(404);
                        header('Location: 404.php');
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <script>
        if (document.getElementById('<?php echo $game_id;?>') != null) {
            document.getElementById('<?php echo $game_id;?>').checked = true;
        } else {
            document.getElementById('all_games').checked = true;
        }
        if (document.getElementById('<?php echo $genre_id ?>') != null) {
            document.getElementById('<?php echo $genre_id ?>').checked = true;
        } else {
            document.getElementById('all_genres').checked = true;
        }
    </script>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
    ?>
</body>
</html>