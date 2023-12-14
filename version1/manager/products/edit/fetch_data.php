<?php include('../../../connection.php');

$output = array();
$sql = "SELECT * FROM user ";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'nom_user',
//	1 => 'password_user',
//	2 => 'id_user',

);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE nom_user like '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_user desc";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  " . $start . ", " . $length;
}

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {

    $id=$row['id_user'];
    // session_start();
    //  $_SESSION['name']=$id;
    $sub_array = array();
    // $sub_array[] = '  <a href="products.php" data-id="' . $row['id_user'] . '"  class="btn btn-link btn-sm deleteBtn" ><i style="color:#d90707;" class="fas fa-trash"></i></a>';
    $sub_array[] = "  <a  href='edit/index.php?id=$id' class='btn btn-link ' ><i  style='color: #3FA99E' class='fas fa-file-upload'></i></a>";
    //$sub_array[] = '  <a href="../login/edit.php" data-id="' . $row['id_user'] . '"  class="btn btn-link btn-sm editBtn" ><i style="color:forestgreen" class="fas fa-trash"></i></a>';

    $sub_array[] = $row['nom_user'];
    $sub_array[] = $row['phone'];


    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' =>   $total_all_rows,
    'data' => $data,
);
//var_dump(json_encode($output));die();
echo  json_encode($output);
