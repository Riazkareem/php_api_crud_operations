<?php
include 'database.php'; 

if(!isset($_POST['name'])){
    echo json_encode(array("message"=>"Name  required"));
    return;
}

if(!isset($_POST['email'])){
    echo json_encode(array("message"=>"email is required"));
    return;
}
if(!isset($_POST['password'])){
    echo json_encode(array("message"=>"Password is required"));
    return;
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$password = md5($password);

$sql = "select * from users where email = '".$email."'";
$result= mysqli_query($con,$sql);
$resultForEmail = mysqli_num_rows($result);

if($resultForEmail > 0){
    echo json_encode(array("message"=>"Email already taken"));
    return;
}

$sql = "insert into users(name,email,password) values('".$name."','".$email."','".$password."')";
$result = mysqli_query($con,$sql);
if ($result) {
    $last_id = mysqli_insert_id($con);   
    echo json_encode(array("success"=>"New Record with ID $last_id inserted Successfully"));
    return;
  } else {
    echo json_encode(array("Error:"=>mysqli_error($con)));

  }
  mysqli_close($con);

?>