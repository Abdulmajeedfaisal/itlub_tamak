<?php
include("connection/connect.php"); //connection to db

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
 } else {
    $user_id = '';
 }


// sending query
mysqli_query($db,"DELETE FROM users_orders WHERE o_id = '".$_GET['order_del']."'"); 
header("location:your_orders.php"); 

?>
 