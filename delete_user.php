<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; 

    $sql = "DELETE FROM admin_users WHERE id = $id";
    $delete = mysqli_query($conn, $sql);

    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='admin.php';</script>";
    } else {
        echo "Query gagal: " . mysqli_error($conn);
        echo "<br>Query: $sql";
    }
} else {
    echo "ID tidak ditemukan di URL.";
}
?>
