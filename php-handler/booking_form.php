<div class="form_box3" id="booking_form">
    <form class="form_box3_booking" method="post" action="php-handler/booking_create.php    ">
        <div class="form_box3_booking_header">
            <h3 class="form_box3_booking_header_title">ЗАБРОНИРУЙТЕ МЕСТО В <span class="form_box3_booking_header_title_purple">CYBER ASTRONAUTS</span></h3>
            <button class="form_box3_booking_header_close" type="button" onclick="closeBookingForm()"><img src="assets/images/cross.svg" alt="" class="form_box3_booking_header_close_img"></button>
        </div>
        <div class="form_box3_booking_steps">
            <div class="form_box3_booking_steps_item form_box3_booking_steps_active_item" id="step1">
                <span class="form_box3_booking_steps_item_num">1</span>
                <span class="form_box3_booking_steps_item_line"></span>
            </div>
            <div class="form_box3_booking_steps_item" id="step2">
                <span class="form_box3_booking_steps_item_num">2</span>
                <span class="form_box3_booking_steps_item_line"></span>
            </div>
            <div class="form_box3_booking_steps_item" id="step3">
                <span class="form_box3_booking_steps_item_num">3</span>
                <span class="form_box3_booking_steps_item_line"></span>
            </div>
            <div class="form_box3_booking_steps_item" id="step4">
                <span class="form_box3_booking_steps_item_num">4</span>
                <span class="form_box3_booking_steps_item_line"></span>
            </div>
            <div class="form_box3_booking_steps_item" id="step5">
                <span class="form_box3_booking_steps_item_num">5</span>
                <span class="form_box3_booking_steps_item_line"></span>
            </div>
        </div>
        <div class="form_box3_booking_services">
            <span class="form_box3_booking_services_txt">Выбери услугу, которую хочешь получить</span>
            <div class="form_box3_booking_services_variants active">
                <div class="form_box3_booking_services_variants_choose">
                    <input type="radio" value="booking" class="form_box3_booking_services_variants_choose_radio" name="service_radio">
                    <label class="form_box3_booking_services_variants_choose_txt">Забронировать место</label>
                </div>
                <div class="form_box3_booking_services_variants_choose">
                    <input type="radio" value="rental" class="form_box3_booking_services_variants_choose_radio" name="service_radio">
                    <label class="form_box3_booking_services_variants_choose_txt">Арендовать на дом</label>
                </div>
            </div>
            <div class="form_box3_booking_services_buttons">
                <a class="form_box3_booking_services_buttons_btn button" onclick="openSecondStep()" id="next_step">Далее</a>
            </div>
        </div>
        <div class="form_box3_booking_devices">
            <span class="form_box3_booking_devices_txt">Выбери, во что хочешь поиграть</span>
            <div class="form_box3_booking_devices_variants" id="booking_variants">
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="PC" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">PC</label>
                </div>
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="PS5" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">PS5</label>
                </div>
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="VR" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">VR</label>
                </div>
            </div>
            <div class="form_box3_booking_devices_variants" id="rental_variants">
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="PC" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">PC</label>
                </div>
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="PS5" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">PS5</label>
                </div>
                <div class="form_box3_booking_devices_variants_choose">
                    <input type="radio" value="VR" class="form_box3_booking_devices_variants_choose_radio" name="device_radio">
                    <label class="form_box3_booking_devices_variants_choose_txt">VR</label>
                </div>
            </div>
            <div class="form_box3_booking_devices_buttons">
                <a class="form_box3_booking_devices_buttons_btn button prev_btn" onclick="openFirstStep()">Назад</a>
                <a class="form_box3_booking_devices_buttons_btn button" onclick="openThirdStep()">Далее</a>
            </div>
        </div>
        <div class="form_box3_booking_halls">
            <span class="form_box3_booking_halls_txt">Выбери тариф для игры</span>
            <div class="form_box3_booking_halls_variants" id="pc_variants">
                <?php
                    $select_pchalls = "SELECT * FROM halls INNER JOIN devices ON devices.id_device = halls.id_device WHERE `mouse` IS NOT NULL;"; 
                    $pchalls_result = mysqli_query($connect, $select_pchalls) or die(mysqli_error($connect));
                    while ($pchalls_row = mysqli_fetch_assoc($pchalls_result)) {
                        $pchalls_array[] = $pchalls_row;
                    } 
                    if (isset($pchalls_array)) {
                        foreach ($pchalls_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_variants" id="ps5_variants">
                <?php
                    $select_pshalls = "SELECT * FROM halls INNER JOIN devices ON devices.id_device = halls.id_device WHERE `console` IS NOT NULL;"; 
                    $pshalls_result = mysqli_query($connect, $select_pshalls) or die(mysqli_error($connect));
                    while ($pshalls_row = mysqli_fetch_assoc($pshalls_result)) {
                        $pshalls_array[] = $pshalls_row;
                    } 
                    if (isset($pshalls_array)) {
                        foreach ($pshalls_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_variants" id="vr_variants">
                <?php
                    $select_vrhalls = "SELECT * FROM halls INNER JOIN devices ON devices.id_device = halls.id_device WHERE `vr_headset` IS NOT NULL;"; 
                    $vrhalls_result = mysqli_query($connect, $select_vrhalls) or die(mysqli_error($connect));
                    while ($vrhalls_row = mysqli_fetch_assoc($vrhalls_result)) {
                        $vrhalls_array[] = $vrhalls_row;
                    } 
                    if (isset($vrhalls_array)) {
                        foreach ($vrhalls_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_variants" id="pcr_variants">
                <?php
                    $select_pcrentals = "SELECT * FROM rental_tariffs INNER JOIN devices ON devices.id_device = rental_tariffs.id_device WHERE `mouse` IS NOT NULL;"; 
                    $pcrentals_result = mysqli_query($connect, $select_pcrentals) or die(mysqli_error($connect));
                    while ($pcrentals_row = mysqli_fetch_assoc($pcrentals_result)) {
                        $pcrentals_array[] = $pcrentals_row;
                    } 
                    if (isset($pcrentals_array)) {
                        foreach ($pcrentals_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_variants" id="ps5r_variants">
                <?php
                    $select_psrentals = "SELECT * FROM rental_tariffs INNER JOIN devices ON devices.id_device = rental_tariffs.id_device WHERE `console` IS NOT NULL;"; 
                    $psrentals_result = mysqli_query($connect, $select_psrentals) or die(mysqli_error($connect));
                    while ($psrentals_row = mysqli_fetch_assoc($psrentals_result)) {
                        $psrentals_array[] = $psrentals_row;
                    } 
                    if (isset($psrentals_array)) {
                        foreach ($psrentals_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_variants" id="vrr_variants">
                <?php
                    $select_vrrentals = "SELECT * FROM rental_tariffs INNER JOIN devices ON devices.id_device = rental_tariffs.id_device WHERE `vr_headset` IS NOT NULL;"; 
                    $vrrentals_result = mysqli_query($connect, $select_vrrentals) or die(mysqli_error($connect));
                    while ($vrrentals_row = mysqli_fetch_assoc($vrrentals_result)) {
                        $vrrentals_array[] = $vrrentals_row;
                    } 
                    if (isset($vrrentals_array)) {
                        foreach ($vrrentals_array as $array){
                            echo "<div class='form_box3_booking_halls_variants_choose'>
                                <input type='radio' value='".$array['name']."' class='form_box3_booking_halls_variants_choose_radio' name='hall_radio'>
                                <label class='form_box3_booking_halls_variants_choose_txt'>".$array['name']."</label>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="form_box3_booking_halls_buttons">
                <a class="form_box3_booking_halls_buttons_btn button prev_btn" onclick="openSecondStep()">Назад</a>
                <a class="form_box3_booking_halls_buttons_btn button" onclick="openFourthStep()">Далее</a>
            </div>
        </div>
        <div class="form_box3_booking_info" id="info">
            <span class="form_box3_booking_info_txt">Оставь свои контакты и выбери дату</span>
            <div class="form_box3_booking_info_block">
                <?php
                    if(isset($_SESSION['id_user'])) {
                        $phone_number = $_SESSION['phone_number'];
                        $first_name = $_SESSION['first_name'];
                        echo "<input type='text' class='form_box3_booking_info_block_input' name='bname' placeholder='Ваше имя' value='".$first_name."'>
                        <input type='tel' class='form_box3_booking_info_block_input' name='bphone' placeholder='Номер телефона' value='".$phone_number."'>";
                    } else {
                        echo "<input type='text' class='form_box3_booking_info_block_input' name='bname' placeholder='Ваше имя'>
                        <input type='tel' class='form_box3_booking_info_block_input' name='bphone' placeholder='Номер телефона'>";
                    }
                ?>
                <input type="text" class="form_box3_booking_info_block_input" name="bdate" placeholder="Дата брони" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
            </div>
            <div class="form_box3_booking_info_buttons">
                <a class="form_box3_booking_info_buttons_btn button prev_btn" onclick="openThirdStep()">Назад</a>
                <a class="form_box3_booking_info_buttons_btn button" onclick="openFifthStep()">Далее</a>
            </div>
        </div>
        <div class="form_box3_booking_info" id="info2">
            <span class="form_box3_booking_info_txt">Выбери время и место</span>
            <div class="form_box3_booking_info_block">
                <input type="text" class="form_box3_booking_info_block_input" name="bstart" placeholder="Время начала" onfocus="(this.type='time')" onblur="if(!this.value) this.type='text'">
                <input type="text" class="form_box3_booking_info_block_input" name="bend" placeholder="Время окончания" onfocus="(this.type='time')" onblur="if(!this.value) this.type='text'">
                <div class="form_box3_booking_info_block_input2" id="placestandard">
                    <?php
                        $select_standard = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'STANDARD'"; 
                        $standard_result = mysqli_query($connect, $select_standard) or die(mysqli_error($connect));
                        while ($standard_row = mysqli_fetch_assoc($standard_result)) {
                            $standard_array[] = $standard_row;
                        } 
                        echo "<select name='placestandard' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($standard_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
                <div class="form_box3_booking_info_block_input2" id="placegold">
                    <?php
                        $select_gold = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'GOLD'"; 
                        $gold_result = mysqli_query($connect, $select_gold) or die(mysqli_error($connect));
                        while ($gold_row = mysqli_fetch_assoc($gold_result)) {
                            $gold_array[] = $gold_row;
                        } 
                        echo "<select name='placegold' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($gold_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
                <div class="form_box3_booking_info_block_input2" id="placeplatinum">
                    <?php
                        $select_platinum = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'PLATINUM'"; 
                        $platinum_result = mysqli_query($connect, $select_platinum) or die(mysqli_error($connect));
                        while ($platinum_row = mysqli_fetch_assoc($platinum_result)) {
                            $platinum_array[] = $platinum_row;
                        } 
                        echo "<select name='placeplatinum' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($platinum_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
                <div class="form_box3_booking_info_block_input2" id="placediamond">
                    <?php
                        $select_diamond = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'DIAMOND'"; 
                        $diamond_result = mysqli_query($connect, $select_diamond) or die(mysqli_error($connect));
                        while ($diamond_row = mysqli_fetch_assoc($diamond_result)) {
                            $diamond_array[] = $diamond_row;
                        } 
                        echo "<select name='placediamond' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($diamond_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
                <div class="form_box3_booking_info_block_input2" id="placeps5">
                    <?php
                        $select_ps5 = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'PS5'"; 
                        $ps5_result = mysqli_query($connect, $select_ps5) or die(mysqli_error($connect));
                        while ($ps5_row = mysqli_fetch_assoc($ps5_result)) {
                            $ps5_array[] = $ps5_row;
                        } 
                        echo "<select name='placeps5' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($ps5_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
                <div class="form_box3_booking_info_block_input2" id="placevr">
                    <?php
                        $select_vr = "SELECT * FROM places INNER JOIN halls ON halls.id_hall = places.id_hall WHERE halls.name = 'VR'"; 
                        $vr_result = mysqli_query($connect, $select_vr) or die(mysqli_error($connect));
                        while ($vr_row = mysqli_fetch_assoc($vr_result)) {
                            $vr_array[] = $vr_row;
                        } 
                        echo "<select name='placevr' class='form_box3_booking_info_block_input2_select'>";
                        echo "<option value='' disabled selected>Место</option>";
                        foreach ($vr_array as $arr){
                            echo "<option>".$arr['id_place']."</option>";
                        }
                            echo "</select>
                            <img src='assets/images/arrow.svg' class='form_box3_booking_info_block_input2_arrow'>";
                    ?>
                </div>
            </div>
            <div class="form_box3_booking_info_buttons">
                <a class="form_box3_booking_info_buttons_btn button prev_btn" onclick="openFourthStep()">Назад</a>
                <button class="form_box3_booking_info_buttons_btn" type="submit">Забронировать</button>
            </div>
        </div>
        <div class="form_box3_booking_info" id="inforental">
            <span class="form_box3_booking_info_txt">Оставь свои контакты</span>
            <div class="form_box3_booking_info_block">
                <?php
                    if(isset($_SESSION['id_user'])) {
                        $phone_number = $_SESSION['phone_number'];
                        $first_name = $_SESSION['first_name'];
                        echo "<input type='text' class='form_box3_booking_info_block_input' name='rname' placeholder='Ваше имя' value='".$first_name."'>
                        <input type='tel' class='form_box3_booking_info_block_input' name='rphone' placeholder='Номер телефона' value='".$phone_number."'>";
                    } else {
                        echo "<input type='text' class='form_box3_booking_info_block_input' name='rname' placeholder='Ваше имя'>
                        <input type='tel' class='form_box3_booking_info_block_input' name='rphone' placeholder='Номер телефона'>";
                    }
                ?>
                <input type="text" class="form_box3_booking_info_block_input" name="address" placeholder="Адрес">
            </div>
            <div class="form_box3_booking_info_buttons">
                <a class="form_box3_booking_info_buttons_btn button prev_btn" onclick="openThirdStep()">Назад</a>
                <a class="form_box3_booking_info_buttons_btn button" onclick="openFifthStep()">Далее</a>
            </div>
        </div>
        <div class="form_box3_booking_info" id="inforental2">
            <span class="form_box3_booking_info_txt">Выбери дату</span>
            <div class="form_box3_booking_info_block">
                <input type="text" class="form_box3_booking_info_block_input" name="rstart" placeholder="Дата начала брони" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                <input type="text" class="form_box3_booking_info_block_input" name="rend" placeholder="Дата окончания брони" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
            </div>
            <div class="form_box3_booking_info_buttons">
                <a class="form_box3_booking_info_buttons_btn button prev_btn" onclick="openFourthStep()">Назад</a>
                <button class="form_box3_booking_info_buttons_btn" type="submit">Забронировать</button>
            </div>
        </div>
    </form>
</div>
    <script src="assets/js/booking_script.js"></script>