<?php

$userid = $_POST['users'];

require 'admin_config.php';

$delete_row = $connection->query("DELETE from users WHERE id = $userid");

if($delete_row){
    echo"Deleted User";
    header('Location: deleteUsers.php');
}else{
    echo "No privilege do execute delete!";
    $conn->error;
}

?>
