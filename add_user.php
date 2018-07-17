<?php
	session_start();
	
	include_once('functions.php');
	
	if(!isset($_SESSION['is_logged_in'])){
	redirect('index.php');
	}
	
	open_page('add user');
?>

<link href="css.css" rel="stylesheet" type="text/css">
</link>

<body>

    	<form action="add_user_process.php" method="post">
		<table class="add_table">
		<tr>
		<td>Id Flazz</td>
		<td><input class="text_" type="text" name="id_flazz" ></td>
		</tr>
		<tr>
		<td>Nama</td>
		<td><input class="text_" type="text" name="Name" ></td>
		</tr>
		<tr>
		<td>Jumlah Saldo</td>
		<td><input class="text_" type="text" name="Jumlah_Saldo" ></td>
		</tr>
		<tr>
		<td> </td>
		<td><input class="submit_" type="submit" name="action" value="SAVE"></td>
		</tr>
		</table>
	</form>
</form>
</body>
<?php
	close_page();
?>