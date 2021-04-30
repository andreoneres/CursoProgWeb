<?php 

$dbserver = "localhost";
$username = "root";
$password = "";
$dbname = "banco";

$connect = mysqli_connect($dbserver, $username, $password, $dbname);

if (mysqli_connect_error()) {
    echo "Erro na conexão: ".mysqli_connect_error();
}

?>