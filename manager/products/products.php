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

        <link rel="stylesheet" type="text/css" href="table.css">
        <style>
            .custom-btn:hover {
                background-color: #25cff2; /* Change this to your desired hover color */
                /*color: #4a148c; !* Change this to your desired hover text color *!*/
                /*border-color: #e5c1c7;*/
            }
        </style>

        <title>منتجات</title>
    </head>

    <body>

    <main class="table" id="customers_table">
        <section class="table__header">
            <a href="add_product.php" class="btn btn-light mb-3 custom-btn">اضافة منتج</a>
            <a href="../index.php" class="btn btn-light mb-3 custom-btn">رجوع  </a>
            <div class="input-group">
                <input type="search" placeholder="...بحث ">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                <th> خيارات <span class="icon-arrow">&UpArrow;</span></th>
                <th> الصورة <span class="icon-arrow">&UpArrow;</span></th>


                <th> الاسم <span class="icon-arrow">&UpArrow;</span></th>
                <th>  <span class="icon-arrow">&UpArrow;</span></th>
<!--                <th>  <span class="icon-arrow"></span></th>-->


                </tr>
                </thead>
                <tbody>
                <?php
                $count=1;

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
                        <img src="uploads/<?php echo $row["product_image"] ?>" alt="Product Image" style="max-width: 200px; border-radius: 50%;">

                    </td>
                    <td><?php echo $row["product_name"] ?>
                    </td>

                    <td><?php echo $count ?></td>
                    <!-- Display the image using an <img> tag -->

                    <?php
                    $count++;
                    }
                    ?>
                </tr>

                </tbody>
            </table>
        </section>
    </main>
    <script src="main.js"></script>


    </body>

    </html>
    <?php
}?>