<?php

require 'admin_config.php';

$delete_row = $conn->query("DELETE from categories WHERE id = $categoryid");

if($delete_row){
    echo"Deleted Category";
    header('Location: deleteCategory.php');
}else{
    echo "No privilege do execute delete!";
    $conn->error;
}

?>



