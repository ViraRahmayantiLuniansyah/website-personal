<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM certificates");
?>

<h2>Daftar Sertifikat</h2>
<link rel="stylesheet" href="register.css">
<a href="add_sertifikat.php">+ Tambah Sertifikat</a><br><br>
<table border="1" cellpadding="10">
  <tr>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><img src="images/<?php echo $row['image']; ?>" width="100"></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td>
      <a href="edit_sertifikat.php?id=<?php echo $row['id']; ?>">Edit</a> |
      <a href="delete_sertifikat.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
