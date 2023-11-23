<?php
require 'admin_config.php';
$roomid = $_POST['room'];


$delete_row = $conn->query("DELETE from rooms WHERE id = $roomid");

if($delete_row){
    echo"Deleted Booking";
    header('Location: deleteRoom.php');
}else{
    echo "No privilege do execute delete!";
    $conn->error;
}

?>


