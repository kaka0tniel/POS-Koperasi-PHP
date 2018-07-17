<?php 
    session_start(); 
    include_once('functions.php'); 
    if(!isset($_SESSION['is_logged_in'])){ 
    redirect('../index.php'); 
    } 
    open_page('Topup Kartu Del Flazz'); 
    $id_flazz = $_GET['id_flazz'];
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'SELECT * FROM del_flazz';
    $result_set = $database->query($query);
    $row = $result_set->fetch_assoc();
?> 
<link href="css.css" rel="stylesheet" type="text/css">
</link>
<form action="topup_process.php?id_flazz=<?php echo $id_flazz;?>" method="post" class="container"> 
    <p align="center"><font size="5px" font-face="Helvetica" align="center"><br>Topup Del Flazz  <?php echo $id_flazz ?> : <?php echo $row['Name'] ?></font>
        <br><br>
    <label>
		<align="center"><fieldset id="FormAction">
		<legend align="center"><h3>Penambahan Saldo</h3></legend>
        Masukkan Jumlah : <input id="1" type="text" name="saldo_baru"  required />
		<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="submit2" type="submit" name="action" value="Topup">
		</fieldset>
    </label> 
    
</form> 

<?php 
    close_page(); 
?> 