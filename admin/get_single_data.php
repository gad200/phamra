<?php
include '../connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM user WHERE id_user='$id'";
    $res = mysqli_query($con, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $response = [
            'nom_user' => $row['nom_user'],
            'phone' => $row['phone'],
            'password_user' => $row['password_user']
        ];

        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
