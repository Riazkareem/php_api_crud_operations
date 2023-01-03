<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");


include 'database.php'; 
$emparray = array();

if(!isset($_POST['id'])){
    echo json_encode(array("message"=>"id is required"));
    return;
}

$id = trim($_POST['id']);

$sql = "select * from users where id = '".$id."' ";
$result= mysqli_query($con,$sql);
$resultForEmail = mysqli_num_rows($result);
while($row =mysqli_fetch_assoc($result)){
    $emparray[] = $row;
}

if($resultForEmail ==0 ){
    echo json_encode(array("message"=>"Data not Exist"));
    return;
}
if($resultForEmail > 0){
    echo json_encode(array("message"=>$emparray));
    return;
}

  mysqli_close($con);

?>