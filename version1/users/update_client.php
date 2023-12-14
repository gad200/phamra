<?php
require('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Validate and sanitize input data

    // Update the client record in the database
    $updateQuery = "UPDATE `client` SET `num_client` = '$phone',`nom_client`='$name'  WHERE `client`.`id_client` = $id";

    if (mysqli_query($con, $updateQuery)) {
        // echo 'success';
        echo json_encode(['status'=>'true']);
    } else {
        // echo 'error';
        echo json_encode(['status'=>'error']);

    }
}
