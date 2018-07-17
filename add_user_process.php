<?php
	session_start();
	include_once('functions.php');
	
	
	// when no session named 'is_logged_in'?
	if(!isset($_SESSION['is_logged_in'])){
		redirect('index.php');
	}
	
	// retrieve posted form data
	$id_flazz= $_POST['id_flazz'];
	$Name= $_POST['Name'];
	$Jumlah_Saldo= $_POST['Jumlah_Saldo'];
	
	$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
	$query  =  'INSERT  INTO  del_flazz(`id_flazz`,`Name`,  `Jumlah_Saldo`) VALUES(?, ?, ?)';

	$statement = $database->prepare($query);
	$statement->bind_param('iss', $id_flazz, $Name, $Jumlah_Saldo);
	$statement->execute();
	
	redirect('menu.php');