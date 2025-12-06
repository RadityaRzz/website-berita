<?php
include "koneksi.php";

$id = $_GET['id'];
$aksi = $_GET['aksi'];

if ($aksi == "acc") {
    $status = "approved";
} else if ($aksi == "tolak") {
    $status = "rejected";
}

mysqli_query($conn, "UPDATE berita SET status='$status' WHERE id='$id'");

header("Location: dashboard_admin.php");
exit;
?>
