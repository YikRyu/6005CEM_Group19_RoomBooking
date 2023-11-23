<?php

if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    session_start();
    $conn = new mysqli('localhost', 'room_booking_user', 'roomBooking_user', 'room_booking');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
else{
    session_start();
    $conn = new mysqli('localhost', 'room_booking_no_user', 'roomBooking_noUser', 'room_booking');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
