<?php
include 'includes/conneaction.php';
$res = mysqli_query($con, "SHOW TABLES");
if ($res) {
    while ($row = mysqli_fetch_array($res)) {
        echo $row[0] . "\n";
    }
} else {
    echo "Error: " . mysqli_error($con);
}
?>
