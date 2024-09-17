<?php
    session_start();
    include "../php-connect/connect.php";
    
    if (isset($_POST['tournament'])) {
        $tournament = $_POST['tournament'];
        if($tournament === '') {
            unset($tournament);
        }
    }
    $tournament = trim($_POST['tournament']);

    if (isset($_POST['team_name'])) {
        $team_name = $_POST['team_name'];
        if($team_name === '') {
            unset($team_name);
        }
    }
    $team_name = trim($_POST['team_name']);

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if($first_name === '') {
            unset($first_name);
        }
    }
    $first_name = trim($_POST['first_name']);

    if (isset($_POST['second_name'])) {
        $second_name = $_POST['second_name'];
        if($second_name === '') {
            unset($second_name);
        }
    }
    $second_name = trim($_POST['second_name']);

    if (isset($_POST['email_address'])) {
        $email_address = $_POST['email_address'];
        if($email_address === '') {
            unset($email_address);
        }
    }
    $email_address = trim($_POST['email_address']);

    if (isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
        if($phone_number === '') {
            unset($phone_number);
        }
    }
    $phone_number = trim($_POST['phone_number']);

    $select_user = "SELECT `id_user` FROM `users` WHERE `first_name` = '$first_name' and `second_name` = '$second_name' and `email_address` = '$email_address' and `phone_number` = '$phone_number';";
    $user_result = mysqli_query($connect, $select_user);
    $info_users = mysqli_fetch_array($user_result);

    $select_tournament = "SELECT `id_tournament` FROM `tournaments` WHERE `name` = '$tournament';";
    $tournament_result = mysqli_query($connect, $select_tournament);
    $info_tournaments = mysqli_fetch_array($tournament_result);
    $id_tournament = $info_tournaments['id_tournament'];

    if (isset($info_users['id_user'])) {
        $id_user = $info_users['id_user'];
        $create_line = "INSERT INTO `tournament_participants`(`id_tournament`, `team`, `id_user`) VALUES ('$id_tournament', '$team_name', '$id_user')";
        addslashes($create_line);
        $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));
        echo "<script>alert('Успешная регистрация на турнир!'); window.location.href='../index.php';</script>";
    } else {
        $previous = $_SERVER['HTTP_REFERER'];
        echo "<script>alert('Несуществующий пользователь!'); window.location.href='$previous';</script>";
    }
?>
<body>
    
</body>