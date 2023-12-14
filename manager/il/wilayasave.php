  <?php
include '../../db.php';
$db=$mysqli;

$p1    = legal_input($_POST['p1']);
$p2 = legal_input($_POST['p2']);


  
if(!empty($p1) && !empty($p2) ){
    //  Sql Query to insert user data into database table
    Insert_data($p1,$p2);
}else{
?>
	<div class="col-md-12" style="text-align: center;">
		<div class="alert alert-danger" role="alert" style="font-weight: bold;">
  يرجى ملأ جميع المعلومات
</div>
	</div>

<?php 
}
 
// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
// // function to insert user data into database table
 function insert_data($p1,$p2){
 
     global $db;
      $query="INSERT INTO wilaya(num_wilaya,nom_wilaya) VALUES('$p1','$p2')";
     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       ?>
      
       <div class="col-md-12" style="text-align: center;">
       	<div class="alert alert-success" role="alert" style="font-weight: bold;">
لقد تمت اضافة الولاية بنجاح
</div>
       	
       	       </div>
       <?php
     }
     else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($db);
     }
 }

?>