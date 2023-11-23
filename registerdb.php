<?php
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPass = $_POST['confirmPass'];
$phone = $_POST['phone'];

if($password != $confirmPass){
    header('Location: user_register.php');
    exit();
}

require 'config.php';
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    //password hashing 
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("insert into users(name, email, password, tel) value(?,?,?,?) ");
    $stmt->bind_param("ssss", $username, $email, $password, $phone);
    $stmt->execute();
    print 'registered successfully';
    $stmt->close();
    $conn->close();
    header('Location: user_login.php');
}

?>