<?php
    session_start();
    include "../php-connect/connect.php";
   
    if (isset($_POST['second_name'])) {
        $second_name = $_POST['second_name'];
        if($second_name === '') {
            unset($second_name);
        }
    }
    $second_name = trim($_POST['second_name']);

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if($first_name === '') {
            unset($first_name);
        }
    }
    $first_name = trim($_POST['first_name']);

    if (isset($_POST['patronymic'])) {
        $patronymic = $_POST['patronymic'];
        if($patronymic === '') {
            unset($patronymic);
        }
    }
    $first_name = trim($_POST['first_name']);

    if (isset($_POST['birthday'])) {
        $birthday = $_POST['birthday'];
        if($birthday === '') {
            unset($birthday);
        }
    }
    $birthday = trim($_POST['birthday']);

    if (isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
        if($phone_number === '') {
            unset($phone_number);
        }
    }
    $phone_number = trim($_POST['phone_number']);

    if (isset($_POST['email_address'])) {
        $email_address = $_POST['email_address'];
        if($email_address === '') {
            unset($email_address);
        }
    }
    $email_address = trim($_POST['email_address']);

    $id_user = $_SESSION['id_user'];

    $select_user = "SELECT * FROM `users` WHERE `id_user` = '$id_user'";
    $result = mysqli_query($connect, $select_user);
    $info_user = mysqli_fetch_array($result);

    if (($second_name != $info_user['second_name']) or ($first_name != $info_user['first_name']) or ($patronymic != $info_user['patronymic']) or ($birthday != $info_user['birthday']) or ($phone_number != $info_user['phone_number']) or ($email_address != $info_user['email_address'])) {
        $edit_line = "UPDATE `users` SET `second_name` = '$second_name', `first_name` = '$first_name', `patronymic` = '$patronymic', `birthday` = '$birthday', `phone_number` = '$phone_number', `email_address` = '$email_address' WHERE id_user = '$id_user'";
        addslashes($edit_line);
        $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

        $new_select_user = "SELECT * FROM `users` WHERE `id_user` = '$id_user'";
        $new_result = mysqli_query($connect, $new_select_user);
        $new_info_user = mysqli_fetch_array($new_result);

            $_SESSION['id_user'] = $new_info_user['id_user'];
            $_SESSION['second_name'] = $new_info_user['second_name'];
            $_SESSION['first_name'] = $new_info_user['first_name'];
            $_SESSION['patronymic'] = $new_info_user['patronymic'];
            $_SESSION['birthday'] = $new_info_user['birthday'];
            $_SESSION['phone_number'] = $new_info_user['phone_number'];
            $_SESSION['email_address'] = $new_info_user['email_address'];

            echo "<script>alert('Данные успешно изменены!'); window.location.href='../personal_area.php';</script>";
    } else {
        echo "<script>alert('Не удалось изменить данные, попробуйте еще раз!'); window.location.href='../personal_area.php';</script>";
    }
?>

<body>
    
</body>