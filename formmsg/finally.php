<?php
ob_start();




session_start();
include '../db.php';
if (isset($_SESSION['name_admin2'])) {
    $nom = $_SESSION['name_admin2'];
    $sql1 = "SELECT * FROM user where nom_user = '$nom'";
    $res1 = mysqli_query($mysqli, $sql1);
    while ($rows1 = mysqli_fetch_array($res1)) {
        $idadm = $rows1['id_user'];

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
            <nav id="sidebarMenu" class="collapse d-lg-block bg-white sidebar collapse ">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a style="color: #3FA99E;font-weight:bold; " href="../index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الرئيسية</span>
                        </a>

                        <a style="color: #3FA99E;font-weight:bold; " href="../charts/index.php" class="list-group-item list-group-item-action py-2 ripple ">
                            <i class="fas fa-shopping-bag fa-fw me-3" style="color: #3FA99E;"></i><span> المنتجات</span></a>
                        <a style="color: #3FA99E;font-weight:bold; " href="../dwa/index.php" class="list-group-item list-group-item-action py-2 ripple ">
                            <i class="fas fa-heartbeat fa-fw me-3" style="color: #3FA99E;"></i><span> الادوية</span></a>
                        <a style="color: #3FA99E;font-weight:bold; " href="../users/" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-user fa-fw me-3" style="color: #3FA99E;"></i><span> العملاء</span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="index.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-euro-sign fa-fw me-3" style="color: #3FA99E;"></i><span> فورم الرسالة</span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="finally.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-euro-sign " style="color: #3FA99E;"></i><span> رسالة الشكر</span></a>


                        <a style="color: #3FA99E;font-weight:bold;" href="../discount/" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-percentage fa-fw me-3" style="color: #3FA99E;"></i><span> التخفيضات</span></a>




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



                <h2 style="text-align: center;font-weight:bold;color: white;"> فورم الرسالة</h2>


                <?php
                if (isset($_GET['m'])) {
                    if ($_GET['m'] == 't') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">
                                    لقد تمت اضافة الفورم بنجاح
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }
                }

                if (isset($_GET['d']) and  isset($_GET['id'])) {
                    $didf = $_GET['id'];
                    $sql7 = "DELETE FROM `fin_form` WHERE `id_fin_form`='$didf'";
                    $res7 = mysqli_query($mysqli, $sql7);
                    if ($res7) {
                        header('location:finally.php');
                    }
                }



                ?>
                <br> <br>
                <?php
                $sql3 = "select * from fin_form where id_user='$idadm' limit 1";
                $res3 = mysqli_query($mysqli, $sql3);
                if ($res3) {
                    if (mysqli_num_rows($res3) == 0) {
                        ?>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6" style="text-align: center;background-color: white;border-radius: 20px 20px 20px 20px ;padding: 20px 20px 20px 20px;">
                                <div class="alert alert-danger" role="alert" style="text-align: center;">
                                    لم تقم باضافة اي فورم خاصة بالصيدلية ....
                                    <br>


                                </div>

                                <button type="button" class="btn btn-light" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #3FA99E;font-weight:bold;font-size:15px;">
                                    اضافة فورم
                                </button>
                            </div>
                            <div class="col-md-3"></div>

                        </div>

                        <?php
                    } elseif (mysqli_num_rows($res3) == 1) {
                        while ($rows3 = mysqli_fetch_assoc($res3)) {
                            $idf = $rows3['id_fin_form'];


                            ?>


                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" style="text-align: center;">

                                    <table class="table" style="background-color: white;border-radius: 20px 20px 20px 20px ;">
                                        <thead>
                                        <tr>
                                            <th scope="col"><i class="fas fa-cogs" style="color: #3FA99E;"></i></th>
                                            <th scope="col">الرسالة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> <a href="finally.php?d=t&id=<?php echo $idf; ?>" class="btn btn-link btn-sm deleteBtn"><i style="color: #3FA99E;" class="fas fa-trash"></i></a></td>
                                            <td><?php echo $rows3['fin_txt'] ?></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-md-3"></div>

                            </div>


                            <?php
                        }
                    }
                }
                ?>



                <!-- add form modal -->
                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: #3FA99E;font-weight:bold">اضافة فورم</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: center;">
                                <br>


                                <span style="text-align: center;">
                                        السلام عليكم هذا شكر خاص بالعميل  لاكمال الجرعة الطبية

                                        ... نتمني لكم الشفاء الصحيح ... شكرا لكم

                                    </span>


                                <br>

                                <hr>
                                <br>



                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <h6 style="font-weight: bold;color:#3FA99E">كتابة فورم</h6><br>

                                        <form method="post">
                                            <div class="form-outline">
                                                <textarea class="form-control" name="msg" id="textAreaExample" placeholder="فورم الرسالة" rows="4"></textarea>
                                            </div>
                                            <br>
                                            <button type="submit" name="send5" class="btn btn btn-block" style="color:#3FA99E;font-weight:bold;font-size:15px">اضافة </button>
                                        </form>

                                        <?php
                                        if (isset($_POST['send5'])) {
                                            $msg = $_POST['msg'];

                                            $sql4 = "INSERT INTO `fin_form`( `id_user`, `fin_txt`) VALUES ('$idadm','$msg')";
                                            $res4 = mysqli_query($mysqli, $sql4);
                                            if ($res4) {
                                                header('location:finally.php?m=t');
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div class="col-md-3"></div>



                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end form modal -->





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