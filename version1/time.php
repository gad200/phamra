<?php
include 'connection.php';
$sql="INSERT INTO `products` (`id_product`, `id_user`, `product_name`, `product_price`) VALUES (NULL, '27', 'Adel', NULL);"

 mysqli_query($con, $sql);
?>



