<?php
include 'db.php';
session_start();
$message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ambil user berdasarkan email
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        // simpan session
        $_SESSION['user'] = $user['email'];
        $_SESSION['role'] = $user['role']; // tambahkan role ke session

        // jika role admin → masuk dashboard admin
        if ($user['role'] === 'admin') {
            echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Selamat datang Admin!',
                        text: 'Login sebagai administrator berhasil.',
                        icon: 'success',
                        confirmButtonText: 'Masuk Dashboard Admin',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'admin/dashboard.php';
                        }
                    });
                </script>
            </body>
            </html>
            ";
            exit();
        }

        // jika role user biasa → masuk sweetalert 2 tombol
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Selamat datang, $email',
                    icon: 'success',
                    showDenyButton: true,
                    confirmButtonText: 'Lanjut ke Beranda',
                    denyButtonText: 'Buat Berita Sendiri',
                    confirmButtonColor: '#3085d6',
                    denyButtonColor: '#00c851',
                    backdrop: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'home.php';
                    } else if (result.isDenied) {
                        window.location.href = 'create_news.php';
                    }
                });
            </script>
        </body>
        </html>
        ";
        exit();
    } else {
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Login Gagal!',
                    text: 'Email atau password salah. Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33',
                    backdrop: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            </script>
        </body>
        </html>
        ";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | StepenNEWS</title>
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <h2>LOGIN</h2>
    <p>StepenNEWS</p>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</div>
</body>
</html>
