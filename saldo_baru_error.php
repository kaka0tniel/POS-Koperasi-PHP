<?php 
    include_once('functions.php'); //memanggil dan memastikan bahwa file yang disertakan hanya dieksekusi sekali saja
    if(isset($_SESSION['is_logged_in'])){ 
        redirect('index.php'); 
    } 
    open_page('Bayar False'); 
    $id_flazz=$_GET['id_flazz'];
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasi'); 
    $query =mysqli_query($database, "SELECT * FROM del_flazz WHERE id_flazz = $id_flazz"); //??
    $result_set = $query->fetch_array();
?> 
<br><br><br><br><br><br><br>

<form  action="topup.php" class="container" style="vertical-align: center; width:400px;" /> 
    <p align="center" style="font-size: 30px;"><strong>Penambahan Saldo Gagal</p>
    <label>
        <strong>Penambahan Saldo Harus Lebih Kecil dari Rp.100000,-</strong>
    </label>
   
    
    <label style="margin: auto;width: 35%;">
        <input type="submit" class="button" name="action" value="Kembali"  />
    </label>   
    
</form> 

<?php 
    close_page(); 
?> 