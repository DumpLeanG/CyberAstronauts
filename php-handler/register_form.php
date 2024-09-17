<div class="form_box" id="register_form">
        <form action="php-handler/reg.php" class="form_box_register" method="post"><!--Форма регистрации-->
            <div class="form_box_register_header">
                <span class="form_box_register_header_title" onclick="openLoginForm()">Вход</span>
                <span class="form_box_register_header_title form_box_register_header_current_title" onclick="openRegisterForm()">Регистрация</span>
                <button class="form_box_register_header_close" type="button" onclick="closeForm()"><img src="assets/images/cross.svg" alt="" class="form_box_register_header_close_img"></button>
            </div>
            <div class="form_box_register_block">
                <input type="email" name="email_address" class="form_box_register_block_input" required placeholder="Электронный адрес">
                <input type="tel" name="phone_number" class="form_box_register_block_input" required placeholder="Номер телефона">
                <input type="text" name="second_name" class="form_box_register_block_input" required placeholder="Фамилия">
                <input type="text" name="first_name" class="form_box_register_block_input" required placeholder="Имя">
                <input type="password" name="password" class="form_box_register_block_input" required placeholder="Пароль">
                <input type="password" name="confirm_password" class="form_box_register_block_input" required placeholder="Подтверждение пароля">
                <button class="form_box_register_block_btn" type="submit" id="register_btn">Регистрация</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="assets/js/mask.js"></script>