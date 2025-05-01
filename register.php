<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query_check_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = mysqli_query($conn, $query_check_username);
    
    if (!$result_username) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($result_username) > 0) {
        echo "Username sudah terdaftar!";
        exit();
    }

    $query_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_email = mysqli_query($conn, $query_check_email);
    
    if (!$result_email) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($result_email) > 0) {
        echo "Email sudah terdaftar!";
        exit();
    }


    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <h2>Register</h2>
  <form action="register.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
  </form>
  <p>Sudah punya akun? <a href="login.html">Login</a></p>
</body>
</html>
