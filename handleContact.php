<?php

$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$context = $_POST['context'];


require 'config.php';
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into user_contact(userid, username, useremail, phone, subject, context) value(?,?,?,?,?,?) ");
    $stmt->bind_param("ssssss", $userid, $name, $email, $phone, $subject, $context);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: contact.php');
    echo '<script>alert("Thank you for your feedback!")</script>';
}


?>
