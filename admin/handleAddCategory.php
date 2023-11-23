<?php
$roomname = $_POST['roomname'];
$guests = $_POST['guests'];
$available = $_POST['available'];

require 'admin_config.php';

if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into categories(roomname, guests, available) value(?,?,?) ");
    $stmt->bind_param("sss", $roomname, $guests, $available);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: addUpdateCategory.php');
}

?>

