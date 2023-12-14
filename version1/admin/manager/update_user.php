<?php
require ('../../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validate and sanitize input data

    // Update the client record in the database
    $updateQuery = "UPDATE `manager` SET `name_manager` = '$name',`password_manager`='$password'  WHERE `manager`.`id_manager` = $id";

    if (mysqli_query($con, $updateQuery)) {
        // echo 'success';
        echo json_encode(['status'=>'true']);
    } else {
        // echo 'error';
        echo json_encode(['status'=>'error']);

    }
}
