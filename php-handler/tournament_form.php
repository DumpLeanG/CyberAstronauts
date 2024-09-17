<div class="form_box2" id="tournament_form">
        <form action="php-handler/tournament_reg.php" class="form_box2_tournament" method="post">
            <div class="form_box2_tournament_block">
                <h3 class="form_box2_tournament_block_title">РЕГИСТРАЦИЯ НА ТУРНИР</h3>
                <button class="form_box2_tournament_block_close" type="button" onclick="closeTournamentForm()"><img src="assets/images/cross.svg" alt="" class="form_box2_tournament_block_close_img"></button>
                <?php 
                    $select_tournaments = "SELECT * FROM tournaments"; 
                    $tournaments_result = mysqli_query($connect, $select_tournaments) or die(mysqli_error($connect));
                    while ($tournaments_row = mysqli_fetch_assoc($tournaments_result)) {
                        $tournaments_arr[] = $tournaments_row;
                    }
                ?>
                <div class="form_box2_tournament_block_item">
                    <select name='tournament' class='form_box2_tournament_block_item_input'>
                        <?php
                        if(isset($tournament_rows['id_tournament'])) {
                            $_SESSION['id_tournament'] = $tournament_rows['id_tournament'];
                            foreach ($tournaments_arr as $arr){
                                if($arr['id_tournament'] == $tournament_rows['id_tournament']) {
                                    echo "<option selected='selected'>".$arr['name']."</option>";
                                } else {
                                    echo "<option>".$arr['name']."</option>";
                                }
                            }
                        } else {
                            foreach ($tournaments_arr as $arr){
                                echo "<option>".$arr['name']."</option>";
                            }
                        }
                        ?>
                    </select>
                    <img src="assets/images/arrow.svg" alt="" class="form_box2_tournament_block_item_img">
                </div>
                <?php
                ?>
                <input type="text" name="team_name" class="form_box2_tournament_block_input" required placeholder="Название команды">
                <?php

                    if(isset($_SESSION['id_user'])) {
                        $email_address = $_SESSION['email_address'];
                        $phone_number = $_SESSION['phone_number'];
                        $first_name = $_SESSION['first_name'];
                        $second_name = $_SESSION['second_name'];
                ?>
                <input type="text" name="first_name" class="form_box2_tournament_block_input" required placeholder="Имя капитана" value="<?php echo $_SESSION['first_name'] ?>">
                <input type="text" name="second_name" class="form_box2_tournament_block_input" required placeholder="Фамилия капитана" value="<?php echo $_SESSION['second_name'] ?>">
                <input type="email" name="email_address" class="form_box2_tournament_block_input" required placeholder="Электронный адрес капитана" value="<?php echo $_SESSION['email_address'] ?>">
                <input type="tel" name="phone_number" class="form_box2_tournament_block_input" required placeholder="Номер телефона капитана" value="<?php echo $_SESSION['phone_number'] ?>">
                <?php 
                    } else {
                ?>
                <input type="text" name="first_name" class="form_box2_tournament_block_input" required placeholder="Имя капитана">
                <input type="text" name="second_name" class="form_box2_tournament_block_input" required placeholder="Фамилия капитана">
                <input type="email" name="email_address" class="form_box2_tournament_block_input" required placeholder="Электронный адрес капитана">
                <input type="tel" name="phone_number" class="form_box2_tournament_block_input" required placeholder="Номер телефона капитана">
                <?php 
                    }
                ?>
                <button class="form_box2_tournament_block_btn" type="submit" id="tournament_btn">Регистрация</button>
            </div>
        </form>
</div>
    <script src="assets/js/tournament_script.js"></script>