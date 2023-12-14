<?php
include "../../connection.php";
session_start(); // Assuming you are using sessions for user authentication
if (isset($_SESSION['name_admin'])){
    $_SESSION['id_user'];
// Get the user ID from the session
    if (isset($_SESSION['id_user'])){

    $user_id = $_SESSION['id_user'];

        if (isset($_POST["submit"])) {
            $product_name = $_POST['product_name'];


            // Handle image upload
            $upload_dir = "uploads/";  // specify the directory where you want to store uploaded images
            $image_name = basename($_FILES["product_image"]["name"]);
            $target_path = $upload_dir . $image_name;

            // Check if the image file is a valid image
            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_path)) {
                    // Insert product data into the database
                   $sql1="select * from products where product_name='$product_name'";
                    $result1 = mysqli_query($con, $sql1);

                    if ( mysqli_num_rows($result1) ==0) {
                        $sql2 = "INSERT INTO `products` (`id_user`, `product_name`, `product_image`) VALUES ('$user_id', '$product_name', '$image_name')";
                        $result2 = mysqli_query($con, $sql2);
                        header("Location: add_product.php?m=m1");
                        exit();
                    }
                    if (mysqli_num_rows($result1)>0){
                        header("Location:add_product.php?m=m2");
                    }
                    else {
                        echo "Failed: " . mysqli_error($con);
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File is not a valid image.";
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

    <title>Data Entry</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    منتجات
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>اضافة منتج</h3>
        <p class="text-muted">منتح جديد</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">اسم المنتج:</label>
                    <input type="text" class="form-control" name="product_name" placeholder="اسم المنتج" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">صورة المنتج:</label>
                    <input type="file" class="form-control" name="product_image" accept="image/*" required>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">حفظ</button>
                <a href="products.php?id=<?php echo $user_id; ?>" class="btn btn-danger">الغاء</a>
            </div>
        </form>

    </div>
</div>

<?php
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'm1') {
        ?>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-success" role="alert"  style="text-align: center;">
                    لقد تمت اضافة المنتج بنجاح ....
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
        <?php
    }
    if ($_GET['m']=='m2'){
        ?>
    <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-warning" role="alert"  style="text-align: center;">
                    هذا المنتج موجود بالفعل ....
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
        <?php
    }


}
?>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
    <?php

    }}else{
    header("Location:../login/");
}
?>