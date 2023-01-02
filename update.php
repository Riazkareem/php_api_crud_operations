<?php
include 'database.php'; 

if(!isset($_POST['id'])){
    echo json_encode(array("message"=>"id is missing"));
    return;
}
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

$id = trim($_POST['id']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$password = md5($password);

$sql = "select * from users where id = '".$id."'";
$result= mysqli_query($con,$sql);
$resultForEmail = mysqli_num_rows($result);

if($resultForEmail == 0 ){
    echo json_encode(array("message"=>"User Does not Exist"));
    return;
}

$sql = "update users set name = '".$name."', email ='".$email."', password = '".$password."' where id = '".$id."' ";
$result = mysqli_query($con,$sql);
if ($result) {
    echo json_encode(array("success"=>"Data updated Successfully"));
    return;
  } else {
    echo json_encode(array("".$sql=>mysqli_error($con)));

  }
  mysqli_close($con);

?>