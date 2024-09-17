<div class="form_box" id="login_form">
        <form action="php-handler/auth.php" class="form_box_login" method="post"><!--Форма авторизации-->
            <div class="form_box_login_header">
                <span class="form_box_login_header_title form_box_login_header_current_title">Вход</span>
                <span class="form_box_login_header_title" onclick="openRegisterForm()">Регистрация</span>
                <button class="form_box_login_header_close" type="button" onclick="closeForm()"><img src="assets/images/cross.svg" alt="" class="form_box_login_header_close_img"></button>
            </div>
            <div class="form_box_login_block">
                <input type="email" name="email_address" class="form_box_login_block_input" required placeholder="Электронный адрес">
                <input type="password" name="password" class="form_box_login_block_input" required placeholder="Пароль">
                <!--<button class="form_box_login_block_btn" type="submit" id="login_btn">Войти</button>-->
                <div class="g-recaptcha" data-sitekey="6LdRA9YmAAAAANy9OTOmqD8bECVbnauwCTceoZl8"></div>
                <input type="submit" class="form_box_login_block_btn button" id="login_btn" value="Войти">
            </div>
        </form>
</div>
    <script src="assets/js/modal_script.js"></script><!--Скрипт с ссылкой на файл js-->