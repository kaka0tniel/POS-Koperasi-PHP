<?php
session_start();
$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');	
include_once('functions.php');
// when no session named 'is_logged_in'?
if(!isset($_SESSION['is_logged_in'])){
    redirect('../index.php');
}
// retrieve posted form data
$id_inventory = $_POST['id_inventory'];
$nama_barang = $_POST['nama_barang'];
$Harga = $_POST['Harga'];
$Stock = $_POST['Stock'];

$query = 'INSERT INTO `inventory`(`id_inventory`, `nama_barang`,`Harga`,`Stock`) VALUES(?, ?, ?, ?)';
$statement = $database->prepare($query);
$statement->bind_param('ssid', $id_inventory, $nama_barang, $Harga, $Stock);
$statement->execute();
redirect('inventory.php');
?>  