<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Keranjang</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
<h1>Pemilihan barang</h1>
<hr />
<div id="menucase">
  <div id="stylefour">
    <ul>
      <li><a class="current">Keranjang</a></li>
      <li><a >Pembayaran</a></li>
      <li><a >Transaksi berhasil</a></li>
    </ul>
  </div>
</div>
<?php 
    session_start();
    include_once('functions.php'); 
    
    open_page('Index_Kasir'); 
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'SELECT t.id_transaksi, t.id_inventory, t.jumlah_order, t.total_harga, i.nama_barang FROM transaksi t JOIN inventory i ON t.id_inventory=i.id_inventory'; //??
    $result_set = $database->query($query);//?? 
    $total_bayar=0;
    $date=  date('d F Y, G:i A');
    echo '<center>';
    echo('<p align="center"><font size="5px" font-face="Helvetica" >Daftar Belanja Anda</font></p>');    
    echo('<table border="0" >'); 	
    echo('<tr >'); 
    echo('<td id = "HalamanInventory">Transaksi ID</td>'); 
    echo('<td id = "HalamanInventory">Nama</td>'); 
    echo('<td id = "HalamanInventory">Jumlah Order</td>'); 
    echo('<td id = "HalamanInventory">Total Price</td>');
    echo('<td id = "HalamanInventory">Hapus List</td>');
    echo('</tr>'); 
    $i=0;
    while($row = $result_set->fetch_assoc()){ //????
        $i++;
        echo('<tr>'); 
        echo('<td id = "HalamanInventory2">' .$i. '</td>'); 
        echo('<td id = "HalamanInventory2">' .$row['nama_barang']. '</td>'); 
        echo('<td id = "HalamanInventory2">' .$row['jumlah_order']. '</td>'); 
        echo('<td id = "HalamanInventory2">' .$row['total_harga']. '</td>');
        echo('<td td id = "HalamanInventory2"><a href="hapus_list_process.php?id_inventory='.$row['id_inventory'].'"><button style="background-color:DarkSalmon">Delete</button></td>'); 
        echo('</tr>');
        $total_bayar += $row['total_harga'];
        
    } 
	
    echo('<tr><td bgcolor="#FCB941" colspan=3> Total Bayar' .'</td>');
    echo('<td bgcolor="#FCB941"  colspan=2>'.$total_bayar .'</td></tr>');
    echo('<tr><td bgcolor="#FCB941" align="center" colspan=5> <a href="form_bayar.php?total_bayar='.$total_bayar.'"><button style="background-color: Bisque">Bayar</button>' .'</td></tr>');
?> 

<p align="center"><font size="6px" font-face="Helvetica"></p>

<form action="add_to_list.php" method="post" class="container"> 
    <p align="center"><font size="5px" font-face="Helvetica" align="center"></font><br>
    <label>
        <span>ID Inventory :</span>
        <input id="1" type="text" name="id_inventory"  required />
    </label>
   
    <label>
        <span>Jumlah Order :</span> 
        <input id="2" type="text" name="jumlah_order"  required />
    </label>
    <label>
        <input type="submit" name="action" value="Order" required="">
    </label> 
</form> 

<table align="center">
    <tr>
        <td>Anda Login Sebagai Kasir, </td>
        <td>
            <?php 
                if(isset($_SESSION['is_logged_in'])){ 
                    echo('<a href="logout.php" class="btn btn-warning"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a></td></tr>');
                }else{ 
                    echo('<a href="../index.php" style="text-decoration: none;"><input type="submit" class="button" value="Login"  /></a><br>'); 
                } 
                close_page(); 
            ?> 
        </td>
    </tr>
  
</table>
</body>
<?php 
    close_page(); 
?> 
</html>