<?php 
if (!function_exists('curl_init')) {
    throw new Exception('PHP cURL extension is not present.');
    }

require_once 'config.php';
$conn = $GLOBALS['conn'];
$id = htmlspecialchars($_GET['id']);
$sql= "delete  from student where id = '$id'";
if (mysqli_query($conn,$sql)){
    echo 'Record deleted successfully';
    header("location: example_datatable.php");
    
}else{
    echo 'Couldn\'t delete record'. mysqli_error($conn);
    
}   
mysqli_close($conn);