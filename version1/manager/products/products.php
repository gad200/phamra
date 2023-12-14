<?php
include "../../connection.php";
session_start();
if (isset($_SESSION['name_admin'])){
if (isset($_GET['id'])) {
$id = $_GET['id'];


$_SESSION['id_user']=$id;
// Store the user ID in the session

$sql1 = "SELECT * FROM user WHERE id_user='$id'";
$res1 = mysqli_query($con, $sql1);

if ($res1) {
    while ($row1 = mysqli_fetch_assoc($res1)) {
        $nom_user = $row1['nom_user'];
        $id_user = $row1['id_user'];
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>منتجات</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #4dd0e1;">
    <?php echo $nom_user ?> قائمة المنتجات الخاصة بالعميل

</nav>

<div class="container">
    <?php
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add_product.php" class="btn btn-light mb-3">اضافة منتج</a>
    <a href="index.php" class="btn btn-light mb-3">رجوع لصفحة العملاء </a>

    <table class="table table-hover text-center">
        <thead class="table-active">
        <tr>
            <th scope="col">الاسم</th>
            <!-- Add a new column for the image -->
            <th scope="col">الصورة</th>
            <!-- <th scope="col">الجنيه/السعر</th> -->
            <th scope="col">خيارات</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `products` WHERE id_user='$id_user'";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["product_name"] ?></td>
                <!-- Display the image using an <img> tag -->
                <td>
                    <img src="uploads/<?php echo $row["product_image"] ?>" alt="Product Image" style="max-width: 100px;">
                </td>

                <td>
                    <a href="edit_product.php?id=<?php echo $row["id_product"] ?>" class="link-edit"><i class="fa-solid fa-pen-to-square fs-5 me-1 "></i></a>
                    <a href="delete_product.php?id=<?php echo $row["id_product"] ?>" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
            <?php
        }}}
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>

