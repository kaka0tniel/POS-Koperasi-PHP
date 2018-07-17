<?php 
    session_start(); 
    include_once('functions.php'); 
    
    // when no session named 'is_logged_in'? 
    if(!isset($_SESSION['is_logged_in'])){ 
        redirect('../index.php'); 
    } 
    
    // retrieve posted form data 
    //$transaksi_id= $_POST['id_transaksi'];
    $id_inventory = $_POST['id_inventory'];
    $jumlah_order = $_POST['jumlah_order']; 
	
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'SELECT * FROM inventory where id_inventory='.$id_inventory; //??
    $result_set = $database->query($query);//?? 
    $row = $result_set->fetch_assoc();
    
    $jumlah_lama=$row['Stock'];
    $harga=$row['Harga'];
	 
	
    $order = $jumlah_order;
    $jumlah = $jumlah_lama - $jumlah_order;
	
    $total_harga=$jumlah_order*$harga;
    
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'INSERT INTO transaksi( `id_inventory`, `jumlah_order`,`total_harga` ) VALUES( ?, ?, ?)'; 
    $statement = $database->prepare($query); 
    $statement->bind_param('iid', $id_inventory, $jumlah_order,$total_harga); 
    $statement->execute(); 
	
	$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'INSERT INTO history( `id_inventory`, `jumlah_order`,`total_harga` ) VALUES( ?, ?, ?)'; 
    $statement = $database->prepare($query); 
    $statement->bind_param('iid', $id_inventory, $jumlah_order,$total_harga); 
    $statement->execute(); 
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'UPDATE inventory SET  `Stock`=? where id_inventory='.$id_inventory; 
    $statement = $database->prepare($query); 
    $statement->bind_param('i', $jumlah); 
    $statement->execute(); 
    $row = $result_set->fetch_assoc();
    
    redirect('kasir.php'); 
	
?> 