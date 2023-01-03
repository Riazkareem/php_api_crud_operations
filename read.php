<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Reuested-Width');



include 'database.php'; 
$emparray = array();


$sql = "select * from users";
$result= mysqli_query($con,$sql);
$resultForEmail = mysqli_num_rows($result);
while($row =mysqli_fetch_assoc($result)){
    $emparray[] = $row;
}

if($resultForEmail ==0 ){
    echo json_encode(array("message"=>"Table is Empty"));
    return;
}
if($resultForEmail > 0){
    echo json_encode(array("phpdata"=>$emparray));
    return;
}

  mysqli_close($con);

?>