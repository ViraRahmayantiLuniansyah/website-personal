<?php
session_start();
include 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query  = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: admin.php");
            exit();
        } else {
            $error = "❌ Password salah!";
        }
    } else {
        $error = "❌ Username admin tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <h2>Login Admin</h2>
  <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST" action="">
    <input type="text"    name="username" placeholder="Username Admin" required><br>
    <input type="password"name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>
