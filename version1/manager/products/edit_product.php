
<?php
include '../../connection.php';
session_start();





    if (isset($_SESSION['name_admin'])) {
        $id = $_GET["id"];
        $nom = $_SESSION['name_admin'];
        $id_user = $_SESSION['id_user'];

        if (isset($_POST["submit"])) {
            $product_name = $_POST['product_name'];

            // Handle image upload
            $image_path = 'uploads/'; // Set the path where you want to store the images
            $product_image = $_FILES['product_image']['name'];

            // Check if the file was uploaded successfully
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $image_path . $product_image)) {
                // Update the database only if the file was uploaded successfully
                $sql = "UPDATE `products` SET `product_name`='$product_name',`product_image`='$product_image' WHERE id_product = $id";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    header("Location: edit_product.php?id=$id&m=m1");
                } else {
                    echo "Failed to update the database: " . mysqli_error($con);
                }
            } else {
                echo "Failed to upload the file.";
            }
        }

        $sql = "SELECT * FROM `products` WHERE id_product = $id LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);


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

    <title>تعديل</title>
</head>

<body>
<?php
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'm1') {
        ?>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-success" role="alert"  style="text-align: center;">
                    لقد تمت تعديل المنتج بنجاح ....
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

<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
تعديل معلومات الخاص </nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>ادخل معلومات المنتج</h3>
        <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `products` WHERE id_product = $id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
        <form  action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label"> Name:</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'] ?>">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">صورة المنتج:</label>
                        <input type="file" class="form-control" name="product_image" accept="image/*">
                    </div>
                </div>

                <div>
                    <img src="<?php echo 'uploads/' . $row['product_image']; ?>" alt="Current Image" style="max-width: 100%;">
                </div>


            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="products.php?id=<?php echo $id_user;?>" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
<?php
}


?>