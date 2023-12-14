<?php include('../../connection.php');

$output = array();
$sql = "SELECT * FROM manager ";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'name_manager',

);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE name_manager like '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_manager desc";
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
    $sub_array = array();
    $sub_array[] = '  <a href="javascript:void();" data-id="' . $row['id_manager'] . '"  class="btn btn-link btn-sm deleteBtn" ><i style="color:#d90707;" class="fas fa-trash"></i></a>';
    $sub_array[] = '<a href="javascript:void();" data-id="' . $row['id_manager'] . '" class="btn btn-link btn-sm editbtn"><i style="color: green;" class="fas fa-pencil-alt"></i></a>';
   // $sub_array[] = '<a href="../../manager/index.php" data-id="' . $row['id_manager'] . '" class="btn btn-link btn-sm runbtn"><i style="color: green;" class="fas fa-pencil-alt"></i></a>';
    $sub_array[] = $row['password_manager'];
    $sub_array[] = $row['name_manager'];


    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' =>   $total_all_rows,
    'data' => $data,
);
echo  json_encode($output);
