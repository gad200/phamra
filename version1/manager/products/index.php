<?php
ob_start();




session_start();
include '../../connection.php';
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
            <link rel="stylesheet" href="../../css/mdb.min.css" />
            <!-- Custom styles -->
            <link rel="stylesheet" href="../../css/admin.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
        </head>

        <body style="background-color: #222B32!important;">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a style="color: #3FA99E;font-weight:bold;" href=" ../index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الادوية</span>
                        </a>
                        <a style="color: #3FA99E;font-weight:bold;" href=" index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>المنتجات</span>
                        </a>





                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" style="background-color: #3FA99E;color:white;" class="navbar navbar-expand-lg navbar-light  fixed-top">
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

                <br>





                <div class="container">

                    <h2 style="text-align: center;font-weight:bold;color: white;">قائمة العملاء</h2>
                    <br>

                    <div class="row">
                        <div class="col-md-9"></div>

                    </div>
                </div>

                <br>
                <br>
                <!-- Button trigger modal -->




                <body>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" style="background-color: white;border-radius: 20px 20px 20px 20px ;">
                            <div id="successMsg"></div>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" style="background-color: white;border-radius: 20px 20px 20px 20px ;">
                            <div id="successMsg2"></div>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" style="background-color: white;border-radius: 20px 20px 20px 20px ;">
                            <div id="successMsg3"></div>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </div>



                <div class="container-fluid">

                    <div class="row">
                        <div class="container">

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8" style="background-color: white;border-radius: 20px 20px 20px 20px ; padding:20px 20px 20px 20px">
                                    <table style="text-align: center;" id="example" class="table table-striped table-hover">
                                        <thead>
                                        <th><i class="fas fa-cogs"></i></th>
                                        <th>الاسم </th>
                                        <th>الرقم</th>

                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <!-- Optional JavaScript; choose one of the two! -->
                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
                <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>
                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
      -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                                $(nRow).attr('id', aData[0]);
                            },
                            'serverSide': 'true',
                            'processing': 'true',

                            'paging': 'true',
                            'order': [],
                            'ajax': {
                                'url': 'fetch_data.php',
                                'type': 'post',
                            },
                            "aoColumnDefs": [{
                                "bSortable": false,
                                "aTargets": [2]
                            },

                            ]
                        });
                    });

                    // $('#example').on('click', '.editbtn', function(event) {  // ! on click the edit button
                    //     event.preventDefault();
                    //     //  var table = $('#example').DataTable();
                    //     var trid = $(this).closest('tr').attr('id');
                    //     var id = $(this).data('id');
                    //
                    //     $('#exampleModal').modal('show');
                    //
                    //     $.ajax({
                    //         url: "products.php",
                    //         data: {
                    //             id: id
                    //         },
                    //         type: 'post',
                    //         success: function(data) {
                    //             var json = JSON.parse(data);
                    //
                    //             // $('#nameField').val(json.product_name);
                    //             // $('#phone').val(json.product_price);
                    //
                    //             $('#id').val(id);
                    //             $('#trid').val(trid);
                    //         }
                    //     });
                    // });

                </script>



                <!-- Add user Modal -->



                <!-- Fin Add user Modal -->

























            </div>
        </main>
        <!--Main layout-->
        <!-- MDB -->
        <script type="text/javascript" src="../../js/mdb.min.js"></script>
        <!-- Custom scripts -->
        <script type="text/javascript" src="../../js/admin.js"></script>

        </body>

        </html>



        <?php
    }
} else {
    header('location:../login/');
    ob_end_flush();
}


?>