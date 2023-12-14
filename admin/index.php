<?php
ob_start();




session_start();
include '../connection.php';
if (isset($_SESSION['name_admin'])) {
    $nom = $_SESSION['name_admin'];
    $sql1 = "SELECT * FROM admin where name_admin = '$nom'";
    $res1 = mysqli_query($con, $sql1);
    while ($rows1 = mysqli_fetch_array($res1)) {
        $idadm = $rows1['id_admin'];
        $_SESSION["username"] = $idadm;


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
                        <a style="color: #3FA99E;font-weight:bold; " href="index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>الرئيسية</span>
                        </a>     <a style="color: #3FA99E;font-weight:bold; " href="manager/index.php" class="list-group-item list-group-item-action py-2 ripple  " aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>المديرين</span>
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

                    <h5 style="margin-right:15px; margin-left: 10px;"> <?php echo $rows1['name_admin']; ?> مرحبا</h5>

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

                <br>





                <div class="container">

                    <h2 style="text-align: center;font-weight:bold;color: white;">قائمة المستخدمين</h2>
                    <br>

                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">

                            <button type="button" class="btn" style="background-color: #3FA99E;color:white" data-mdb-toggle="modal" data-mdb-target="#addUserModal">
                                اضافة
                            </button>



                        </div>
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
                                        <th>تعديل</th>
                                        <th>تسجيل دخول</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>كلمة المرور</th>
                                        <th>رقم الهاتف </th>
                                        <th>الاسم</th>

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
                <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
                <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
      -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                                $(nRow).attr('id', aData[4]);
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
                    $(document).on('submit', '#addUser', function(e) {
                        e.preventDefault();
                        var username = $('#addUserField').val();
                        var b = $('#b').val();
                        var phone = $('#addnumField').val();

                        if (username != '') {
                            $.ajax({
                                url: "add_user.php",
                                type: "post",
                                data: {
                                    username: username,
                                    phone: phone,
                                    b: b


                                },
                                success: function(data) {
                                    var json = JSON.parse(data);
                                    var status = json.status;
                                    if (status == 'true') {
                                        mytable = $('#example').DataTable();
                                        mytable.draw();
                                        $('#addUserModal').modal('hide');
                                        location.reload(true);
                                        $("#successMsg ").append('<div class="alert alert-success" role="alert" style="text-align:center;"> data was added successfully</div>');
                                        setTimeout(function() {
                                            $('#successMsg').fadeOut('fast');
                                        }, 2000);


                                    } else {
                                        alert('failed');
                                    }
                                }
                            });
                        } else {
                            alert('All information must be filled out');

                        }
                    });
                    ////////////////////////////////////////

                    $('#example').on('click', '.editbtn', function(event) {  // ! on click the edit button
                        event.preventDefault();
                        //  var table = $('#example').DataTable();
                        var trid = $(this).closest('tr').attr('id');
                        var id = $(this).data('id');

                        $('#exampleModal').modal('show');

                        $.ajax({
                            url: "get_single_data.php",
                            data: {
                                id: id
                            },
                            type: 'post',
                            success: function(data) {
                                var json = JSON.parse(data);

                                $('#nameField').val(json.nom_user);
                                $('#password').val(json.password_user);
                                $('#numField').val(json.phone);

                                $('#id').val(id);
                                $('#trid').val(trid);
                            }
                        });
                    });

                    $(document).on('submit', '#updateUser', function(event) { // ! onsubmit update user form
                        event.preventDefault();
                        var id = $('#id').val();
                        var name = $('#nameField').val();
                        var phone =$('#numField').val();
                        var password = $('#password').val();
                        var trid = $('#trid').val();
                        if (name != '') {
                            $.ajax({
                                type: 'POST',
                                url: 'update_user.php', // Change this to the actual URL
                                data: {
                                    id: id,
                                    name: name,
                                    phone:phone,
                                    password: password
                                },

                                success: function(data) {
                                    var json = JSON.parse(data);
                                    var status = json.status;
                                    if (status === 'true') {
                                        table = $('#example').DataTable();
                                        var buttons = '<td>  <a href="javascript:void();" data-id="' + id + '" class="btn btn-link btn-sm deleteBtn"><i class="fas fa-trash" style="color:#d90707;"></i></a><a href="javascript:void();" data-id="' + id + '" class="btn btn-link btn-sm editbtn"><i style="color:#1cd907;" class="fas fa-pen"></i></a></td>';
                                        // alert(trid);
                                        var row = table.row("[id='" + trid + "']");
                                        row.data([buttons, json.link, password, name, phone]);
                                        $('#exampleModal').modal('hide');
                                        $("#successMsg2").append('<div class="alert alert-success" role="alert" style="text-align:center;">Data was updated successfully</div>');
                                        setTimeout(function() {
                                            location.reload();
                                        }, 2000);
                                    } else {
                                        alert('Failed to update data');
                                    }
                                }
                            });
                        } else {
                            alert('All information must be filled out');
                        }
                    });




                    $(document).on('click', '.deleteBtn', function(event) {
                        var table = $('#example').DataTable();
                        event.preventDefault();
                        var id = $(this).data('id');
                        if (confirm("Confirm deletion of information")) {
                            $.ajax({
                                url: "delete_user.php",
                                data: {
                                    id: id
                                },
                                type: "post",
                                success: function(data) {
                                    var json = JSON.parse(data);
                                    status = json.status;
                                    if (status == 'success') {

                                        //table.fnDeleteRow( table.$('#' + id)[0] );
                                        //$("#example tbody").find(id).remove();
                                        //table.row($(this).closest("tr")) .remove();

                                        $("#" + id).closest('tr').remove();
                                        location.reload(true);
                                        // $("#successMsg ").append('<div class="alert alert-danger" role="alert" style="text-align:center;">تم حذف الولاية بنجاح</div>');

                                    } else {
                                        alert('Failed');
                                        return;
                                    }
                                }
                            });
                        } else {
                            return null;
                        }



                    })
                </script>



                <!-- Add user Modal -->

                <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 style="text-align: center;">اضافة مستخدم</h5>
                                <hr>
                                <form id="addUser" action="">



                                    <div class="mb-3 row">
                                        <div class="col-md-12">

                                            <input type="text" name="name" id="addUserField" placeholder="الاسم" class="form-control" style="text-align:center;" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-12">

                                            <input type="text" name="phone" id="addnumField" placeholder="الهاتف" class="form-control" style="text-align:center;" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-12">

                                            <input type="password" name="name" id="b" placeholder="كلمة المرور" class="form-control" style="text-align:center;" required>
                                        </div>
                                    </div>




                                    <div class="text-center">
                                        <button type="submit" class="btn" style="background-color: #3FA99E;color:white">اضافة</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Fin Add user Modal -->

                <!--  update user Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 style="text-align: center;">تعديل مستخدم</h5>
                                <hr>
                                <form id="updateUser">
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="hidden" name="trid" id="trid" value="">

                                    <div class="mb-3 row">
                                        <div class="col-md-12">


                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="col-md-12">


                                            <input type="text" name="name" placeholder="الاسم" id="nameField" class="form-control" style="text-align:center;">



                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-12">


                                            <input type="text" name="phone" placeholder="الهاتف" id="numField" class="form-control" style="text-align:center;">



                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <input type="text" name="password" placeholder="كلمة المرور" id="password" class="form-control" style="text-align:center;">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="editbtn btn-success">تعديل</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!--  fin update user Modal -->

























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