<?php 
    session_start(); 
    include_once('functions.php'); 
    
    open_page('Index');  
?> 
<br>
<link href="css.css" rel="stylesheet" type="text/css">
</link>

<body style="">

<form id="form1" name="form1" method="post" action="login_process.php">
  
	<h1 style="color:black; text-align:center">
	
	<p><fieldset style="width:44%; height:60%; margin-left:350; border-radius:4%;background: rgb(212, 222, 223)"> 
	<p style="font-family:Elephant">Welcome to Koperasi IT Del
	<fieldset style="width:92%; height:63%;  margin-top:10px; border-radius:1%; background: rgb(243, 243, 243)">
  <label>
  <p><input class="index" type="text" name="username" placeholder="Username"  />
  </label>
  <p>
    <label>
    <input class="index" type="password" name="password" placeholder="Password" />
    </label>
  </p>
  <p>
    <label>
    <input class="button" type="submit" class="button" value="LOGIN"  style="background:rgb(96, 193, 197); margin-left:10px; width:60%">
    </label>
  </p>
	</fieldset>
	</fieldset>
</form>
</div>
</body>


    <!--
    // <label style="margin: auto;width: 35%;" >
        // <center class="container">
            // <p align="center" class="container" style="font-size: 30px;"><strong>Koperasi ITDel 2015</p>
         
                // if(isset($_SESSION['is_logged_in'])){ 
                    // echo('<a href="logout.php" style="text-decoration: none;"><input type="submit" class="button" value="Logout"  /></a>'); 
                // }else{ 
                    // echo('<a href="login.php" style="text-decoration: none;"><input type="submit" class="button" value="Login"  /></a>'); 
                // } 
                // close_page(); 
            // ?> 
        // </center>
    // </label> 
// </tabel> -->


<?php 
    close_page(); 
?> 