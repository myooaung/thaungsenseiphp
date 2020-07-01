<?php 
$conn= mysqli_connect('localhost','myoaung','admin','testPHP');
if ($conn->connect_error){
    die("Connection failed :" . $conn->connect_error);
}

$GLOBALS['conn']=$conn;