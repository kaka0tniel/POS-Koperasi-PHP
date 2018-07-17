<?php

session_start();
include_once('functions.php');
$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 

// when no session named 'is_logged_in'? 
if (!isset($_SESSION['is_logged_in'])) {
    redirect('login.php');
} else {
    echo $_SESSION['is_logged_in'];
    $id_flazz = $_GET['id_flazz'];
    // retrieve posted form data 

    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query='DELETE FROM del_flazz WHERE id_flazz=?';
    $delete= $database->prepare($query);
    $delete->bind_param('i', $id_flazz);
    $delete->execute();
    
    $database->close();
    redirect('delete_customer.php'); 
}
?> 
