	
<?php
session_start();
include_once('functions.php'); //memanggil dan memastikan bahwa file yang disertakan hanya dieksekusi sekali saja
    open_page('List of Topup Del Flazz'); 
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'SELECT * FROM del_flazz';
    $result_set = $database->query($query); 
?>


<link href="css.css" rel="stylesheet" type="text/css">
</link>

<?php
if (!isset($_SESSION['is_logged_in'])) {
    redirect('index.php');
} else {
    echo $_SESSION['is_logged_in'];
echo('<p align="center"><font size="5px" font-face="Helvetica" >Daftar Kartu Topup Del Flazz</font></p><br>');
echo '<center class="container">';        
    echo('<table border="0" bgcolor="white">');     
    echo('<tr bgcolor="gold">'); 
    echo('<td id="HalamanTopup">Flazz ID</td>');
    echo('<td id="HalamanTopup">Nama</td>');
    echo('<td id="HalamanTopup">Jumlah Saldo</td>'); 
    echo('<td id="HalamanTopup" colspan = 2>Menu</td>'); 
    echo('</tr>'); 
	
    while($row = $result_set->fetch_assoc()){ //????
        echo('<tr >'); 
		echo('<tr bgcolor="Lightgray">'); 
        echo('<td id="HalamanTopup">' .$row['id_flazz']. '</td>'); 
        echo('<td id="HalamanTopup">' .$row['Name']. '</td>');
        echo('<td id="HalamanTopup">' .$row['Jumlah_Saldo']. '</td>');
		echo('<td><a href="delete_customer_proses.php?id_flazz='.$row['id_flazz'].'"><button>Delete</button></td>'); 
        echo('</tr>'); 
    }
    echo('</table>'); 
    $database->close(); //??
    close_page(); 
    echo '</center>';
}
?>
<div id="div_book"></div>
<table align="center">
    <tr>
        <!--<td>Anda Login Sebagai Admin,</td>-->
        <td>
            <?php 
                if(isset($_SESSION['is_logged_in'])){ 
                    echo('<br><a href="logout.php" style="text-decoration: none;"><input type="submit" class="button" value="Logout"  /></a><br><br>'); 
                }else{ 
                    echo('<a href="login.php" style="text-decoration: none;"><input type="submit" class="button" value="Login"  /></a><br><br>'); 
                } 
                close_page(); 
            ?> 
        </td>
    </tr>
  
</table>