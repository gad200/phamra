<?php
include "../../connection.php";
session_start();
if (isset($_SESSION['name_admin'])){




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
        <link rel="stylesheet" href="table.css"  />

        <title>منتجات</title>
    </head>

    <body>

    <form action="#" autocomplete="off" method="GET">
        <fieldset class="url">
            <input type="text" class="form-control custom-input" id="url" name="productName" placeholder="اسم المنتج" value="<?php echo isset($_GET['productName']) ? $_GET['productName'] : ''; ?>">

            <label for="url"><i class="fa fa-search" aria-hidden="true"></i> Search</label>
            <div class="after"></div>
        </fieldset>
        <fieldset class="enter">
            <button></button>
        </fieldset>
    </form>
    <section class="intro">

        <div class="bg-image h-100" style="background-image: url(https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img7.jpg);">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card mask-custom">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <!-- Add a class to the input field -->


                                        <a href="add_product.php" class="btn btn-light mb-3 custom-btn">اضافة منتج</a>
                                        <a href="index.php" class="btn btn-light mb-3 custom-btn">رجوع لصفحة العملاء</a>


                                        <table class="table table-borderless text-white mb-0">
                                            <caption style="caption-side: top; text-align: center; color: white; font-weight: bold; font-size: 18px;">المنتجات </caption>
                                            <thead>
                                            <tr>
                                                <th scope="col">خيارات</th>
                                                <th scope="col">الصوة</th>
                                                <th scope="col">الاسم</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (isset($_GET['productName'])) {
                                                $productName = $_GET['productName'];
                                                $sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%$productName%'";
                                            } else
                                                $sql = "SELECT * FROM `products`";
                                            $result = mysqli_query($con, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <a href="edit_product.php?id=<?php echo $row["id_product"] ?>" class="link-edit"><i class="fa-solid fa-pen-to-square fs-5 me-1 "></i></a>
                                                    <a href="delete_product.php?id=<?php echo $row["id_product"] ?>" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
                                                </td>
                                                <td>
                                                    <img src="uploads/<?php echo $row["product_image"] ?>" alt="Product Image" style="max-width: 100px; border-radius: 50%;">

                                                </td>
                                                <td><?php echo $row["product_name"] ?></td>
                                                <!-- Display the image using an <img> tag -->


                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>


    </body>

    </html>
    <?php
}?>