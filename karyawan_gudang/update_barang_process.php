<?php 
    session_start(); 
    include_once('functions.php'); 
    
    // when no session named 'is_logged_in'? 
    if(!isset($_SESSION['is_logged_in'])){ 
        redirect('../login.php'); 
    } 
    
    // retrieve posted form data 
    $id_inventory = $_POST['id_inventory']; 
    $nama_barang = $_POST['nama_barang']; 
    $Harga = $_POST['Harga']; 
    $Stock = $_POST['Stock']; 
 
    
 $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');
    $query = 'UPDATE inventory set `id_inventory`=?, `nama_barang`=?, `Harga`=?,`Stock`=? where id_inventory = ?'; 
    $statement = $database->prepare($query); 
    $statement->bind_param('ssids', $id_inventory, $nama_barang, $Harga, $Stock,$id_inventory); 
    $statement->execute(); 
    mysqli_close($database);
    redirect('inventory.php'); 
?> 
