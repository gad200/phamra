<?php
ob_start();
session_start();
include '../db.php';
include '../api.php';
if (isset($_SESSION['name_admin2'])) {
    $nom = $_SESSION['name_admin2'];
    $sql1 = "SELECT * FROM user where nom_user = '$nom'";
    $res1 = mysqli_query($mysqli, $sql1);
    while ($rows1 = mysqli_fetch_array($res1)) {
        $idadm = $rows1['id_user'];

        /////////////////

        $WhatsappSender = new WhatsappSender();
        ?>


        <?php
        if (isset($_GET['m']) && $_GET['m'] == 'm4') {
            ?>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        لقد تمت لقد تمت عملية التخفيض  للعميل بنجاح
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <?php
        }   if (isset($_GET['m']) && $_GET['m'] == 'm0') {
            ?>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        ...حدث خطا حاول مرة اخري
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <?php
        }
        ?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta http-equiv="x-ua-compatible" content="ie=edge" />
            <title>Mohamed Elbakry Project</title>


            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


            <!-- Google Fonts Roboto -->
            <!-- MDB -->
            <link rel="stylesheet" href="../css/mdb.min.css" />
            <!-- Custom styles -->
            <link rel="stylesheet" href="../css/admin.css" />
        </head>

        <body style="background-color: #222B32!important;">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block bg-white sidebar collapse ">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a style="color: #3FA99E;font-weight:bold; " href="../index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الرئيسية</span>
                        </a>

                        <a style="color: #3FA99E;font-weight:bold; " href="../charts/index.php" class="list-group-item list-group-item-action py-2 ripple ">
                            <i class="fas fa-shopping-bag fa-fw me-3" style="color: #3FA99E;"></i><span> المنتجات</span></a>
                        <a style="color: #3FA99E;font-weight:bold; " href="../dwa/index.php" class="list-group-item list-group-item-action py-2 ripple ">
                            <i class="fas fa-heartbeat  fa-fw me-3" style="color: #3FA99E;"></i><span> الادوية</span></a>
                        <a style="color: #3FA99E;font-weight:bold; " href="../users/" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-user fa-fw me-3" style="color: #3FA99E;"></i><span> العملاء</span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="../formmsg/" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-euro-sign fa-fw me-3" style="color: #3FA99E;"></i><span> فورم الرسالة</span></a>
                        <a style="color: #3FA99E;font-weight:bold;" href="../formmsg/finally.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-euro-sign fa-fw me-3" style="color: #3FA99E;"></i><span> رسالة الشكر </span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="index.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-percentage " style="color: #3FA99E;"></i><span> التخفيضات</span></a>




                        <a style="color: #3FA99E;font-weight:bold;" href="../login/edit.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-edit fa-fw me-3" style="color: #3FA99E;"></i><span> حسابي</span></a>





                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light  fixed-top" style="background-color: #3FA99E;color:white;">
                <!-- Container wrapper -->
                <div class="container-fluid" style="background-color: #3FA99E;">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Brand -->

                    <h5 style="margin-right:15px; margin-left: 10px;font-weight:bold;"> <?php echo $rows1['nom_user']; ?> مرحبا</h5>

                    <i class="fa-solid fa-hand"></i>

                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row">
                        <!-- Notification dropdown -->




                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user text-white "></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a style="color: #3FA99E;font-weight:bold;text-align:center" class="dropdown-item" href="../login/edit.php">حسابي</a></li>
                                <li><a style="color: #3FA99E;font-weight:bold;text-align:center" class="dropdown-item" href="../login/logout.php">تسجيل الخروج</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main style="margin-top: 58px">
            <div class="container pt-4">



                <h2 style="text-align: center;font-weight:bold;color: white;"> التخفيضات</h2>
                <br>



                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="background-color: white;border-radius: 20px 20px 20px 20px ; padding: 20px 20px  20px 20px;">
                        <form method="post">



                            <br>
                            <div class="form-group" style="text-align: center;">
                                <script>
                                    $(document).ready(function() {
                                        $('select').selectize({
                                            sortField: 'text'
                                        });
                                    });
                                </script>
                                <select name="product_name" style="text-align: center;" id="select-state" placeholder="اختار الدواء">
                                    <option style="text-align: center;" value="">اختار الدواء</option>
                                    <?php
                                    $sql2 = "select * from dwa ";
                                    $res2 = mysqli_query($mysqli, $sql2);
                                    if ($res2) {
                                        while ($rows2 = mysqli_fetch_assoc($res2)) {
                                            ?>
                                            <option style="text-align: center;" value="<?php echo $rows2['id_dwa'] ?>"><?php echo $rows2['nom_dwa'] ?></option>
                                            <?php

                                        }
                                    }

                                    ?>

                                </select>
                            </div>

                            <br>
                            <div class="form-outline mb-4">
                                <input type="number" style="text-align: center;" name="dis" id="form1Example1" placeholder=" % قيمة التخفيض" class="form-control" />
                            </div>

                            <br>

                            <div class="form-outline mb-4">
                                <button style="text-align: center;color: #3FA99E;font-weight:bold;font-size:15px;" type="submit" name="send2" class="btn  text-center">تخفيض</button>


                                <button  style="text-align: center;color: #3FA99E;font-weight:bold;font-size:15px;"> <a href="index.php" class="button" >الادوية</a></button>

                            </div>



                        </form>
                        <?php
                        if (isset($_POST['send2'])) {
                            $id_product = $_POST['product_name'];
                            $dis = $_POST['dis'];

                            //


                            // Additional logic here if needed
                            $sql4 = "SELECT DISTINCT  t.id_dwa, t.id_client, d.id_dwa, d.nom_dwa, d.photo_dwa, c.num_client FROM client c
    JOIN dwa d ON d.id_dwa= $id_product
    JOIN trt t ON t.id_client = c.id_client AND t.id_dwa = d.id_dwa";

                            $res4 = mysqli_query($mysqli, $sql4);

                            if ($res4 ) {
                                while ($rows4 = mysqli_fetch_assoc($res4)) {
                                    $client_phone = $rows4['num_client'];
                                    $product_name = $rows4['nom_dwa'];
                                    $product_image = $rows4['photo_dwa'];

                                    // Assuming images are stored in the 'uploads' directory
                                    $image_url = 'https://meskwhatss.com/manager/products/'.$product_image;

                                    $ff = "عميلنا العزيز تم التخفيض في سعر " . $product_name . " واهتمامنا با احتياجاتك والظروف التي يمر بها السوق من ارتفاع الاسعار الجنوني تم التخفيض في سعر هذا المنتج بنسبة " . $dis . "% ونتمي زيارتك لنا في أقرب وقت للاستفادة من العرض. الصورة: " ;

                                }
                                $WhatsappSender->sendWhatsappMessage($client_phone, $ff, $image_url);
                                header('Location: index.php?m=m4');

                                // Close the result set
                                //     mysqli_free_result($res4);
//sendWhatsappMessage("+201024214263",);
                                //    header('Location: index.php?m=m4');
                                exit(); // Ensure script execution stops after redirect
                            } else {
                                // Handle the case where the query execution fails
                                echo 'Error executing SQL query: ' . mysqli_error($mysqli);
                                // You may want to log the error or take appropriate action
                            }
                        }

                        ?>





                    </div>
        </main>
        <!--Main layout-->
        <!-- MDB -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
        <!-- Custom scripts -->
        <script type="text/javascript" src="../js/admin.js"></script>

        </body>

        </html>



        <?php
    }
} else {
    header('location:login/');
    ob_end_flush();
}


?>