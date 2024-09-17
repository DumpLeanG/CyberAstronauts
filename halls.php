<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="assets/js/halls_script.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberAstronauts - компьютерный клуб в москве, аренда компьютера, аренда приставки, цена</title>
    <meta name="description" content="Игровой компьютерный клуб Cyber Astronauts - это новый подход к киберспорту. Самые комфортабельные игровые места, самые топовые ПК, профессиональные девайсы и огромный выбор игр. У нас можно играть как в компьютер, так и в PlayStation 5 и в VR шлеме" />
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="halls">
            <div class="container halls_block">
            <div class="halls_block_top">
                    <h2 class="halls_block_top_title">Залы</h2>
                    <span class="halls_block_top_txt">Наши залы оборудованы современным компьютерным оборудованием и оформлены в стильном и комфортном интерьере</span>
                </div>
                <div class="halls_block_buttons">
                    <?php
                        $select_halls = "SELECT * FROM halls INNER JOIN devices ON devices.id_device = halls.id_device;"; 
                        $halls_result = mysqli_query($connect, $select_halls) or die(mysqli_error($connect));
                        while ($halls_row = mysqli_fetch_assoc($halls_result)) {
                            $halls_array[] = $halls_row;
                        } 
                        if (isset($halls_array)) {
                            foreach ($halls_array as $array){
                                if($array['name'] == 'STANDARD') {
                                    echo "<button class='halls_block_buttons_btn halls_block_buttons_current_btn' onclick='open".$array['name']."hall()' id='".$array['name']."_btn'>".$array['name']."</button>";
                                } else {
                                    echo "<button class='halls_block_buttons_btn' onclick='open".$array['name']."hall()' id='".$array['name']."_btn'>".$array['name']."</button>";
                                }
                            }
                        }
                    ?>
                </div>
                <?php
                    if (isset($halls_array)) {
                        echo "<div class='halls_block_items'>";
                        foreach ($halls_array as $array){
                            echo "<div class='halls_block_items_box' id='".$array['name']."'>
                                <div class='halls_block_items_box_top'>
                                    <img src='".$array['img']."' alt='".$array['name']."' class='halls_block_items_box_top_img'>
                                    <div class='halls_block_items_box_top_text'>
                                        <span class='halls_block_items_box_top_text_title'>зал <span class='halls_block_items_box_top_text_title_purple'>".$array['name']."</span></span>
                                        <span class='halls_block_items_box_top_text_txt'>".$array['description']."</span>
                                        <span class='halls_block_items_box_top_text_price'>Цена: ".$array['price']." РУБ/Ч</span>
                                    </div>
                                    <button class='halls_block_items_box_top_btn' onclick='openBookingForm()'>Забронировать</button>
                                </div>
                                <ul class='halls_block_items_box_bottom'>";
                                    if($array['gpu'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/gpu.svg' alt='видеокарта' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['gpu']."</span>
                                        </li>
                                            <li class='halls_block_items_box_bottom_item media_tablet_hidden media_phone_hidden'>
                                            <img src='assets/images/line.svg' alt='' class='halls_block_items_box_bottom_item_line'>
                                        </li>";
                                    }
                                    if($array['cpu'] <> '') {
                                        echo"<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/cpu.svg' alt='процессор' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['cpu']."</span>
                                        </li>
                                        <li class='halls_block_items_box_bottom_item media_tablet_hidden media_phone_hidden'>
                                            <img src='assets/images/line.svg' alt='' class='halls_block_items_box_bottom_item_line'>
                                        </li>";
                                    }
                                    if($array['display'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/display.svg' alt='монитор' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['display']."</span>
                                        </li>
                                        <li class='halls_block_items_box_bottom_item media_tablet_hidden media_phone_hidden'>
                                            <img src='assets/images/line.svg' alt='' class='halls_block_items_box_bottom_item_line'>
                                        </li>"; 
                                    } 
                                    if($array['headset'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/headset.svg' alt='гарнитура' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['headset']."</span>
                                        </li>
                                        <li class='halls_block_items_box_bottom_item media_tablet_hidden media_phone_hidden'>
                                            <img src='assets/images/line.svg' alt='' class='halls_block_items_box_bottom_item_line'>
                                        </li>";
                                    }
                                    if($array['mouse'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/mouse.svg' alt='мышь' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['mouse']."</span>
                                        </li>
                                        <li class='halls_block_items_box_bottom_item media_tablet_hidden media_phone_hidden'>
                                            <img src='assets/images/line.svg' alt='' class='halls_block_items_box_bottom_item_line'>
                                        </li>";
                                    }
                                    if($array['keyboard'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/keyboard.svg' alt='клавиатура' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['keyboard']."</span>
                                        </li>";
                                    }
                                    if($array['vr_headset'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/vr_headset.svg' alt='vr шлем' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['vr_headset']."</span>
                                        </li>";
                                    } 
                                    if($array['console'] <> '') {
                                        echo "<li class='halls_block_items_box_bottom_item'>
                                            <img src='assets/images/console.svg' alt='консоль' class='halls_block_items_box_bottom_item_img'>
                                            <span class='halls_block_items_box_bottom_item_txt'>".$array['console']."</span>
                                        </li>";
                                    }
                                echo "</ul>
                            </div>";
                        }
                    echo "</div>";
                    }
                ?>
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