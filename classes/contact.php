<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'chardiegotis2003@gmail.com';
    $mail->Password = 'zwly mxpr axez vsro';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('chardiegotis2003@gmail.com');

    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo"
    <script>
    alert('Sent Successfully');
    document.location.href = '../contact.php';
     </script>
    ";
   
}
?>