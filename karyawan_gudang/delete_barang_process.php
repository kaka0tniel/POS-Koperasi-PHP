<?php

session_start();
include_once('functions.php');

// when no session named 'is_logged_in'? 
if (!isset($_SESSION['is_logged_in'])) {
    redirect('../index.php');
} else {
    echo $_SESSION['is_logged_in'];
    $id_inventory = $_GET['id_inventory'];
    // retrieve posted form data 

    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');
    mysqli_query($database,"DELETE FROM inventory WHERE id_inventory= $id_inventory");
    mysqli_close($database);
    redirect('inventory.php'); 
}
?> 
