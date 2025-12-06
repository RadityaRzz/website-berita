<?php
include 'db.php';
$message = "";

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Cek apakah password sama
    if ($password !== $confirm) {
        $message = "Password tidak sama!";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        // Cek email
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $message = "Email sudah digunakan!";
        } else {

            // 🔥 SIMPAN ROLE DEFAULT USER
            mysqli_query($conn, 
                "INSERT INTO users (email, password, role) 
                 VALUES ('$email','$passwordHashed','user')"
            );

            $message = "Registrasi berhasil! Silakan login.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi | StepenNEWS</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>REGISTRASI</h2>
    <p>StepenNEWS</p>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <input type="password" name="confirm" placeholder="Masukkan Ulang Password" required>
        <button type="submit" name="register">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="login.php">Login</a></p>
    <p class="msg"><?= $message ?></p>
</div>
</body>
</html>
