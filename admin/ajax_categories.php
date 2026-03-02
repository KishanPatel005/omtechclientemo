<?php
include '../includes/conneaction.php';

header('Content-Type: application/json');

if (isset($_GET['cat_id'])) {
    $cat_id = (int)$_GET['cat_id'];
    $res    = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = $cat_id AND status = 'active' ORDER BY sub_category_name ASC");
    $data   = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
