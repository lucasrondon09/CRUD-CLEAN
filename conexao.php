<?php

$host = "Localhost";
$user   = "root";
$pass   = "";
$db     = "base_crud";

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_error){
    die("Houve um problema na conexão com o banco de dados".$mysqli->connect_error);
}