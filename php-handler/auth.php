<?php
    session_start();
    include "../php-connect/connect.php";
    if(isset($_POST['submit'])) {
        if(isset($_POST['email_address'])) {
            $email_address = $_POST['email_address'];
            if ($email_address === '') {
                unset($email_address);
            }
        }
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            if ($password === '') {
                unset($password);
            }
        }
    }

    if(isset($_POST['g-recaptcha-response'])) {
        $recapcha = $_POST['g-recaptcha-response'];
        if(!$recapcha) {
            echo "<script>alert('Пожалуйста, подтвердите, что вы не робот'); window.location.href='../index.php';</script>";
        } else {
            $secretKey = '6LdRA9YmAAAAAN83_X0H_-9yngoKezgRGtm3w8yg';
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$recapcha;
            $response = file_get_contents($url);
            $responseKey = json_decode($response, true);
        }
    }
    
    if($responseKey['success']) {
    
        $email_address = trim($_POST['email_address']);
        $password = trim($_POST['password']);

        $check_user = "SELECT * FROM `users` WHERE `email_address` = '$email_address'";
        $result = mysqli_query($connect, $check_user);
        $info_user = mysqli_fetch_array($result);

        $check_employee = "SELECT * FROM `employees` WHERE `email_address` = '$email_address'";
        $result = mysqli_query($connect, $check_employee);
        $info_employee = mysqli_fetch_array($result);

        if((empty($info_user['id_user'])) and (empty($info_employee['id_employee']))){
            echo "<script>alert('Неправильный адрес или пароль!'); window.location.href='../index.php';</script>";
            //header("location: ../index.php");
        } elseif((!empty($info_user['id_user'])) and (password_verify($password,$info_user['password']))) {
            $_SESSION['id_user'] = $info_user['id_user'];
            $_SESSION['second_name'] = $info_user['second_name'];
            $_SESSION['first_name'] = $info_user['first_name'];
            $_SESSION['patronymic'] = $info_user['patronymic'];
            $_SESSION['birthday'] = $info_user['birthday'];
            $_SESSION['phone_number'] = $info_user['phone_number'];
            $_SESSION['email_address'] = $info_user['email_address'];
            header("location: ../personal_area.php");
        } elseif((!empty($info_employee['id_employee'])) and (password_verify($password,$info_employee['password']))) {
            $_SESSION['id_employee'] = $info_employee['id_employee'];
            $_SESSION['second_name'] = $info_employee['second_name'];
            $_SESSION['first_name'] = $info_employee['first_name'];
            $_SESSION['patronymic'] = $info_employee['patronymic'];
            $_SESSION['id_position'] = $info_employee['id_position'];
            header("location: ../admin_area.php");
        } else {
            echo "<script>alert('Неправильный пароль!'); window.location.href='../index.php';</script>";
            //header("location: ../index.php");
        }
    }
?>
<body>
    
</body>