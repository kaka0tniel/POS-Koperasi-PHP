<?php 
    session_start(); 
    include_once('functions.php'); 
    if(!isset($_SESSION['is_logged_in'])){ 
    redirect('login.php'); 
    } 
    open_page('Update Barang'); 
    
    $id_inventory = $_GET['id_inventory'];
    
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasi'); 
    $result = mysqli_query($database,"SELECT * FROM inventory where id_inventory=".$id_inventory);
	$row = $result -> fetch_assoc();
   
?> 

<p align="center" ><font size="5px" font-face="Helvetica" align="center">Update Barang  <?php echo $id_inventory ?> : "<i><?php echo $row['nama_barang'] ?>"<i></font></p><br>
<form action="update_barang_process.php?id_inventory=<?php echo $id_inventory;?>" method="post"> 
    <table border="0" align="center" class="container" style="width:1000px;"> 
        <tr> 
            <td >Id Inventory</td> 
            <td>:</td> 
            <td><input type="text" name="id_inventory" value="<?php echo $row['id_inventory']?>"></td> 
        </tr> 
        <tr> 
            <td >Nama Barang</td> 
            <td>:</td> 
            <td><input type="text" name="nama_barang" value="<?php echo $row['nama_barang']?>"></td>
        </tr> 
        <tr> 
            <td >Harga</td> 
            <td>:</td> 
            <td><input type="text" name="Harga" value="<?php echo $row['Harga']?>"></td> 
        </tr> 
        <tr> 
            <td >Stock</td> 
            <td>:</td> 
            <td><input type="text" name="Stock" value="<?php echo $row['Stock']?>"></td> 
        </tr> 
        <tr>	
            <td align="center" colspan="3"><input type="submit" name="action" value="save"></td>
        </tr> 
    </table> 
    </form> 

<?php 
    close_page(); 
?> 