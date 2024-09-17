<?php
    session_start();
    include "../php-connect/connect.php";

    if(isset($_POST['contact_name'])) {
        $contact_name = $_POST['contact_name'];
        if ($contact_name === '') {
            unset($contact_name);
        }
    }

    if(isset($_POST['contact_phone'])) {
        $contact_phone = $_POST['contact_phone'];
        if ($contact_phone === '') {
            unset($contact_phone);
        }
    }

    if(isset($_POST['contact_email'])) {
        $contact_email = $_POST['contact_email'];
        if ($contact_email === '') {
            unset($contact_email);
        }
    }

    if(isset($_POST['contact_text'])) {
        $contact_text = $_POST['contact_text'];
        if ($contact_text === '') {
            unset($contact_text);
        }
    }

    $to = "isip_m.d.chinenov@mpt.ru";
    $theme = "Форма обратной связи";
    $message = "Имя: ".$contact_name."<br>Номер-телефона: ".$contact_phone."<br>E-mail: ".$contact_email."<br><br>Сообщение: ".$contact_text."";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($to, $theme, $message, $headers);
    header("location: ../contacts.php");
?>
<body>
    
</body>