<?php
$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$roomdid = $_POST['roomid'];
$roomnum = $_POST['roomnum'];
$price = $_POST['price'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];


require 'config.php';
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into user_booking(userid, username, useremail, phone, roomid, roomnum, price, checkin, checkout) value(?,?,?,?,?,?,?,?,?) ");
    $stmt->bind_param("sssssssss", $userid, $name, $email, $phone, $roomdid, $roomnum, $price, $checkin, $checkout);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: loggedhome.php');
    echo '<script>alert("Booking Successfull, payments are to be made on the property...")</script>';
}

?>