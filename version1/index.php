<?php
ob_start();
session_start();
include 'db.php';
include "api.php";
if (isset($_SESSION['name_admin2'])) {
    $nom = $_SESSION['name_admin2'];
    $sql1 = "SELECT * FROM user where nom_user = '$nom'";
    $res1 = mysqli_query($mysqli, $sql1);
    while ($rows1 = mysqli_fetch_array($res1)) {
        $idadm = $rows1['id_user'];

        /////////////////

        $SenderWhatsapp = new WhatsappSender();
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta http-equiv="x-ua-compatible" content="ie=edge" />
            <title>Mohamed Elbakry Project</title>
            <!--            ///////////////////-->

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />



            <!--            /////////////-->

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />



            <!-- Google Fonts Roboto -->
            <!-- MDB -->
            <link rel="stylesheet" href="css/mdb.min.css" />
            <!-- Custom styles -->
            <link rel="stylesheet" href="css/admin.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
        </head>

        <body style="background-color: #222B32!important;">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block bg-white sidebar collapse ">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a style="color: #3FA99E;font-weight:bold; " href="index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الرئيسية</span>
                        </a>

                        <a style="color: #3FA99E;font-weight:bold; " href="charts/index.php" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-user fa-fw me-3" style="color: #3FA99E;"></i><span> المنتجات</span></a>

                        <a style="color: #3FA99E;font-weight:bold; " href="users/" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-user fa-fw me-3" style="color: #3FA99E;"></i><span> العملاء</span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="formmsg/" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-euro-sign fa-fw me-3" style="color: #3FA99E;"></i><span> فورم الرسالة</span></a>

                        <a style="color: #3FA99E;font-weight:bold;" href="discount/" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-percentage fa-fw me-3" style="color: #3FA99E;"></i><span> التخفيضات</span></a>




                        <a style="color: #3FA99E;font-weight:bold;" href=" login/edit.php" class="list-group-item list-group-item-action py-2 ripple">
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
                                <li><a style="color: #3FA99E;font-weight:bold;text-align:center" class="dropdown-item" href="login/edit.php">حسابي</a></li>
                                <li><a style="color: #3FA99E;font-weight:bold;text-align:center" class="dropdown-item" href="login/logout.php">تسجيل الخروج</a></li>
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

                <?php
                if (isset($_GET['m'])) {
                    if ($_GET['m'] == 'm0') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger" role="alert" style="text-align: center;">
                                    ...حدث خطاء بالرجاء المحاولة لاحقا
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }

                    if ($_GET['m'] == 'm1') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">
                                    لقد تمت اضافة العميل بنجاح مع اضافة برنامج التذكير الخاص به
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }

                    if ($_GET['m'] == 'm2') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">
                                    هذا اول تعامل  للعميل مع الصيدليه وتم اضافته وتسجيل طلبه
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }

                    if ($_GET['m'] == 'm3') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger" role="alert" style="text-align: center;">
                                    هذا العميل مسجل من قبل ...
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }        if ($_GET['m'] == 'm4') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">
                                    .....تم تسجيل طلب العميل بنجاح
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    } if ($_GET['m'] == 'm5') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">

                                    هذا العميل مسجل من قبل وتم اضافة جدول التذكير الخاص به
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    } if ($_GET['m'] == 'm6') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert" style="text-align: center;">

                                    هذا العميل مسجل من قبل وتم تسجيل طلبه بنجاح...
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }

                    if ($_GET['m'] == 'm7') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                echo '<div class="alert alert-danger" role="alert">رقم الجوال غير صحيح. يجب أن يكون الرقم مكون من +20 ثم 10 أرقام.</div>';

                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }

                    if ($_GET['m'] == 'm8') {
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                echo '<div class="alert alert-danger" role="alert">الرجاء التاكد من رفع الصورة الخاصة بالدواء.</div>';

                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <?php
                    }
                }
                ?>
                <br>


                <div class="row">
                    <div class="col-md-2"></div>


                    <div class="col-md-4" style="margin-top:20px;">


                        <div class="card" style="border-radius: 20px 20px 20px 20px">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="text-align: center;font-weight:bold">عميل جديد <i class="fas fa-users" style="margin-left: 5px;color: #3FA99E;"></i></h5>
                                <hr> <br>
                                <p class="card-text" style="font-weight:bold">لاضافة عميل جديد و ارسال اول تذكير له اضغط هنا </p> <br>
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#exampleModal1" style="font-weight:bold;color: #3FA99E;font-size: 15px;">
                                    اضافة عميل
                                </button>

                            </div>
                        </div>



                    </div>


                    <div class="col-md-4" style="margin-top:20px;">


                        <div class="card" style="border-radius: 20px 20px 20px 20px">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="text-align: center;font-weight:bold"> تسوق <i class="fas fa-clock " style="margin-left: 5px;color: #3FA99E;"></i></h5>
                                <hr>
                                <br>
                                <p class="card-text" style="font-weight:bold"> اذا اردت تسجيل شراء عميل  مسبقا اضغط هنا </p>
                                <br>
                                <button type="button" style="font-weight:bold;color: #3FA99E;font-size: 15px;" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                                    اضافة
                                </button>

                            </div>
                        </div>



                    </div>



                </div>










                <div class="col-md-2"></div>

            </div>


            <!-- Modal tadikr -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تسوق عميل</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post">





                                <br>
                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="name" placeholder="اسم الزبون " class="form-control" required>
                                </div>


                                <br>
                                <br>
                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="phone" placeholder="رقم الزبون " class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <script>
                                        $(document).ready(function() {
                                            $('select').selectize({
                                                sortField: 'text'
                                            });
                                        });
                                    </script>
                                    <select  name="dwa2" style="text-align: center;"  id="select-state" class="form-control colorful-select dropdown-danger" required>
                                        <option selected> اختار المنتج</option>
                                        <?php
                                        $sql2 = "select * from products where `id_user` = $idadm";
                                        $res2 = mysqli_query($mysqli, $sql2);
                                        if ($res2) {
                                            while ($rows2 = mysqli_fetch_assoc($res2)) {
                                                ?>
                                                <option value="<?php echo $rows2['id_product'] ?>"><?php echo $rows2['product_name'] ?></option>
                                                <?php

                                            }
                                        }

                                        ?>

                                    </select>
                                </div>


                                <br>





                                <br>
                                <button type="submit" name="send2" class="btn" style="background-color: #3FA99E;color:white;font-weight:bold;font: size 13px;">شراء</button>

                            </form>
                            <?php
                            if (isset($_POST['send2'])) {
                                $name = $_POST['name'];
                                $phone = $_POST['phone'];
                                $iddwa2 = $_POST['dwa2'];


                                // Validate mobile number format
                                if (!preg_match('/^\+20[0-9]{9,11}$/', $phone)) {

                                    header('location:index.php?m=m7');

                                    exit; // Stop further execution if the number is not valid
                                }
                                else{
                                    $sql1 = "Select *  from  client where num_client=$phone and id_user = $idadm";
                                    $quer1 = mysqli_query($mysqli, $sql1);
                                    if (mysqli_num_rows($quer1) == 0) {
                                        $sql2 = "insert into client (`nom_client`, `num_client`,`id_user`) values ('$name',$phone, $idadm)";
                                        $query2 = mysqli_query($mysqli, $sql2);
                                        if ($query2 > 0) {
                                            $idcl = mysqli_insert_id($mysqli);
                                            $sql3 = "insert into sales (`id_product`,`id_user`,`id_client`) values ($iddwa2, $idadm, $idcl)";
                                            $query3 = mysqli_query($mysqli, $sql3);
                                            ///////////////////
                                            /// Insert Api Here //
                                            /// ///////////////////

                                            $sql6="select * from products where id_product=$iddwa2";
                                            $query6=mysqli_query($mysqli,$sql6);
                                            while ($rows6=mysqli_fetch_assoc($query6)){
                                                $product_name= $rows6['product_name'];
                                                $product_image=$rows6['product_image'];
                                                $image_url = 'https://meskwhatss.com/manager/products/uploads/'.$product_image;

                                                $ff= "شكرا للتعامل معنا, تم تاكيد شراء ".$product_name;
                                                $SenderWhatsapp ->sendWhatsappMessage($phone,$ff,$image_url);   }


                                            header('location:index.php?m=m2');

                                        }
                                        else{
                                            header('location:index.php?m=m0');

                                        }
                                    } else {
                                        // $idcl = mysqli_insert_id($mysqli);
                                        $sql5=" select * from client where num_client= $phone";
                                        $query5=mysqli_query($mysqli,$sql5);
                                        while ($rows5=mysqli_fetch_assoc($query5)){
                                            $id_client=$rows5['id_client'];
                                            $sql4 = "insert into sales  (`id_product`,`id_user`,`id_client`) values ($iddwa2, $idadm, $id_client)";
                                            $query4 = mysqli_query($mysqli, $sql4);

                                        }

                                        ///////////////////
                                        /// Insert Api Here //
                                        /// ///////////////////
                                        if ($query4) {
                                            $sql6="select * from products where id_product=$iddwa2";
                                            $query6=mysqli_query($mysqli,$sql6);
                                            while ($rows6=mysqli_fetch_assoc($query6)){
                                                $product_name= $rows6['product_name'];
                                                $product_image = $rows6['product_image'];
                                                $ff= "شكرا للتعامل معنا, تم تاكيد شراء ".$product_name;
                                                $img = 'https://meskwhatss.com/manager/products/uploads/'.$product_image;
                                                $SenderWhatsapp ->sendWhatsappMessage($phone,$ff,$img);
                                                header('location:index.php?m=m6');
//
//
//

                                            }




                                        }
                                        else{
                                            header('location:index.php?m=m0');


                                        }

                                    }
                                }

                            }
                            //                                    $sql5 = "INSERT INTO `sales`(`id_user`,`id_client`, `id_product`) VALUES ('$idadm','$iddcl2','$iddwa2')";
                            //                                    $res5 = mysqli_query($mysqli, $sql5);
                            //
                            //                                    $sqla="Select p.product_name, c.num_client, s.id_client, s.id_product from sales s
                            //                                           JOIN client c on s.id_client =c.id_client
                            //                                           JOIN products p on p.id_product=s.id_product ";
                            //
                            //                                    $querya=mysqli_query($mysqli,$sqla);
                            //                                    if ($querya){
                            //                                    while ($rowsa=mysqli_fetch_assoc($querya)){
                            //                                        $phone=$rowsa['num_client'];
                            //                                        $name=$rowsa['product_name'];
                            //                                        $msg= " تم شراء المنتج ".$name." شكرا لتعاملكم معنا ";
                            //                                        sendWhatsappMessage($phone,$msg);
                            //
                            //                                    }
                            //                                        header('location:index.php?m=m2');
                            //                                    }}




                            ?>

                        </div>

                    </div>
                </div>
            </div>


            <!-- Modal tadikr -->









            <!-- Modal add user -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: center;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">تسوق عميل جديد</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <form method="post">

                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="nom" placeholder="اسم العميل" class="form-control" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="prenom" placeholder="رقم العميل" class="form-control" required>
                                </div>
                                <br>
                                <div class="form-group" style="text-align: center;">
                                    <script>
                                        $(document).ready(function() {
                                            $('select').selectize({
                                                sortField: 'text'
                                            });
                                        });
                                    </script>
                                    <select name="dwa" style="text-align: center;" id="select-state" placeholder="اختار الدواء">
                                        <option style="text-align: center;" value="">اختار الدواء</option>
                                        <?php
                                        $sql2 = "select * from dwa";
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
                                <div class="form-group">
                                    <input type="number" style="text-align: center;" name="hours" placeholder="عدد الساعات" class="form-control" required>
                                </div>


                                <br>
                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="days" placeholder="عدد الايام" class="form-control" required>
                                </div>

                                <br>
                                <button type="submit" name="send1" class="btn" style="background-color: #3FA99E;color:white;font-weight:bold;font: size 13px;">اضافة</button>
                            </form>
                            <?php
                            if (isset($_POST['send1'])) {
                                $nomcl = $_POST['nom'];
                                $numcl = $_POST['prenom'];
                                $iddwa = $_POST['dwa'];
                                $hours = $_POST['hours'];
                                $days = $_POST['days'];
                                if (!preg_match('/^\+20[0-9]{9,13}$/', $numcl)) {

                                    header('location:index.php?m=m7');

                                    exit; // Stop further execution if the number is not valid
                                } else {

                                    $sql = "Select * from dwa where id_dwa= $iddwa";
                                    $q= mysqli_query($con,$sql);
                                    while ($row=mysqli_fetch_assoc($q)){
                                        $url= $row['photo_dwa'];
                                        $image = 'https://meskwhatss.com/manager/'. $url;

                                        $msg = "حرصا علي سلامتكم يرجي اتباع وانتظام تناول العلاج في الموعد المحدد سوف تتلقي رسايل تذكير بموعد العلاج حرصا علي سلامتكم ...";
                                        $SenderWhatsapp->sendWhatsappMessage($numcl, $msg, $image);
                                    }



                                    $sql50 = "select * from client where num_client='$numcl' and id_user='$idadm'";
                                    $res50 = mysqli_query($mysqli, $sql50);
                                    if (!$res50) {
                                        echo "ERROR  :" . mysqli_error($mysqli);

                                    }
                                    if (mysqli_num_rows($res50) > 0) {
                                        while ($row5 = mysqli_fetch_assoc($res50)) {
                                            $idc = $row5['id_client'];
                                        }
                                        $sql4 = "INSERT INTO `trt`(`id_client`, `id_dwa`, `days`, `hours`) VALUES ('$idc','$iddwa','$days','$hours')";
                                        $res4 = mysqli_query($mysqli, $sql4);
                                        $sql99 = "SELECT DATE_ADD(start_date, INTERVAL days DAY) AS end_date FROM trt where id_client='$idc' ";
                                        $res99 = mysqli_query($mysqli, $sql99);
                                        $sql100 = "UPDATE trt SET end_date = DATE_ADD(start_date, INTERVAL days DAY)  where id_client='$idc'";
                                        $res100 = mysqli_query($mysqli, $sql100);
                                        header('location:index.php?m=m6');

//                                        $sqlx = "SELECT * FROM dwa WHERE id_dwa = $iddwa";
//                                        $resx = mysqli_query($mysqli, $sqlx);


//                                        if ($resx) {
//                                            while ($rowsx = mysqli_fetch_assoc($resx)) {
//                                                $image = $rowsx['photo_dwa'];
//                                                $url = "https://meskwhatss.com/manager/" . $image;
//
//                                                $msg = "حرصا على سلامتكم يرجى اتباع وانتظام تناول العلاج في الموعد المحدد. ستتلقى رسائل تذكير بموعد العلاج حرصا على سلامتكم...";
//
//
//                                            }
//
                                    } elseif (mysqli_num_rows($res50) == 0) {
                                        $sql3 = "INSERT INTO `client`( `id_user`, `nom_client`, `num_client`) VALUES ('$idadm','$nomcl','$numcl')";
                                        $res3 = mysqli_query($mysqli, $sql3);
                                        if (!$res3) {
                                            echo "ERROR  :" . mysqli_error($mysqli);
                                        }
                                        if ($res3) {
                                            $idcl = mysqli_insert_id($mysqli);
                                            $sql4 = "INSERT INTO `trt`(`id_client`, `id_dwa`, `days`, `hours`) VALUES ('$idcl','$iddwa','$days','$hours')";
                                            $res4 = mysqli_query($mysqli, $sql4);
                                            $sql99 = "SELECT DATE_ADD(start_date, INTERVAL days DAY) AS end_date FROM trt where id_client='$idcl' ";
                                            $res99 = mysqli_query($mysqli, $sql99);
                                            $sql100 = "UPDATE trt SET end_date = DATE_ADD(start_date, INTERVAL days DAY)  where id_client='$idcl'";
                                            $res100 = mysqli_query($mysqli, $sql100);
                                            header('location:index.php?m=m2');

                                            $sqlx = "Select photo_dwa from dwa where id_dwa=$iddwa";
                                            $resx = mysqli_query($mysqli, $sqlx);
//                                                if ($resx) {
//                                                    while ($rowsx = mysqli_fetch_assoc($resx)) {
//                                                        $image = $rowsx['photo_dwa'];
//                                                        $url = "https://meskwhatss.com/manager/ . '$image'";
//
//                                                        $msg = "حرصا علي سلامتكم يرجي اتباع وانتظام تناول العلاج في الموعد المحدد سوف تتلقي رسايل تذكير بموعد العلاج حرصا علي سلامتكم ...";
//                                                        // $y = $SenderWhatsapp->sendWhatsappMessage($numcl, $msg, $url);
//
//                                                    }
//
//
//                                                }

                                        }
                                    }
                                }
                            }



                            ?>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end add user -->


            <!--Add New Client products-->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: center;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">تسوق عميل جديد</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <form method="post">

                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="nom" placeholder="اسم العميل" class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" style="text-align: center;" name="prenom" placeholder="رقم العميل" class="form-control" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <select searchable="Recherche" name="dwa" style="text-align: center;" class="form-control colorful-select dropdown-danger">
                                        <option selected> اختار المنتج</option>
                                        <?php
                                        $sql2 = "select * from products";
                                        $res2 = mysqli_query($mysqli, $sql2);
                                        if ($res2) {
                                            while ($rows2 = mysqli_fetch_assoc($res2)) {
                                                ?>
                                                <option value="<?php echo $rows2['id_product'] ?>"><?php echo $rows2['product_name'] ?></option>
                                                <?php

                                            }
                                        }

                                        ?>

                                    </select>
                                </div>



                                <br>
                                <button type="submit" name="send3" class="btn" style="background-color: #3FA99E;color:white;font-weight:bold;font: size 13px;">اضافة</button>
                            </form>
                            <?php
                            if (isset($_POST['send3'])) {
                                $nomcl = $_POST['nom'];
                                $numcl = $_POST['prenom'];
                                $iddwa = $_POST['dwa'];


                                $sql50 = "select * from client where num_client='$numcl' and id_user='$idadm'";
                                $res50 = mysqli_query($mysqli, $sql50);
                                if (!$res50) {
                                    echo "ERROR  :" . mysqli_error($mysqli);
                                }
                                if (mysqli_num_rows($res50) > 0) {
                                    while ($row3 = mysqli_fetch_assoc($res50)) {
                                        $idcl1 = $row3['id_client'];


                                        $sql101 = "INSERT INTO `sales`(`id_user`, `id_client`, `id_product`) VALUES ('$idadm','$idcl1','$iddwa')";
                                        $res101 = mysqli_query($mysqli, $sql101);
                                        header('location:index.php?m=m4');
                                    }
                                }
                                elseif (mysqli_num_rows($res50) == 0) {
                                    $sql3 = "INSERT INTO `client`( `id_user`, `nom_client`, `num_client`) VALUES ('$idadm','$nomcl','$numcl')";
                                    $res3 = mysqli_query($mysqli, $sql3);
                                    if( !$res3 ){echo"ERROR  :".mysqli_error($mysqli);}
                                    if ($res3) {
                                        $idcl = mysqli_insert_id($mysqli);
                                        $sql4 = "INSERT INTO `sales`(`id_user`, `id_client`, `id_product`) VALUES ('$idadm','$idcl','$iddwa')";
                                        $res4 = mysqli_query($mysqli, $sql4);

                                        if( !$res4 ){echo"ERROR  :".mysqli_error($mysqli);}
                                        if ($res4) {
                                            $nd = "";



                                        }

                                        header('location:index.php?m=m4');
                                    }
                                }
                            }


                            ?>
                        </div>

                    </div>
                </div>
            </div>






            </div>
        </main>
        <!--Main layout-->
        <!-- MDB -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Custom scripts -->
        <script type="text/javascript" src="js/admin.js"></script>

        </body>

        </html>



        <?php
    }
} else {
    header('location:login/index.php');
    ob_end_flush();
}


?>