<?php

session_start();
include_once('functions.php');
// when no session named 'is_logged_in'? 
if (!isset($_SESSION['is_logged_in'])) {
    redirect('../index.php');
} else {
    echo $_SESSION['is_logged_in'];
    $id_flazz = $_GET['id_flazz'];
    // retrieve posted form data
    $saldo_baru = $_POST['saldo_baru'];
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $result = mysqli_query($database,"SELECT * FROM del_flazz where id_flazz=".$id_flazz);
    $row = mysqli_fetch_array($result);
    
    
    if($saldo_baru>100000){
        //echo("Pengisian Tidak Dapat Dilakukan");
        redirect('saldo_baru_error.php?id_flazz='.$id_flazz);
    }else{
    $saldo_lama=$row['Jumlah_Saldo'];
    $Jumlah_Saldo=$saldo_baru+$saldo_lama;
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'UPDATE del_flazz SET `Jumlah_Saldo`=? where id_flazz=?'; 
    $statement = $database->prepare($query); 
    $statement->bind_param('di', $Jumlah_Saldo, $id_flazz); 
    $statement->execute(); 
    mysqli_close($database);
    redirect('topup.php'); 
    }
}
?> 


<?php
close_page();
?>
