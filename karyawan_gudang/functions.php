<?php 
    function get_title($_title){ 
        return('<title>' .$_title. '</title>'); 
    } 
    
    function open_page($_title){ 
        echo('<html><head>' .get_title($_title). '<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"></head><body>'); 
    } 
    
    function close_page(){ 
        echo('</body></html>'); 
    } 
    
    function redirect($_location){ 
        header('Location: ' .$_location); 
    } 
?>