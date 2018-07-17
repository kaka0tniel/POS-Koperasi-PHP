
<script src="js_library.js"></script> 
    <script> 
        $(document).ready(function(){
            $("a").click(function(e){
                e.preventDefault();
                var xmlhttp;       
                var page = $(this).attr('href');
                if (window.XMLHttpRequest) 
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest(); 
                } 
                else 
                {// code for IE6, IE5 
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
                } 
                    xmlhttp.onreadystatechange=function() 
                { 
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    { 
						document.getElementById("div_book").innerHTML=xmlhttp.responseText; 
                    } 
                } 
                xmlhttp.open("GET",page,true);            
                xmlhttp.send();
            });
        });
    </script>
	
<?php

session_start();
include_once('functions.php'); //memanggil dan memastikan bahwa file yang disertakan hanya dieksekusi sekali saja
    open_page('List of Topup Del Flazz'); 
    $database = new mysqli('127.0.0.1', 'root', '', 'koperasiitdel'); 
    $query = 'SELECT * FROM del_flazz';
    $result_set = $database->query($query); 
?>


<link href="css.css" rel="stylesheet" type="text/css">
</link>

<?php
echo('<p align="center"><font size="5px" font-face="Helvetica" >Daftar Kartu Topup Del Flazz</font></p><br>');
echo '<center class="container">';        
    echo('<table border="0" bgcolor="white">');     
    echo('<tr bgcolor="gold">'); 
    echo('<td id="HalamanTopup">Flazz ID</td>');
    echo('<td id="HalamanTopup">Nama</td>');
    echo('<td id="HalamanTopup">Jumlah Saldo</td>'); 
    echo('<td id="HalamanTopup" colspan = 2>Menu</td>'); 
    echo('</tr>'); 
	
    while($row = $result_set->fetch_assoc()){ //????
        echo('<tr >'); 
		echo('<tr bgcolor="Lightgray">'); 
        echo('<td id="HalamanTopup">' .$row['id_flazz']. '</td>'); 
        echo('<td id="HalamanTopup">' .$row['Name']. '</td>');
        echo('<td id="HalamanTopup">' .$row['Jumlah_Saldo']. '</td>');
        echo('<td align="center" id="HalamanTopup" colspan = 2 ><a href="topup_form.php?id_flazz='.$row['id_flazz'].'">Topup</td>');
		
        echo('</tr>'); 
    }
    echo('</table>'); 
    $database->close(); //??
    close_page(); 
    echo '</center>';
?>
<div id="div_book"></div>
<table align="center">
    <tr>
        <!--<td>Anda Login Sebagai Topup Del Flazz,</td>-->
        <td>
            <?php 
                if(isset($_SESSION['is_logged_in'])){ 
                    echo('<br><a href="logout.php"><input class="button" type="submit" class="button" value="Logout" style="background-color: #4CAF50"/></a><br><br>'); 
                }else{ 
                    echo('<a href="../index.php" style="text-decoration: none;"><input class="button" type="submit" class="button" value="Login" style="background-color: #42729B"/></a><br><br>'); 
                } 
                close_page(); 
            ?> 
        </td>
    </tr>
  
</table>