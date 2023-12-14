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
<?php 
include("../../db.php");

//pagination.php  
 
 $record_per_page = 10;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM wilaya ORDER BY id_wilaya ASC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($mysqli, $query);  
 $output .= "  
      <table class='table table-striped table-hover' >  
           <tr>  
                <th width='10%' style='font-weight: bold'>حذف</th>
                <th width='10%' style='font-weight: bold'>تعديل</th>  

                <th width='40%' style='font-weight: bold'>الرمز</th>  
                  <th width='40%' style='font-weight: bold'>الولاية</th> 

           </tr>  
 ";  
 
 while($row = mysqli_fetch_array($result))  
 {  

      $output .= '  
           <tr>  
                <td><a href="update.php?eidw= '.$row['id_wilaya'].'" class="btn btn-danger"><i class="far fa-trash-alt"></i>        </a></td> 
                <td><a href="update.php?eidw= '.$row['id_wilaya'].'" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>  </a></td> 

                
                <td>'.$row["num_wilaya"].'</td>  
                <td>'.$row["nom_wilaya"].'</td>  

           </tr>  
      '; 
 }  
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM wilaya ORDER BY id_wilaya ASC";  
 $page_result = mysqli_query($mysqli, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px;  #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;







 if($total_records<11)
 {
  ?>
    <script type="text/javascript">
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
  <?php 
 }






 ?>


</script>