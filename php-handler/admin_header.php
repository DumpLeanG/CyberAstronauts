<?php
    $select_admin = "SELECT * FROM `employees` WHERE id_employee = '$IDemployee'";
    addslashes($select_admin);
    $admin_result = mysqli_query($connect, $select_admin) or die(mysqli_error($connect));
    $info_admin = mysqli_fetch_object($admin_result);
?>
    
    <header id="navbar" class="admin_header">
        <div class="container">
            <nav class="admin_menu">
                <a href="admin_area.php" class="menu_logo" id="menu_logo"><img src="assets/images/Logo.svg" alt="" class="menu_logo_img"></a>
                <span class="admin_menu_name media_phone_hidden">Панель администрации: <?php echo $info_admin->second_name." ".$info_admin->first_name." ".$info_admin->patronymic; ?></span>
                <a href="php-handler/session_exit.php" class="admin_menu_leave">Выйти</a></li>
            </nav>
        </div>
    </header>