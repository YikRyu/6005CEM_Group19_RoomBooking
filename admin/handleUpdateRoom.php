<?php

$servername = 'localhost';
$username = 'room_booking_admin';
$password = 'roomBooking_admin';
$dbname = 'room_booking';
$conn = mysqli_connect($servername,$username,$password, "$dbname");
if(!$conn){
    die('Could not Connect My Sql:'.mysql_error());
}

$roomid = $_POST['id'];
$roomnum = $_POST['roomnum'];
$price = $_POST['price'];
$roomtype = $_POST['roomtype'];

if(count($_POST)>0) {
    mysqli_query($conn, "UPDATE `rooms` SET `roomnum`='$roomnum',`price`='$price',`category_id`='$roomtype' WHERE `id` = $roomid");
}

header("Location: addUpdateRoom.php");

?>

