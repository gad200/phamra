<?php
ob_start();




session_start();
include '../connection.php';
if (isset($_SESSION['name_admin'])) {
    $nom = $_SESSION['name_admin'];
    $sql1 = "SELECT * FROM manager where name_manager = '$nom'";
    $res1 = mysqli_query($con, $sql1);
    while ($rows1 = mysqli_fetch_array($res1)) {
        $idadm = $rows1['id_manager'];

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta http-equiv="x-ua-compatible" content="ie=edge" />
            <title>Grossiste de chaussures</title>

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />



            <!-- Google Fonts Roboto -->
            <!-- MDB -->
            <link rel="stylesheet" href="../css/mdb.min.css" />
            <!-- Custom styles -->
            <link rel="stylesheet" href="../css/admin.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
        </head>

        <body style="background-color: #222B32!important;">
            <!--Main Navigation-->
            <header>
                <!-- Sidebar -->
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a href="index.php" style="color: #3FA99E;font-weight:bold;" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الرئيسية</span>
                            </a>





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

                        <h5 style="margin-right:15px; margin-left: 10px;"> <?php echo $rows1['name_manager']; ?> مرحبا</h5>

                        <i class="fa-solid fa-hand"></i>

                        <!-- Right links -->
                        <ul class="navbar-nav ms-auto d-flex flex-row">
                            <!-- Notification dropdown -->




                            <!-- Avatar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user text-white"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a  style="color: #3FA99E;font-weight:bold;text-align:center"class="dropdown-item" href="login/edit.php">حسابي</a></li>
                                    <li><a style="color: #3FA99E;font-weight:bold;text-align:center"class="dropdown-item" href="login/logout.php">تسجيل الخروج</a></li>
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

                    <br>



                    <?php
                    if (isset($_GET['i'])) {
                        $i = $_GET['i'];
                        $sql2 = "select * from dwa where id_dwa='$i'";
                        $res2 = mysqli_query($con, $sql2);
                        if ($res2) {
                            while ($rows2 = mysqli_fetch_assoc($res2)) {



                    ?>

                                <div class="container" >

                                    <h2 style="text-align: center;font-weight:bold;color: white;"><?php echo $rows2['nom_dwa'] ?></h2>
                                    <br>


                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6" style="background-color: white;border-radius: 20px 20px 20px 20px ; padding:20px 20px 20px 20px">
                                            <?php
                                            if ($rows2['photo_dwa'] == "") {
                                            ?>
                                                <div class="alert alert-danger" role="alert" style="text-align: center;">
                                                    لا توجد صورة لهذا الدواء ... يمكنك رفع صورة من هنا
                                                </div>

                                                <form method="post" enctype="multipart/form-data">





                                                    <div class="mb-3 row">
                                                        <div class="col-md-12">
                                                            <p style="text-align: center;font-weight:bold">اختر صورة</p>
                                                            <input type="file" name="file1" id="customFile1" class="form-control" style="text-align:center;">
                                                        </div>
                                                    </div>




                                                    <div class="text-center">
                                                        <button type="submit" name="send" class="btn" style="background-color: #3FA99E;color:white">اضافة</button>
                                                    </div>
                                                </form>
                                                <?php
                                                if (isset($_POST['send'])) {



                                                    $maxsize = 524288000000;
                                                    if (isset($_FILES['file1']['name']) && $_FILES['file1']['name'] != '') {
                                                        $name = $_FILES['file1']['name'];
                                                        $target_dir = "uploads/";
                                                        $target_file = $target_dir . $name;
                                                        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                                        $extension_arr = array("jpg", "png", "jpeg");

                                                        if ($_FILES['file1']['size'] >= $maxsize) {
                                                            echo "file too large  file must be less than 50MB";
                                                        } else {
                                                            if (move_uploaded_file($_FILES['file1']['tmp_name'], $target_file)) {

                                                                $sql = "UPDATE `dwa` SET `photo_dwa`='$target_file' WHERE id_dwa='$i'";
                                                                $res = mysqli_query($con, $sql);
                                                                if (!$res) {
                                                                    echo "ERROR  :" . mysqli_error($con);
                                                                }
                                                                if ($res) {
                                                                    $url = 'details.php?i=' . $i;
                                                                    header('location:' . $url);
                                                                    ob_end_flush();
                                                                }
                                                            }
                                                        }
                                                    } else echo "please select a file";
                                                }
                                                ?>

                                            <?php
                                            }
                                            if ($rows2['photo_dwa'] != "") {
                                            ?>

                                                <img src="<?php echo $rows2['photo_dwa']; ?>" style="text-align: center;" class="rounded-circle shadow-1-strong text-center" width="150" height="150" />
                                                <br>
                                                <br>
                                                <br>

                                                <form method="post" enctype="multipart/form-data">





                                                    <div class="mb-3 row">
                                                        <div class="col-md-12">
                                                            <p style="text-align: center;font-weight:bold">تعديل صورة</p>
                                                            <input type="file" name="file1" id="customFile1" class="form-control" style="text-align:center;">
                                                        </div>
                                                    </div>




                                                    <div class="text-center">
                                                        <button type="submit" name="send2" class="btn btn-success">تعديل</button>
                                                    </div>
                                                </form>
                                                <?php
                                                if (isset($_POST['send2'])) {



                                                    $maxsize = 524288000000;
                                                    if (isset($_FILES['file1']['name']) && $_FILES['file1']['name'] != '') {
                                                        $name = $_FILES['file1']['name'];
                                                        $target_dir = "uploads/";
                                                        $target_file = $target_dir . $name;
                                                        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                                        $extension_arr = array("jpg", "png", "jpeg");

                                                        if ($_FILES['file1']['size'] >= $maxsize) {
                                                            echo "file too large  file must be less than 50MB";
                                                        } else {
                                                            if (move_uploaded_file($_FILES['file1']['tmp_name'], $target_file)) {

                                                                $sql = "UPDATE `dwa` SET `photo_dwa`='$target_file' WHERE id_dwa='$i'";
                                                                $res = mysqli_query($con, $sql);
                                                                if (!$res) {
                                                                    echo "ERROR  :" . mysqli_error($con);
                                                                }
                                                                if ($res) {
                                                                    $url = 'details.php?i=' . $i;
                                                                    header('location:' . $url);
                                                                    ob_end_flush();
                                                                }
                                                            }
                                                        }
                                                    } else echo "please select a file";
                                                }
                                                ?>


                                            <?
                                            } ?>
                                        </div>



                                        <div class="col-md-3"></div>


                                    </div>









                                </div>

                                <br>
                                <br>
                                <!-- Button trigger modal -->


                    <?php

                            }}
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