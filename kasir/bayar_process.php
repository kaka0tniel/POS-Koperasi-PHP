<?php 
    
    include_once('functions.php'); 
    
    // when no session named 'is_logged_in'? 
    if (!isset($_SESSION['is_logged_in'])) {
    redirect('../index.php');
	}
   
    // retrieve posted form data 
    $total_bayar=$_POST['total_bayar'];
    $id_flazz=$_POST['id_flazz'];
    
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query =mysqli_query($database, "SELECT * FROM del_flazz WHERE id_flazz = $id_flazz"); //??
    $result_set = $query->fetch_array();
    
    
    if($result_set['Jumlah_Saldo'] < $total_bayar){
        mysqli_close($database);
        redirect("bayar_false.php?id_flazz=".$id_flazz);
        
    }
    
    
    else if($result_set['Jumlah_Saldo'] >= $total_bayar){
        $saldo_lama=$result_set['Jumlah_Saldo'];
        $Jumlah_Saldo=$saldo_lama-$total_bayar;
    
        $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
        $query = 'UPDATE del_flazz  SET  `Jumlah_Saldo`=? where id_flazz=?'; 
        $statement = $database->prepare($query); 
        $statement->bind_param('di',$Jumlah_Saldo, $id_flazz); 
        $statement->execute();
        
        mysqli_close($database);
		
        redirect("bayar_suc.php?Jumlah_Saldo=".$Jumlah_Saldo);
		
        //redirect('bayar_true.php?saldo='.$saldo_baru); 
    }    
    
?> 