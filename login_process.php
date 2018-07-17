<?php
	session_start();
	include_once('functions.php');
	
	
	if(isset($_SESSION['is_logged_in'])){
	redirect('index.php');
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	 $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel');
	$query = 'SELECT * FROM account WHERE username=? AND password=?';
	$statement = mysqli_prepare($database, $query);
	mysqli_stmt_bind_param($statement, 'ss', $username, $password);
	mysqli_stmt_execute($statement);
	$role_admin = 'admin';
	$role_kasir = 'kasir';
	$role_karyawan = 'karyawan';
	$role_petugas = 'petugas';
	$result_set = mysqli_stmt_get_result($statement);
	if(mysqli_num_rows($result_set)){
		if($username==$role_karyawan){
				$_SESSION['is_logged_in'] = TRUE;
				redirect('karyawan_gudang/inventory.php');
		}else if ($username==$role_admin){
			$_SESSION['is_logged_in'] = TRUE;
			redirect('menu.php');
		}else if($username==$role_kasir){
			$_SESSION['is_logged_in'] = TRUE;
			redirect('kasir/kasir.php');
		}else{
			$_SESSION['is_logged_in'] = TRUE;
			redirect('topup.php');
		}
		
	}else{
		redirect('index.php');
	}

mysqli_stmt_close($statement);
mysqli_close($database);