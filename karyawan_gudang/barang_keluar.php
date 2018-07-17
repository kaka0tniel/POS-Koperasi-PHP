
<?php

include_once('functions.php');

open_page('history');
$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');
$query = 'SELECT history.id_history,history.id_flazz,history.id_inventory,inventory.nama_barang,history.jumlah_order,history.total_harga FROM history inner join inventory on history.id_inventory = inventory.id_inventory';
$result_set = $database->query($query);
?>
<link href="css.css" rel="stylesheet" type="text/css"></link>
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
    <script src="application.js" type="text/javascript" charset="utf-8"></script>
    
    
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  
<div id="search">
        <p align="right"> <label for="filter"></label><input type="text" name="filter" value="" id="filter" placeholder="pencarian nama barang"; style="width:20%; height:5%; border-radius:1%"/>
      </div>
<h1 "><p align="center"><font size="5" font-face="papyrus" backgroun-color="blue">History barang yang keluar</font></p></h1>
<?php
    echo('<table align="center">');
    echo('<tr>');
    echo('<td id = "HalamanInventory" >ID History</td>');
	echo('<td id = "HalamanInventory" >ID flazz</td>');
    echo('<td id = "HalamanInventory" >ID Inventory</td>');
    echo('<td id = "HalamanInventory" >Nama Barang</td>');
    echo('<td id = "HalamanInventory">Jumlah Order</td>');
    echo(' <td id = "HalamanInventory">total Harga</td>');
    echo('</tr>');
while($row = $result_set->fetch_assoc()){
    echo('<tr>');
    echo('<td id = "HalamanInventory2">' .$row['id_history']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['id_flazz']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['id_inventory']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['nama_barang']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['jumlah_order']. '</td>');
	echo('<td id = "HalamanInventory2">' .$row['total_harga']. '</td>');
    
    echo('</tr>');
}
echo('</table>');
echo('<br>');
echo('<br>');

echo('<table  align="center">');
echo('<tr><td><a href="inventory.php " class="btn btn-success"><input class="button" type="submit" class="button" value="Kembali ke inventory"  style="background-color: #D98B3A" /></a>');
echo('<a href="PieCart.php" class="btn btn-danger"><input class="button" type="submit" class="button" value="PieCart" style="background-color: #FCB941 "/></a>');
echo('<a href="logout.php" class="btn btn-warning"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a></td></tr>');

echo('</table>');



$database->close();
close_page();

?>