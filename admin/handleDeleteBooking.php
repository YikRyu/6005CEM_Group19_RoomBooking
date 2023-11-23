<?php

$bookid = $_POST['booking'];

require 'admin_config.php';

$delete_row = $conn->query("DELETE from user_booking WHERE id = $bookid");

if($delete_row){
    echo"Deleted Booking";
    header('Location: deleteBooking.php');
}else{
    echo "No privilege do execute delete!";
    $conn->error;
}

?>
