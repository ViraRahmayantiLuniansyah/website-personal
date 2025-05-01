<?php
include 'db.php';
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM certificates WHERE id=$id"));
unlink("images/" . $data['image']); 

mysqli_query($conn, "DELETE FROM certificates WHERE id=$id");
header("Location: sertifikat.php");
exit();
?>
