<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<h1>Proses pembayaran</h1>
<hr />
<div id="menucase">
  <div id="stylefour">
    <ul>
      <li><a>Keranjang</a></li>
      <li><a >Pembayaran</a></li>
      <li><a class="current">Transaksi berhasil</a></li>
    </ul>
  </div>
</div>
<?php
session_start();
$database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = "SELECT i.id_inventory, i.nama_barang, i.Harga, t.jumlah_order, t.total_harga FROM inventory i
                INNER JOIN transaksi t
                ON i.id_inventory = t.id_inventory ";
    
$result_set = $database->query($query);
$total = 0;

while($row = $result_set->fetch_assoc()){
 $total += $row['total_harga'];
}
//$topup_id=$_GET['topup_id'];
$saldo_baru = $_GET['Jumlah_Saldo'];

echo('<h1 align="center"><font size="5px" font-face="Helvetica" >Transaksi berhasil, terima kasih</font></h1>');    
echo ('<center><br><br><br> <a >Jumlah Transaksi &nbsp &nbsp &nbsp : &nbsp&nbsp&nbsp'.$total. '</a>' );
echo ('<br>');
echo ('<center> <a >Jumlah Saldo Custommer &nbsp &nbsp &nbsp : &nbsp&nbsp&nbsp'.$saldo_baru. '</a>' );
echo('<br><br><br><a href="kasir.php " class="btn btn-success"><input class="button" type="submit" class="button" value="Kembali ke Kasir"  style="background-color: #D98B3A" /></a>');
echo('&nbsp&nbsp&nbsp<a href="logout.php" class="btn btn-warning"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a></td></tr>');


mysqli_query($database, "DELETE FROM transaksi");
?>	
</body>
</html>