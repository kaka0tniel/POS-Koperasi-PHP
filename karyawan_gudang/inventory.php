
<?php
include_once('functions.php');

open_page('inventory');

$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');
$query = 'SELECT * FROM inventory';
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
<h1 ><p align="center"><font size="5" font-face="papyrus" backgroun-color="blue">List Barang</font></p></h1>
<?php
    echo('<table align="center">');
    echo('<tr>');
    echo('<td id = "HalamanInventory" >ID Inventory</td>');
    echo('<td id = "HalamanInventory" >Nama Barang</td>');
    echo('<td id = "HalamanInventory">Harga</td>');
    echo(' <td id = "HalamanInventory">Stock</td>');
    echo('<td id = "HalamanInventory"  colspan = 2>Menu</td>');
    echo('</tr>');
while($row = $result_set->fetch_assoc()){
    echo('<tr>');
    echo('<td id = "HalamanInventory2">' .$row['id_inventory']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['nama_barang']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['Harga']. '</td>');
    echo('<td id = "HalamanInventory2">' .$row['Stock']. '</td>');
    echo('<td td id = "HalamanInventory2"><a href="update_barang.php?id_inventory='.$row['id_inventory'].'"><button style="background-color: Bisque">Update</button></td>'); 
    echo('<td td id = "HalamanInventory2"><a href="delete_barang_process.php?id_inventory='.$row['id_inventory'].'"><button style="background-color:DarkSalmon">Delete</button></td>'); 
    echo('</tr>');
}
echo('</table>');
echo('<br>');
echo('<br>');

echo('<table  align="center">');
echo('<tr><td><a href="menambah_barang.php " class="btn btn-success"><input class="button" type="submit" class="button" value="Tambah Barang Baru"  style="background-color: #D98B3A" /></a>');
echo('<a href="barang_keluar.php" class="btn btn-danger"><input class="button" type="submit" class="button" value="Barang keluar" style="background-color: #FCB941 "/></a>');
echo('<a href="logout.php" class="btn btn-warning"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a></td></tr>');

echo('</table>');



$database->close();
close_page();

?>