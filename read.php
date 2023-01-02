<?php
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
    echo json_encode(array("message"=>"success","data"=>$emparray));
    return;
}

  mysqli_close($con);

?>