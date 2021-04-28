<?php

$host = "127.0.0.1";
$db_name = "csr";
$username = "root";
$password = "";

try {
    //database connection
    $con = new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
    //initialize and error exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOEXCEPTION $error) {

    echo "Connection Error: " . $error->getMessage();

}

$conn = new mysqli("localhost","root","","csr");	



?>