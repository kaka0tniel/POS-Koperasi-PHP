<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kartu </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<h1>Pembayaran</h1>
<hr />
<div id="menucase">
  <div id="stylefour">
    <ul>
      <li><a >Keranjang</a></li>
      <li><a  class="current">Pembayaran</a></li>
      <li><a >Transaksi berhasil</a></li>
    </ul>
  </div>
</div>
<?php 
    session_start(); 
    include_once('functions.php'); 
    if(!isset($_SESSION['is_logged_in'])){ 
    redirect('../index.php'); 
    } 
    open_page('Form Bayar'); 
    $total_bayar=$_GET['total_bayar'];
?> 

<p align="center" ><font size="5px" font-face="Helvetica" align="center">Form Pembayaran </font></p><br>
<form action="bayar_process.php" method="post"> 
    <table border="0" align="center" class="container" style="width:1000px;"> 
        <tr> 
            <td >Total Bayar</td> 
            <td>:</td> 
            <td><input type="text" name="total_bayar" value="<?php echo ($total_bayar) ?>" readonly="true"></td> 
        </tr> 
        <tr> 
            <td >Id Kartu</td> 
            <td>:</td> 
            <td><input type="text" name="id_flazz" value=" "></td> 
        </tr> 
        <tr>
            <td align="center" colspan="3"><input type="submit" name="action" value="bayar" target="_blank"></td>
        </tr> 
    </table> 
    </form> 

<?php 
    close_page(); 
?> 
</body>
</html>