<header id="navbar">
        <div class="container">
            <nav class="menu">
                <span class="menu_close" onclick="closeBurgerMenu()"></span>
                <a href="index.php" class="menu_logo" id="menu_logo"><img src="assets/images/Logo.svg" alt="" class="menu_logo_img"></a>
                <ul class="menu_list">
                    <li class="menu_list_item"><a href="halls.php" class="menu_list_item_link">Залы</a></li>
                    <li class="menu_list_item"><a href="tournaments.php" class="menu_list_item_link">Турниры</a></li>
                    <li class="menu_list_item"><a href="discounts.php?page=1" class="menu_list_item_link">Акции</a></li>
                    <li class="menu_list_item"><a href="news.php?page=1" class="menu_list_item_link">Новости</a></li>
                    <li class="menu_list_item"><a href="rules.php" class="menu_list_item_link">Правила</a></li>
                    <li class="menu_list_item"><a href="contacts.php" class="menu_list_item_link">Контакты</a></li>
                </ul>
                <ul class="menu_buttons">
                    <a <?php if ((empty($_SESSION['id_user'])) and (empty($_SESSION['id_admin']))){ 
                        ?>
                            onclick="openLoginForm()"
                        <?php } elseif(!empty($_SESSION['id_user'])) {
                        ?>
                            href="personal_area.php"
                        <?php } else {
                        ?>
                            href="admin_area.php"
                        <?php
                        } ?> 
                        class="menu_buttons_btn" id="user"></a>
                    <a href="tel:+79687850304" class="menu_buttons_btn" id="call"></a>
                    <button class="menu_buttons_btn" onclick="openBurgerMenu()" id="burger"></button>
                </ul> 
                <ul class="menu_vertical">
                    <li class="menu_vertical_item"><a href="halls.php" class="menu_vertical_item_link">Залы</a></li>
                    <li class="menu_vertical_item"><a href="tournaments.php" class="menu_vertical_item_link">Турниры</a></li>
                    <li class="menu_vertical_item"><a href="discounts.php?page=1" class="menu_vertical_item_link">Акции</a></li>
                    <li class="menu_vertical_item"><a href="news.php?page=1" class="menu_vertical_item_link">Новости</a></li>
                    <li class="menu_vertical_item"><a href="rules.php" class="menu_vertical_item_link">Правила</a></li>
                    <li class="menu_vertical_item"><a href="contacts.php" class="menu_vertical_item_link">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <script src="assets/js/booking_script.js"></script>
    <script src="assets/js/burger.js"></script>