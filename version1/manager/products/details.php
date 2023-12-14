<?php include('../../connection.php');

$output = array();
$sql = "SELECT * FROM products  where id_user=$id";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'product_name',

);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE product_name like '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_product desc";
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
    $idi = $row['id_product'];
    $sub_array = array();
    $sub_array[] = '  <a href="javascript:void();" data-id="' . $row['id_product'] . '"  class="btn btn-link btn-sm deleteBtn" ><i style="color: #3FA99E" class="fas fa-trash"></i></a>';
   // $sub_array[] = "  <a  target='_blank' href='details.php?i=$idi' class='btn btn-link ' ><i  style='color: #3FA99E' class='fas fa-file-upload'></i></a>";
    $sub_array[] = $row['product_name'];




    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' =>   $total_all_rows,
    'data' => $data,
);
echo  json_encode($output);
