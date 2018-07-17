<?php 
    include_once('functions.php'); 
    
    open_page('Bayar False'); 
    $id_flazz=$_GET['id_flazz'];
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query =mysqli_query($database, "SELECT * FROM del_flazz WHERE id_flazz = $id_flazz"); //??
    $result_set = $query->fetch_array();
?> 
<br><br><br><br><br><br><br><br><br>

<form  action="kasir.php" class="container" style="vertical-align: center; width:400px;" /> 
    <p align="center" style="font-size: 30px;"><strong>Pembayaran Gagal</p>
    <label>
        <strong>Saldo anda tidak mencukupi untuk melakukan pembayaran ini </strong><br>
        <strong>Saldo Saat ini : <?php echo ($result_set['Jumlah_Saldo']);?></strong>
    </label>
   
    
    <label style="margin: auto;width: 35%;">
        <input type="submit" class="button" name="action" value="Kembali"  />
    </label>   
    
</form> 

<?php 
    close_page(); 
?> 