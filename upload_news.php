<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
session_start();

// Cek user login dulu
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Kamu harus login dulu sebelum upload berita!');
        window.location.href = 'login.php';
    </script>";
    exit();
}

// Kalau tombol upload diklik
if (isset($_POST['upload'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $penulis = $_SESSION['user'];

    // Siapin variabel gambar
    $gambar = "";
    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $gambar_name = time() . "_" . basename($_FILES["gambar"]["name"]);
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $gambar_path = $target_dir . $gambar_name;

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $gambar = $gambar_path;
        }
    }

    // Simpan ke database
    $sql = "INSERT INTO news (judul, isi, kategori, komentar, gambar, penulis)
            VALUES ('$judul', '$isi', '$kategori', '$komentar', '$gambar', '$penulis')";

    $success = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Upload Berita | StepenNEWS</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if (isset($success) && $success): ?>
<!-- Kalau berhasil -->
<script>
Swal.fire({
    title: 'Berita Berhasil Diunggah 🎉',
    text: 'Kabar kamu udah masuk ke portal StepenNEWS!',
    icon: 'success',
    showCancelButton: true,
    confirmButtonText: '🏠 Lihat di Beranda',
    cancelButtonText: '📝 Tambah Berita Lagi',
    reverseButtons: true,
    confirmButtonColor: '#007bff',
    cancelButtonColor: '#28a745',
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'home.php';
    } else {
        window.location.href = 'create_news.php';
    }
});
</script>

<?php elseif (isset($success)): ?>
<!-- Kalau gagal -->
<script>
Swal.fire({
    title: 'Gagal Upload 😕',
    text: 'Kayaknya ada yang salah waktu nyimpan berita.',
    icon: 'error',
    confirmButtonText: 'Coba Lagi',
    confirmButtonColor: '#007bff'
}).then(() => {
    window.location.href = 'create_news.php';
});
</script>

<?php else: ?>
<!-- Kalau file ini dibuka langsung -->
<script>
Swal.fire({
    title: 'Belum Ada Data 😅',
    text: 'Form upload belum dikirim, balik dulu ke halaman buat berita ya.',
    icon: 'info',
    confirmButtonText: 'Oke, Balik',
}).then(() => {
    window.location.href = 'create_news.php';
});
</script>
<?php endif; ?>

</body>
</html>
