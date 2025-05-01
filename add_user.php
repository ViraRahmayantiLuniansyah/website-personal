<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "
      INSERT INTO admin_users (username, password)
      VALUES ('$username', '$hashedPassword')
    ";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Admin berhasil ditambahkan');
                window.location.href='admin.php';
              </script>";
    } else {
        echo "Gagal menambahkan admin: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Admin User</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <h2>Tambah Admin User</h2>
  <form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Simpan</button>
  </form>
</body>
</html>
