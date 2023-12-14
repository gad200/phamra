<?php
include('../../connection.php');
$username = $_POST['username'];
$b=$_POST['b'];
$sql = "INSERT INTO `manager` (`name_manager`,`password_manager`) values ('$username','$b')";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{

    $data = array(
        'status'=>'true',

    );

    echo json_encode($data);
}
else
{
    $data = array(
        'status'=>'false',

    );

    echo json_encode($data);
}
