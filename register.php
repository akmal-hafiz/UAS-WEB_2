<?php
session_start();
include 'koneksi.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Cek apakah email sudah digunakan
  $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($cek) > 0) {
    $error = "Email sudah terdaftar!";
  } else {
    $query = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', 'user')";
   if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('Registrasi berhasil! Silakan login.');
        window.location.href = 'login.php';
    </script>";
    exit;
}
 {
      $error = "Registrasi gagal. Coba lagi.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css"> <!-- Ganti dengan file CSS kamu -->
  <style>
    body {
      background: url('images/register-bg.jpg') no-repeat center center/cover;
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 450px;
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .register-box input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .register-box button {
      width: 100%;
      padding: 12px;
      background: #e63946;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-box button:hover {
      background: #e63946;
    }

    .message {
      text-align: center;
      margin-top: 10px;
      color: green;
    }

    .error {
      text-align: center;
      margin-top: 10px;
      color: red;
    }
  </style>
</head>
<body>

<div class="register-box">
  <h2>Register</h2>

  <?php if ($success): ?>
    <div class="message"><?= $success ?></div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <form action="" method="POST">
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Daftar</button>
  </form>
</div>

</body>
</html>
