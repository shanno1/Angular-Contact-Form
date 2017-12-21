<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'phpmailer/PHPMailerAutoload.php';

if (isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputAge']) && isset($_POST['inputMessage'])) {

    //check if any of the inputs are empty
    if (empty($_POST['inputName']) || empty($_POST['inputEmail']) || empty($_POST['inputAge']) || empty($_POST['inputMessage'])) {
        $data = array('success' => false, 'message' => 'Please fill out the form completely.');
        echo json_encode($data);
        exit;
    }

    //create an instance of PHPMailer
    $mail = new PHPMailer();

    $mail->From = $_POST['inputEmail'];
    $mail->FromName = $_POST['inputName'];
    $mail->AddAddress('yourname@hotmail.com'); //recipient 
    $mail->Subject = "BBSITUS.COM ENQUIRY";
    $mail->Body = "Name: " . $_POST['inputName'] ."\r\n\r\nEmail Address:\r\n " . $_POST['inputEmail'] . "\r\n\r\nAge:\r\n "  . $_POST['inputAge'] . "\r\n\r\nMessage:\r\n "  . $_POST['inputMessage'];

    if (isset($_POST['ref'])) {
        $mail->Body .= "\r\n\r\nRef: " . $_POST['ref'];
    }

    if(!$mail->send()) {
        $data = array('success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($data);
        exit;
    }

    $data = array('success' => true, 'message' => 'Thanks! We have received your message.');
    echo json_encode($data);

/*    if (isset($_POST['inputName'])) { echo $_POST['inputName'];}
    if (isset($_POST['inputEmail'])) { echo $_POST['inputEmail'];}
    if (isset($_POST['inputAge'])) { echo $_POST['inputAge'];}
    if (isset($_POST['inputSubject'])) { echo $_POST['inputSubject'];}
    if (isset($_POST['inputMessage'])) { echo $_POST['inputMessage'];}
*/
} else {

    $data = array('success' => false, 'message' => 'Please fill out the form completely.');
    echo json_encode($data);

}