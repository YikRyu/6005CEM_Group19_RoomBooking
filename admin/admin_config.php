<?php

session_start();
if(isset($_SESSION['admin'])){
    $conn = new mysqli('localhost', 'room_booking_admin', 'roomBooking_admin', 'room_booking');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}else{
    $conn = new mysqli('localhost', 'room_booking_no_user', 'roomBooking_noUser', 'room_booking');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}


?>

