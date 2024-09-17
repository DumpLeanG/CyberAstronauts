<footer>
        <div class="container footer">
            <div class="footer_top">
                <div class="footer_top_left">
                    <img src="assets/images/Logo.svg" alt="" class="footer_top_left_logo">
                    <ul class="footer_top_left_socials">
                        <li class="footer_top_left_socials_item"><a href="#" class="footer_top_left_socials_item_link"><img src="assets/images/youtube.svg" alt="" class="footer_top_left_socials_item_img"></a></li>
                        <li class="footer_top_left_socials_item"><a href="#" class="footer_top_left_socials_item_link"><img src="assets/images/tiktok.svg" alt="" class="footer_top_left_socials_item_img"></a></li>
                        <li class="footer_top_left_socials_item"><a href="#" class="footer_top_left_socials_item_link"><img src="assets/images/vk.svg" alt="" class="footer_top_left_socials_item_img"></a></li>
                    </ul>
                </div>
                <div class="footer_top_mid">
                    <span class="footer_top_mid_title">Полезные ссылки</span>
                    <ul class="footer_top_mid_list">
                        <li class="footer_top_mid_list_item"><a href="halls.php" class="footer_top_mid_list_item_link">Залы</a></li>
                        <li class="footer_top_mid_list_item"><a href="tournaments.php" class="footer_top_mid_list_item_link">Турниры</a></li>
                        <li class="footer_top_mid_list_item"><a href="discounts.php?page=1" class="footer_top_mid_list_item_link">Акции</a></li>
                        <li class="footer_top_mid_list_item"><a href="news.php?page=1" class="footer_top_mid_list_item_link">Новости</a></li>
                        <li class="footer_top_mid_list_item"><a href="rules.php" class="footer_top_mid_list_item_link">Правила</a></li>
                        <li class="footer_top_mid_list_item"><a href="contacts.php" class="footer_top_mid_list_item_link">Контакты</a></li>
                        <li class="footer_top_mid_list_item"><a 
                        <?php if ((empty($_SESSION['id_user'])) and (empty($_SESSION['id_admin']))){ 
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
                        class="footer_top_mid_list_item_link">Личный кабинет</a></li>
                    </ul>
                </div>
                <div class="footer_top_right">
                    <span class="footer_top_right_title">Свяжитесь с нами</span>
                    <ul class="footer_top_right_list">
                        <li class="footer_top_right_list_item"><span class="footer_top_right_list_item_cat">Адрес:</span> г. Москва, ул. Профсоюзная, д. 5/9</li>
                        <li class="footer_top_right_list_item"><span class="footer_top_right_list_item_cat">Номер телефона:</span> 8 (968) 785-01-01</li>
                        <li class="footer_top_right_list_item"><span class="footer_top_right_list_item_cat">Почта:</span> info@ca.ru</li>
                    </ul>
                </div>
            </div>
            <div class="footer_bottom">
                <span class="footer_bottom_copyright">© 2024, Cyber Astronauts. Все права защищены</span>
                <!--<a href="#" class="footer_bottom_politic">Политика конфиденциальности</a>-->
            </div>
        </div>
    </footer>