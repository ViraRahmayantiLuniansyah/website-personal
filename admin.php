<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM admin_users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <h2>Admin Dashboard</h2>
  <a href="add_user.php" style="display: inline-block; margin: 20px; padding: 10px 20px; background: #ff69b4; color: white; text-decoration: none; border-radius: 8px;">+ Tambah Data</a>
  <table>
    <tr>
      <th><br>ID<br></th>
      <th><br>Username<br></th>
      <th><br>Password<br></th>
      <th><br>Aksi<br></th>
    </tr>

    <li><a href="sertifikat.php">📄 Kelola Sertifikat</a></li>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td>
        <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>


