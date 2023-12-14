<?php
ob_start();
include '../db.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mohamed Elbakry Project</title>
  <link rel="icon" href="../img/maxresdefault.jpg" type="image/icon type">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="../style.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
</head>

<style type="text/css">
  label {
    display: inline-block;
    width: 310px;
    text-align: center;
  }
</style>

<body style="background-color: #222B32!important;">
  <div class="container-fluid form-container" style="margin-top:-20px;">
    <div class="container login-container">
      <div class="row">
        <div class="col-md-7 content-part">

          <h6 style="text-align:center;font-weight:bold;color:#3FA99E">Mohamed Elbakry Project</h6>
            <hr>
            <h2> <img style="text-align:center;margin-bottom:15px" class="rounded-circle" src="1.jpg" alt="" width="250" height="250">

              <p style="text-align:center;color:#3FA99E;font-weight:bold"> مؤسسة مسك للخدمات الطلابية للطلاب </p>
            </h2>




        </div>
        <div class="col-md-5 form-part">
          <div class="row">

            <div class="col-lg-8 col-md-11  formcol mx-auto">
              <div class="d-flex justify-content-center mb-4">
                <img src="assets/images/1.jpg" class="rounded-circle shadow-1-strong" width="150" height="150" />
              </div>
              <h3 style="color: #3FA99E;font-weight:bold">تسجيل الدخول</h3>
            <a href="login.php"  <h3 style="color: #3FA99E;font-weight:bold">تسجيل الدخول كمشرف</h3></a>
              <form method="POST">
                <div class="form-floating mb-3">
                  <div class="row">
                    <div class="col-lg-12">
                      <input type="text" name="nom" style="text-align: center;" class="form-control" id="floatingInput" placeholder=" اسم المستخدم">
                    </div>

                  </div>
                </div>


                <div class="form-floating ">
                  <div class="row">
                    <div class="col-md-12"><input style="text-align: center;" type="password" name="password" class="form-control" id="floatingPassword" placeholder=" كلمة المرور"></div>


                  </div>
                </div>


                <div class="form-floating">
                  <div class="row">
                    <div class="col-md-12">
                      <button type="sumbit" name="connect" class="btn" style="background-color:#3FA99E;color:white;font-weight:bold">دخول</button>
                    </div>
                  </div>
                </div>   
              </form>





<?php
if (isset($_POST['connect'])) {
$nom = $_POST['nom'];
$password = $_POST['password'];
if ($nom != "" && $password != "") {

$sql1 = "SELECT * FROM  user where nom_user='$nom' and password_user='$password' ";
$res1 = mysqli_query($mysqli, $sql1);
if (!$res1) {
echo "ERROR  :" . mysqli_error($mysqli);
}
$rows = mysqli_fetch_array($res1);
$rc = mysqli_num_rows($res1);



if ($rc == 1) {
session_start();
$idadmin = $rows['id_user'];
$nomadmin = $rows['nom_user'];

$_SESSION['name_admin2'] = $nom;
$_SESSION['id_admin2'] = $idadmin;

header('location:../index.php');
ob_end_flush();
} else {
?>
<br>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body btn-danger" style="text-align: center;"> ادخلت معلومات خاطئة </div>
</div>
</div>

</div>
<?php
}
} else {
?>
<br>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body btn-danger" style="text-align: center;">يجب ملأ المعلومات</div>
</div>
</div>

</div>

<?php
}
}


?>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>






  <script>
    new WOW().init();
  </script>



</body>

</html>