<?php 
    session_start(); 
    include_once('functions.php'); 
    
    // when no session named 'is_logged_in'? 
    if(!isset($_SESSION['is_logged_in'])){ 
        redirect('../index.php'); 
    } 
    
    $total_bayar = $_GET['total_bayar'];
    open_page('form pembayaran');
?>
    
<form action="bayar_proses.php" method="post">
    <table border="1" align="center" class="bread">
        <tr>
            <td>Total_Harga</td>
            <td>:</td>
            <td><input type="text" name="total_bayar"value="<?php echo $total_bayar; ?>" readonly="true"></td>
        </tr>
        <tr>
            <td>Flazz_id</td>
            <td>:</td>
            <td><input type="text" name="flazz_id"></td>
        </tr>
        <tr>
        <td colspan = "3">
            <a href=""><input type="submit" name="action" value="bayar"></a>
        </td>
    </table>
</form>
<?php
    close_page();
?>