<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['name_admin'])) {
    $nom = $_SESSION['name_admin'];

$id = $_GET["id"];
$sql = "DELETE FROM `products` WHERE id_product = $id";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: products.php");
} else {
    echo "Failed: " . mysqli_error($con);
}}