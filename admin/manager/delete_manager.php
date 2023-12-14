<?php
include('../../connection.php');

$manager_id = $_POST['id'];
$sql = "DELETE FROM manager WHERE id_manager='$manager_id'";
$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
{
    $data = array(
        'status'=>'success',

    );

    echo json_encode($data);
}
else
{
    $data = array(
        'status'=>'failed',

    );

    echo json_encode($data);
}
