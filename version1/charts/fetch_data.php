<?php
include('../connection.php');
$id = $_GET['id'];
$output = array();

// Add the user ID condition to the SQL query
$sql = "SELECT * FROM products WHERE id_user = $id";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'product_name',
    1 => 'product_price',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " AND (`product_name` LIKE '%" . $search_value . "%')";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_product DESC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length;
}

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $r = $row['id_product'];
    $sub_array = array();

    $sub_array[] = '<a href="javascript:void();" data-id="' . $row['id_product'] . '" class="btn btn-link btn-sm Btn"><i style="color: red;" class="fas fa-trash"></i></a>';
    //$sub_array[] = '<a href="javascript:void();" data-id="' . $row['id_client'] . '" class="btn btn-link btn-sm editbtn"><i style="color: green;" class="fas fa-pencil-alt"></i></a>';

    //$link = "<a target='_blank' href='details.php?idr=$r'><i class='fas fa-file-upload' style='color: #3FA99E;'></i></a>";
    //$sub_array[] = $link;

  //  $sub_array[] = $row['product_price'];


    $sub_array[] = $row['product_name'];

    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);
echo json_encode($output);
?>
