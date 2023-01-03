<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");


include 'database.php'; 

if(!isset($_POST['email'])){
    echo json_encode(array("message"=>"Email is required"));
    return;
}

$email = trim($_POST['email']);

$sql = "select * from users where email = '".$email."'";
$result= mysqli_query($con,$sql);
$resultForEmail = mysqli_num_rows($result);

if($resultForEmail == 0){
    echo json_encode(array("message"=>"User not Exist"));
    return;
}

$sql = "delete from users where email ='".$email."'";
$result = mysqli_query($con,$sql);
if ($result) {
    echo json_encode(array("message"=>"Data deleted Successfully"));
    return;
  } else {
    echo json_encode(array("message:"=>mysqli_error($con)));

  }
  mysqli_close($con);

?>