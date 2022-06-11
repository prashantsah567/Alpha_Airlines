<?php
$host="localhost:8889";
$user="root";
$password="root";
$database="sys";

$connect = mysqli_connect($host, $user, $password, $database);
if(!$connect){
    die("Connection failed: ". mysqli_connect_error());
}
?>