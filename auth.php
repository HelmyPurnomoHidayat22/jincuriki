<?php

include 'config.php';
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['action'] == 'register') {
    // Handle registration
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
      $message = "Pendaftaran berhasil, silakan login.";
    } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
    }
  } elseif ($_POST['action'] == 'login') {
    // Handle login
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: ppdb2.php");
        exit();
      } else {
        $message = "Password salah";
      }
    } else {
      $message = "Username tidak ditemukan";
    }
  }
}

// Menutup koneksi setelah selesai digunakan
$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KEAMANAN</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="logo-container">
    <img src="logo.png" alt="Logo" class="logo">
  </div>
  <div class="container">
    <h2>DAFTARKAN DIRI ANDA</h2>
    <?php if ($message != ""): ?>
      <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="form-section">
      <form method="POST" action="auth.php">
        <label for="action">PILIH</label>
        <select name="action" id="action" class="form-select" required>
          <option value="login">MASUK</option>
          <option value="register">DAFTAR</option>
        </select>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <input type="checkbox" onclick="togglePassword()"> Show Password

        <div class="button-section">
          <button type="submit" class="btn btn-dark btn-square-md">Submit</button>
          <br>
          <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    function togglePassword() {
      var passwordField = document.getElementById("password");
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>
</body>
