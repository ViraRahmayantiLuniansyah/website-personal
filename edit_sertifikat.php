<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM certificates WHERE id=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];

  if ($_FILES['image']['name']) {
    $imageName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName, "images/" . $imageName);
    mysqli_query($conn, "UPDATE certificates SET title='$title', description='$description', image='$imageName' WHERE id=$id");
  } else {
    mysqli_query($conn, "UPDATE certificates SET title='$title', description='$description' WHERE id=$id");
  }

  header("Location: sertifikat.php");
  exit();
}
?>

<h2>Edit Sertifikat</h2>
<link rel="stylesheet" href="register.css">
<form method="POST" enctype="multipart/form-data">
  Judul: <input type="text" name="title" value="<?php echo $data['title']; ?>"><br><br>
  Deskripsi:<br>
  <textarea name="description"><?php echo $data['description']; ?></textarea><br><br>
  Ganti Gambar (opsional): <input type="file" name="image"><br><br>
  <button type="submit">Simpan Perubahan</button>
</form>
