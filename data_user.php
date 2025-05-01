<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<h2>Data Pengguna</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Tanggal Daftar</th>
  </tr>

  <?php while($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['created_at'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>

<a href="admin.php">⬅ Kembali ke Admin</a>
