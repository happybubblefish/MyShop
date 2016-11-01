<?php
    $servername = "zlwltechcom.ipagemysql.com";
    $username = "linshop";
    $password = "linshop";
    $db = "linshop";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

?>