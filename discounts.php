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
        <section class="discounts">
            <div class="container discounts_block">
                <div class="discounts_block_top">
                    <h2 class="discounts_block_top_title">Акции</h2>
                    <span class="discounts_block_top_txt">Эксклюзивные предложения для геймеров нашего клуба</span>
                </div>
                <div class="discounts_block_bottom">
                    <ul class="discounts_block_bottom_list">
                        <?php
                            if(isset($_GET['page'])) {
                                $page = $_GET['page'];
                                $page_items = ($page-1)*9;
                                $select_discounts = "SELECT * FROM discounts ORDER BY id_discount DESC LIMIT $page_items,9;"; 
                                $discounts_result = mysqli_query($connect, $select_discounts) or die(mysqli_error($connect));
                                while ($discounts_row = mysqli_fetch_assoc($discounts_result)) {
                                    $discounts_array[] = $discounts_row;
                                } 
                                if (isset($discounts_array)) {
                                    foreach ($discounts_array as $array){
                                        echo "<li class='discounts_block_bottom_list_item'>
                                            <img src='".$array['img']."' alt='' class='discounts_block_bottom_list_item_img'>
                                            <a href='discount.php?id_discount=".$array['id_discount']."' class='discounts_block_bottom_list_item_btn button'>Подробнее</a>
                                        </li>";
                                    }
                                }
                        ?>
                    </ul>
                </div>
                <div class="discounts_block_pages">
                    <?php
                        $select_pages = "SELECT CEILING(COUNT(*)/9) FROM `discounts`;"; 
                        $pages_result = mysqli_query($connect, $select_pages) or die(mysqli_error($connect));
                        while ($pages_row = mysqli_fetch_array($pages_result)) {
                            if (isset($pages_row)) {
                                for ($i = 1; $i <= $pages_row[0]; ++$i) {
                                    if ($i==$page) {
                                        echo "<span class='discounts_block_pages_item discounts_block_pages_current_item'><a href='?page=$i' class='discounts_block_pages_item_link'>".$i."</a></span>";
                                    } else {
                                        echo "<span class='discounts_block_pages_item'><a href='?page=$i' class='discounts_block_pages_item_link'>".$i."</a></span>";
                                    }
                                }
                            }
                        }
                    }
                    ?>
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