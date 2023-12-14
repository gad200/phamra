<?php
ob_start();




session_start();
include '../connection.php';
if (isset($_SESSION['name_admin2'])) {
    $nom = $_SESSION['name_admin2'];
    $sql1 = "SELECT * FROM user where nom_user = '$nom'";
    $res1 = mysqli_query($con, $sql1);
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

                            <a style="color: #3FA99E;font-weight:bold; " href="index.php" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-user fa-fw me-3" style="color: #3FA99E;"></i><span> العملاء</span></a>

                            <a style="color: #3FA99E;font-weight:bold;" href="../formmsg/" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-euro-sign fa-fw me-3" style="color: #3FA99E;"></i><span> فورم الرسالة</span></a>

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


                    <?php
                    if (isset($_GET['idr'])) {

                        $idc = $_GET['idr'];



                    ?>

                        <br>

                        <div class="container">
                            <?php
                            $sql3 = "SELECT user.id_user, user.id_user from user, client.id_client, client.num_client
        FROM client
        LEFT JOIN client ON user.id_user = client.id_client";
                            $res3 = mysqli_query($con, $sql3);
                            if ($res3) {
                                while ($rows3 = mysqli_fetch_assoc($res3)) {
                            ?>

                                    <h2 style="text-align: center;color: white;font-weight:bold"> <?php echo $rows3['num_client'] ?> العميل رقم </h2>
                                    <br>
                                    <p style="text-align: center;font-weight:bold;color: white;font-size:20px;"><?php echo $rows3['nom_client'] ?> <span style="font-weight:bold;"> </span></p>

                            <?php
                                }
                            }
                            ?>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-hover" style="background-color: white;border-radius: 20px 20px 20px 20px ;">
                                    <thead>
                                        <tr>
                                            <th style="font-weight:bold;" scope="col">تاريخ الانتهاء</th>
                                            <th style="font-weight:bold;" scope="col">تاريخ البدا</th>
                                            <th style="font-weight:bold;" scope="col">الساعات</th>


                                            <th style="font-weight:bold;" scope="col"> الايام</th>
                                            <th style="font-weight:bold;" scope="col">اسم الدواء</th>

                                            <th style="font-weight:bold;" scope="col">#</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql6 = "select * from trt natural join dwa where id_client='$idc'";
                                        $res6 = mysqli_query($con, $sql6);
                                        if ($res6) {
                                            $i = 1;
                                            while ($rows6 = mysqli_fetch_assoc($res6)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $rows6['end_date']; ?> </td>
                                                    <td><?php echo $rows6['start_date']?></td>
                                                    <td><?php echo $rows6['hours']; ?></td>
                                                    <td><?php echo $rows6['days']; ?></td>

                                                    <td><?php echo $rows6['nom_dwa']; ?></td>

                                                    <th scope="row"><?php echo $i; ?></th>


                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3"></div>


                        </div>










                    <?php
                    }
                    ?>





                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="text-align: center;">
                                <div class="modal-header">
                                    <h5 style="text-align:center!important;" class="modal-title" id="exampleModalLabel"> اضافة علاج جديد</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <!-- desc input -->
                                        <span style="text-align: center;"> الوصف</span>

                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" name="desc" id="textAreaExample" rows="4"></textarea>
                                        </div>

                                        <!-- nom dwa input -->
                                        <span style="text-align: center;"> اسم الدواء</span>

                                        <div class="form-outline mb-4">
                                            <input type="date" name="nomd" id="form1Example2" class="form-control" />
                                        </div>

                                        <!-- date debut input -->
                                        <span style="text-align: center;">تاريخ البدأ</span>

                                        <div class="form-outline mb-4">
                                            <input type="date" name="dated" id="form1Example2" class="form-control" />
                                        </div>


                                        <!-- date fin input -->
                                        <span>تاريخ الانتهاء</span>

                                        <div class="form-outline mb-4">
                                            <input type="date" name="datef" id="form1Example2" class="form-control" />
                                        </div>



                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>



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
    header('location:../login/');
    ob_end_flush();
}


?>