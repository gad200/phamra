<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query the database to get the client's data
    $query = "SELECT nom_client, num_client FROM client WHERE id_client = $id";

    $result = mysqli_query($con, $query);

    if ($result) {
        $clientData = mysqli_fetch_assoc($result);
        echo json_encode($clientData);
    } else {
        echo json_encode(['error' => 'Failed to retrieve client data']);
    }
}
