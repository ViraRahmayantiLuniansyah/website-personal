<?php
include 'db.php';

$id = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM admin_users WHERE id = $id");
$data  = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $hashed   = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query(
        $conn,
        "UPDATE admin_users 
         SET username = '$username',
             password = '$hashed'
         WHERE id = $id"
    );

    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Admin User</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <h2>Edit Admin User</h2>
  <form method="POST">
    <label>Username:</label><br>
    <input 
      type="text" 
      name="username" 
      value="<?php echo htmlspecialchars($data['username']); ?>" 
      required
    ><br><br>

    <label>Password Baru:</label><br>
    <input 
      type="password" 
      name="password" 
      placeholder="Masukkan password baru" 
      required
    ><br><br>

    <button type="submit">Simpan Perubahan</button>
  </form>
</body>
</html>
