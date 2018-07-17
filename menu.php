<?php
	session_start();
	include_once('functions.php');
	open_page('index');
?>

    <link href="css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="lineicons/style.css">    
    <link href="css/style.css" rel="stylesheet">
    
    
  </head>
  <h2><center>Welcome Admin</center></h2>
  <body>
           
    
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<a href="add_user.php"><span class="li_user"></span>
					  		</div>
					  			<p>Add New Customer</a></p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<a href="delete_customer.php"><span class="li_trash"></span>
					  			
                  			</div>
					  			<p>Delete Customer</a></p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<a href="kasir/kasir.php"><span class="li_banknote"></span>
					  			</div>
					  			<p>Kasir</a></p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<a href="karyawan_gudang/inventory.php"><span class="li_news"></span>
					  		
                  			</div>
					  			<p>List Barang</a></p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<a href="topup.php"><span class="li_data"></span>
					  			
                  			</div>
					  			<p><a href="topup.php">Top-Up</a></p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                  
                  
<center>
<?php
	if(isset($_SESSION['is_logged_in'])){
		echo('<a href="logout.php">Logout</a><br>');
	}else{
		echo('<a href="login.php">login</a><br>');
	}
close_page();
?>
</center>
</frame>