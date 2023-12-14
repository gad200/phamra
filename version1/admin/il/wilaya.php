h<?php 
include("../../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>المعهد الوطني للتكوين العالي الشبه طبي لولاية المدية</title>
  <link rel="icon" href="../img/maxresdefault.jpg" type="image/icon type">

    <!-- MDB icon -->
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      
  
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../../css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
  

    <div class="container">
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid" >
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarCenteredExample"
      aria-controls="navbarCenteredExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
       <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
          
-->
  <style type="text/css">
    
  </style>
         <li class="nav-item" >
          <a class="nav-link" href="../entree/entsor.php" style="margin-right: 20px;font-weight: bold;font-size: 15px;" >دخول/خروج    <i style="color: #6dd2e8;margin-left: 5px;" class="fa-solid fa-arrow-right-arrow-left"></i></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="../talab/talab.php" style="margin-right: 20px;font-weight: bold;font-size: 15px;">قائمة الطلب    <i style="color: #6dd2e8;margin-left: 5px;" class="fa-solid fa-list-check"></i></a>
          </li>

        <li class="nav-item">
          <a class="nav-link" href="../iwaa/iwaa.php" style="margin-right: 20px;font-weight: bold;font-size: 15px;">الايواء    <i  style="margin-left: 5px; color: #6dd2e8;" class="fa-solid fa-user"></i></a>
        </li>
        <!-- Navbar dropdown -->
        <li class="nav-item dropdown" style="margin-right: 20px;font-weight: bold;font-size: 15px;">
                
          <a 

            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
                 تحضيرات  
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right; ">
            <li>
              <a class="dropdown-item" href="wilaya.php">ملف الولايات    <i style="margin-left: 5px; color: #6dd2e8;" class="fa-solid fa-location-arrow"></i></a>
            </li>
            <li>
              <a class="dropdown-item" href="bladiya.php">ملف البلديات    <i style="margin-left: 5px;color: #6dd2e8;" class="fa-solid fa-map-location"></i></a>
            </li>

             <li>
              <a class="dropdown-item" href="jinsiya.php">ملف الجنسيات    <i style="margin-left: 5px;color: #6dd2e8;" class="fa-solid fa-flag"></i></a>
            </li>

             <li>
              <a class="dropdown-item" href="tor.php">ملف الطور   <i style="margin-left: 5px;color: #6dd2e8;" class="fa-solid fa-graduation-cap"></i></a>
            </li>

             <li>
              <a class="dropdown-item" href="talib.php">ملف الطالب    <i style="margin-left: 5px;color: #6dd2e8;" class="fa-solid fa-user-graduate"></i></a>
            </li>

             <li>
              <a class="dropdown-item" href="aksam.php">ملف الاقسام/الشعب    <i style="margin-left: 5px;color: #6dd2e8;" class="fa-solid fa-book"></i></a>
            </li>
           
          </ul>
        </li>
       
      </ul>

      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->



      <div class="d-flex align-items-center">
      <!-- Icon -->
     
       <a class="text-reset me-3" href="../edit.php">
         <i class="fas fa-cogs" style="color: #6dd2e8;"></i>

      </a>

      <a class="text-reset me-3" href="../logout.php">
       <i class="fa-solid fa-arrow-right-from-bracket" style="color: #6dd2e8;"></i>
      </a>

       


    </div>

</nav>



<br>


<h2 style="text-align: center;">ملف الولايات</h2>


<p id="msg"></p>
<div class="row">
  <div class="col-md-9"></div>
  <div class="col-md-3">
    <button type="button" style="font-weight: bold;font-size: 15px;" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
  اضافة
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 style="text-align: center;"  >اضافة ولاية جديدة</h5>
        <hr>
        <form id="userForm" method="post">

          <div class="form-outline mb-4">
    <input placeholder="الرمز" type="text" name="p1" id="p1"  style="text-align: center;" class="form-control" />
  </div>

 <select class="form-control olorful-select dropdown-danger" id="p2" name="p2" style="text-align: center;" searchable="Recherche">
  <option value=""  selected  >اختر الولاية </option>
  <option  value="adrar" >Adrar</option>
  <option value="chlef">Chlef</option>
  <option value="laghouat">Laghouat</option>
  <option value="oum bouaghi">Oum Bouaghi</option>
  <option value="batna">Batna</option>
  <option value="béjaia">Béjaia</option>
  <option value="biskra">Biskra</option>
  <option value="bechar">Bechar</option>
  <option value="blida">Blida</option>
  <option value="bouira">Bouira</option>
  <option value="tamanrasset">Tamanrasset</option>
  <option value="tebessa">Tebessa</option>
  <option value="telemcen">Telemcen</option>
  <option value="tiaret">Tiaret</option>
  <option value="tizi ouzou">Tizi Ouzou</option>
  <option value="alger">Alger</option>
  <option value="djelfa">Djelfa</option>
  <option value="jijel">Jijel</option>
  <option value="setif">Setif</option>
  <option value="saida">Saida</option>
  <option value="skikda">Skikda</option>
  <option value="sidi bel abbes">Sidi bel abbes</option>
  <option value="annaba">Annaba</option>
  <option value="guelma">Guelma</option>
  <option value="constantine">Constantine</option>
  <option value="medea">Médéa</option>
  <option value="mostaganem">Mostaganem</option>
  <option value="m'sila">M'sila</option>
  <option value="maascar">Maascar</option>
  <option value="ouargla">Ouargla</option>
  <option value="oran">Oran</option>
  <option value="el baydh">El baydh</option>
  <option value="illizi">Illizi</option>
  <option value="bordj">Bordj</option>
  <option value="boumerdes">Boumerdes</option>
  <option value="el taref">El taref</option>
  <option value="tindouf">Tindouf</option>
  <option value="tissemsilt">Tissemsilt</option>
  <option value="el oued">El oued</option>
  <option value="khenchla">Khenchla</option>
  <option value="souk Ahrass">Souk Ahrass</option>
  <option value="tipaza">Tipaza</option>
  <option value="mila">Mila</option>
  <option value="ain defla">Ain defla</option>
  <option value="nàama">Nàama</option>
  <option value="ain Temouchent">Ain Temouchent</option>
  <option value="gharida">Gharida</option>
  <option value="relizane">Relizane</option>
 

</select>


      </div>
       <div class="form-outline mb-4" style="text-align: center;">
        <input type="hidden" value="1" name="type">
        <button type="submit" class="btn btn-success" >حفظ</button>
      </div>
      </form>
    </div>
  </div>
</div>
  </div>

</div>





    </div>

<br>

  <div class="container" >
    <div id="link_wrapper" style="text-align: center;">

    </div>
  </div>


  <script>

$(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#link_wrapper').html(data);  

                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  




</script>








    <!-- End your project here-->

    <!-- MDB -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="../../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
