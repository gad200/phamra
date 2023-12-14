<?php
ob_start();




session_start();
include '../../db.php';
if (isset($_SESSION["username"])) {
$nom = $_SESSION["username"];
$sql1 = "SELECT * FROM admin where id_admin = '$nom'";
$res1 = mysqli_query($mysqli, $sql1);
while ($rows1 = mysqli_fetch_array($res1)) {
$idadm = $rows1['id_admin'];



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mohamed Elbakry Project</title>
    <link href="../img/alt-logo.png" rel="icon">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
<br>
<div class="container">

    <div class="row">
        <div class="col-md-3"><a href="../">الرئيسية</a></div>
        <div class="col-md-9"></div>

    </div>


</div>

<div class="container-fluid form-container">
    <div class="container login-container">







        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6 form-part">
                <div class="row">

                    <div class="col-lg-8 col-md-11  formcol mx-auto">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="assets/images/1.jpg" class="rounded-circle shadow-1-strong" width="150" height="150" />
                        </div>
                        <h3> تحديث معلومات المستخدم</h3>
                        <form method="POST">
                            <div class="form-floating">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" style="text-align:center;" name="nom" class="form-control" placeholder="الاسم">

                                    </div>
                                </div>
                                <br>


                                <div class="form-floating">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input style="text-align:center;" type="password" name="password" class="form-control" id="floatingPassword" placeholder=" كلمة المرور">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <button type="sumbit" name="edit" class="btn btn-primary"> تعديل</button>
                                </div>
                        </form>


                        <?php

                        if (isset($_POST['edit'])) {

                            // $nom=$_POST['nom'];
                            //$password=$_POST['password'];

                            $sql3 = "UPDATE admin SET name_admin='" . $_POST['nom'] . "',password_admin='" . $_POST['password'] . "'  WHERE id_admin='$idadm'  ";

                            $res3 = mysqli_query($mysqli, $sql3);


                            if (!$res3) {
                                echo "ERROR  :" . mysqli_error($mysqli);
                            } elseif ($res3) {
                                header('location:logout.php');
                                ob_end_flush();
                                // echo "les information sont modifié correctement";
                            }
                        }
                        ?>



                    </div>

                </div>

            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</div>

<br>
<?php
}
} else {
    header('location:../index.php');
    ob_end_flush();
}


?>




<script>
    new WOW().init();
</script>



</body>

</html>