<?php
include('../connection.php');
$username = $_POST['username'];

$sql = "INSERT INTO `dwa` (`nom_dwa`) values ('$username')";
$query = mysqli_query($con, $sql);
$lastId = mysqli_insert_id($con);
if ($query == true) {

    $data = array(
        'status' => 'true',

    );

    echo json_encode($data);
} else {
    $data = array(
        'status' => 'false',

    );

    echo json_encode($data);
}
