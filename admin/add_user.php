<?php 
include('../connection.php');
$username = $_POST['username'];
$b=$_POST['b'];
$num_user=$_POST['phone'];
$sql = "INSERT INTO `user` (`nom_user`, `phone`,`password_user`) values ('$username','$num_user','$b')";
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
