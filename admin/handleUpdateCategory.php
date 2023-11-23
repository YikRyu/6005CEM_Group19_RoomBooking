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
$roomname = $_POST['roomname'];
$guests = $_POST['guests'];
$available = $_POST['available'];

if(count($_POST)>0) {
    mysqli_query($conn, "UPDATE `categories` SET `roomname`='$roomname',`guests`='$guests',`available`='$available' WHERE `id` = $roomid");
}

header("Location: addUpdateCategory.php");

?>

