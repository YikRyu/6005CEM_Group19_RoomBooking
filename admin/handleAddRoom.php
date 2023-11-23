<?php
$roomnum = $_POST['roomnum'];
$price = $_POST['price'];
$roomtype = $_POST['roomtype'];

require 'admin_config.php';

if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into rooms(roomnum, price, category_id) value(?,?,?) ");
    $stmt->bind_param("sss", $roomnum, $price, $roomtype);
    $stmt->execute();
    print 'registered successfully';
    $stmt->close();
    $conn->close();
    header('Location: addUpdateRoom.php');
}

?>