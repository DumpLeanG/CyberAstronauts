<?php
    session_start();
    include "../php-connect/connect.php";
    if ((isset($_GET['table_name'])) and (isset($_GET['edit_id_line']))) {
        $table_name = $_GET['table_name'];
        $id_line = $_GET['edit_id_line'];
        $show_columns = "SHOW COLUMNS FROM $table_name;"; 
        $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
        while ($columns_row = mysqli_fetch_assoc($columns_result)) {
            $columns_array[] = $columns_row;
        } 
        $index_col = 0;
        $col_array = array();
        $line = array();
        $update = "UPDATE $table_name SET";
        $attributes = "";
        $values = "";
        $data = "";
        $uploaddir = '../assets/images/';
        $uploaddir2 = 'assets/images/';
        $apend=date('YmdHis').rand(100,1000).'.png';
        $uploadfile = "$uploaddir$apend";
        $uploadfile2 = "$uploaddir2$apend";
        foreach ($columns_array as $array){
            $index_col++;
            $col_array[$index_col] = $array['Field'];
            $index_col;
            if (($index_col > 1) and $col_array[$index_col] != 'img' and $col_array[$index_col] != 'password'){
                if ($col_array[$index_col] === 'id_user') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_user = "SELECT * FROM `users` WHERE `second_name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_user);
                    $info_user = mysqli_fetch_array($result);
                    $line[$index_col] = $info_user['id_user'];
                } else if ($col_array[$index_col] === 'id_rental_tariff') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_tariff = "SELECT * FROM `rental_tariffs` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_tariff);
                    $info_tariff = mysqli_fetch_array($result);
                    $line[$index_col] = $info_tariff['id_rental_tariff'];
                } else if ($col_array[$index_col] === 'id_tournament') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_tournaments = "SELECT * FROM `tournaments` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_tournaments);
                    $info_tournaments = mysqli_fetch_array($result);
                    $line[$index_col] = $info_tournaments['id_tournament'];
                } else if ($col_array[$index_col] === 'id_hall') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_halls = "SELECT * FROM `halls` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_halls);
                    $info_halls = mysqli_fetch_array($result);
                    $line[$index_col] = $info_halls['id_hall'];
                } else if ($col_array[$index_col] === 'id_discount') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_discounts = "SELECT * FROM `discounts` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_discounts);
                    $info_discounts = mysqli_fetch_array($result);
                    $line[$index_col] = $info_discounts['id_discount'];
                } else if ($col_array[$index_col] === 'id_position') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_positions = "SELECT * FROM `positions` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_positions);
                    $info_positions = mysqli_fetch_array($result);
                    $line[$index_col] = $info_positions['id_position'];
                } else if ($col_array[$index_col] === 'id_genre') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_genres = "SELECT * FROM `genres` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_genres);
                    $info_genres = mysqli_fetch_array($result);
                    $line[$index_col] = $info_genres['id_genre'];
                } else if ($col_array[$index_col] === 'id_discount') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_discounts = "SELECT * FROM `discounts` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_discounts);
                    $info_discounts = mysqli_fetch_array($result);
                    $line[$index_col] = $info_discounts['id_discount'];
                } else if ($col_array[$index_col] === 'id_game') {
                    $line[$index_col] = $_POST[$array['Field']];
                    $select_games = "SELECT * FROM `games` WHERE `name` = '$line[$index_col]'";
                    $result = mysqli_query($connect, $select_games);
                    $info_games = mysqli_fetch_array($result);
                    $line[$index_col] = $info_games['id_game'];
                } else {
                    $line[$index_col] = $_POST[$array['Field']];
                    if($line[$index_col] === '') {
                        unset($line[$index_col]);
                    }
                    $line[$index_col] = trim($_POST[$array['Field']]);
                }
            } else if ($col_array[$index_col] === 'img') {
                $line[$index_col] = $uploadfile2;
            } else if ($col_array[$index_col] === 'password') {
                $line[$index_col] = password_hash($_POST[$array['Field']], PASSWORD_DEFAULT);
            }
            if (($index_col > 1) and ($line[$index_col] != '')) {
                $attributes = "`".$col_array[$index_col]."`";
                $values = "'".$line[$index_col]."', ";
                $data = $data.$attributes." = ".$values;
            }
        }
        
        $data = rtrim($data, ", ");
        if (!isset($_FILES['img']['type'])) {
            $edit_line = $update." ".$data." WHERE $col_array[1] = '$id_line';";
            addslashes($edit_line);
            $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

            header("location: ../admin_area.php?table_name=$table_name");
        }
        elseif(($_FILES['img']['type'] == 'image/gif' || $_FILES['img']['type'] == 'image/jpeg' || $_FILES['img']['type'] == 'image/png') && ($_FILES['img']['size'] !=0 and $_FILES['img']['size']<=5120000))
        {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $size = getimagesize($uploadfile);

                $edit_line = $update." ".$data." WHERE $col_array[1] = '$id_line';";
                addslashes($edit_line);
                $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

                header("location: ../admin_area.php?table_name=$table_name");
            } else {
                echo "<script>alert('ОШИБКА: Файл не загружен, попробуйте еще раз'); window.location.href='../admin_area.php?table_name=$table_name';</script>";
                //header("location: ../admin_area.php?table_name=$table_name");
            }
        } else {
            echo "<script>alert('ОШИБКА: Размер файла не должен превышать 5120Кб'); window.location.href='../admin_area.php?table_name=$table_name';</script>";
            //header("location: ../admin_area.php?table_name=$table_name");
        } 
    }
?>
<body>
    
</body>