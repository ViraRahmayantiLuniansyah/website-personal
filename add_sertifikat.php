<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $imageName = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];

  move_uploaded_file($tmpName, "images/" . $imageName);

  mysqli_query($conn, "INSERT INTO certificates (title, description, image) VALUES ('$title', '$description', '$imageName')");
  header("Location: sertifikat.php");
  exit();
}
?>

<h2>Tambah Sertifikat</h2>
<link rel="stylesheet" href="login.css">
<form method="POST" enctype="multipart/form-data">
  Judul: <input type="text" name="title" required><br><br>
  Deskripsi:<br>
  <textarea name="description" required></textarea><br><br>
  Gambar: <input type="file" name="image" accept="image/*" required><br><br>
  <button type="submit">Simpan</button>
</form>
