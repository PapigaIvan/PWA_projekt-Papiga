<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $basename = "kula_knjiga"; 
    
    //Spajanje na bazu
    $dbc = mysqli_connect($servername, $username, $password, $basename) or die('Nije moguće spajanje na bazu.' .mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8"); 

?>