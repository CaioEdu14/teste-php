<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Conexão falha" . mysqli_connect_error());
}
// echo "Conectado com sucesso";