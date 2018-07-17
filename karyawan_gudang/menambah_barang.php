<?php
session_start();
include_once('functions.php');
if(!isset($_SESSION['is_logged_in'])){
    redirect('index.php');
}
open_page('menambah barang');
?>

<link href="css.css" rel="stylesheet" type="text/css">
</link>

<br><br><br><br>
<form action="menambah_barang_process.php" method="post">
    <table class="add_table">
		
		<tr>
		<td>Nama Barang</td>
		<td><input class="text_" type="text" name="nama_barang" ></td>
		</tr>
		<tr>
		<td>Harga</td>
		<td><input class="text_" type="text" name="Harga" ></td>
		</tr>
		<tr>
		<td>Stock</td>
		<td><input class="text_" type="text" name="Stock" ></td>
		</tr>
		<tr>
		<td> </td> 
		<td><br><input class="submit_" type="submit" name="action" value="SAVE"></td>
		</tr>
    </table>
</form>

<?php
close_page();
?>