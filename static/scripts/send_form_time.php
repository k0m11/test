<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключение PHPMailer (пути для Beget)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Данные из формы
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['tel']);
$time = htmlspecialchars($_POST['time']);

// Настройка письма
$mail = new PHPMailer(true);
try {
    // Настройки SMTP Beget
    $mail->isSMTP();
    $mail->Host = 'smtp.beget.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@stopkranspb.ru'; // Замените на реальную почту
    $mail->Password = 'DssdasfHJHJ^&^1&'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // От кого
    $mail->setFrom('no-reply@stopkranspb.ru', 'Заявка с сайта');
    // Кому
    $mail->addAddress('stopkran11@ya.ru');
    
    // Тема и тело письма
    $mail->Subject = 'Новая заявка (с указанием времени)';
    $mail->Body = "Имя: $name\nТелефон: $phone\nВремя подачи: $time";

    $mail->send();
} catch (Exception $e) {
    echo "Ошибка: {$mail->ErrorInfo}";
}
?>