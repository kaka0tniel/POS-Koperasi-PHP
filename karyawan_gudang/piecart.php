
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Grafik Penjualan Barang </title>
	<!-- Bagian css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<script src="assets/js/highcharts.js"></script>
	
	<script src="assets/js/jquery-1.10.1.min.js"></script>
	
	<script>
		var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Statistik Penjualan Barang '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
					    include "connection.php";
						$query = mysqli_query($con,"SELECT inventory.nama_barang from history inner join inventory on history.id_inventory = inventory.id_inventory");
					 
						while ($row = mysqli_fetch_array($query)) {
							$nama_barang = $row['nama_barang'];
						 
							$data = mysqli_fetch_array(mysqli_query($con,"SELECT history.jumlah_order from history inner join inventory on history.id_inventory = inventory.id_inventory where inventory.nama_barang='$nama_barang'"));
							$jumlah = $data['jumlah_order'];
							?>
							[ 
								'<?php echo $nama_barang ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
	</script>
	
        
</head>
<body>

</br></br></br></br>
<!--- Bagian Judul-->	
<div class="container" style="margin-top:20px">
	<div class="col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">Grafik Penjualan Barang</div>
				<div class="panel-body">
					<div id ="mygraph"></div>
				</div>
				
		</div>
	</div>
</div>
<?php

echo('<br><center>');
echo('<a href="inventory.php " class="btn btn-success"><input class="button" type="submit" class="button" value="Kembali ke Inventory"  style="background-color: #D98B3A" /></a>');
echo('&nbsp&nbsp&nbsp<a href="logout.php" class="btn btn-warning"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a></td></tr>');


?>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>

</body>
</html>
