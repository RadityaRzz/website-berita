<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buat Berita | StepenNEWS</title>
<link rel="stylesheet" href="style.css">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to bottom, #a3d4ff, #ffffff);
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Card kecil di tengah */
    .card {
        background: #ffffff;
        width: 400px;
        height: 420px;
        border-radius: 16px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        text-align: center;
        padding: 15px 10px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 18px;
    }

    .card-header p {
        margin: 5px 0 0;
        font-size: 13px;
    }

    .card-body {
        flex: 1;
        padding: 15px 20px;
        overflow-y: auto;
    }

    label {
        display: block;
        font-weight: 600;
        font-size: 13px;
        margin-top: 8px;
    }

    input[type="text"],
    select,
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 13px;
        margin-top: 6px;
        background-color: #f9fcff;
    }

    textarea {
        resize: none;
        height: 70px;
    }

    .card-footer {
        padding: 14px 18px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 10px;
    }

    button {
        flex: 1;
        padding: 10px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-publish {
        background-color: #007bff;
        color: white;
    }

    .btn-publish:hover {
        background-color: #005dc0;
    }

    .btn-cancel {
        background-color: #eaf1ff;
        color: #007bff;
    }

    .btn-cancel:hover {
        background-color: #d5e6ff;
    }

    @media (max-width: 480px) {
        .card {
            width: 90%;
            height: auto;
            max-height: 90vh;
        }
    }
</style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h2>Buat Berita Baru</h2>
        <p>Selamat datang, <?= htmlspecialchars($_SESSION['user']); ?> ✍️</p>
    </div>

    <div class="card-body">
        <form id="newsForm" action="upload_news.php" method="POST" enctype="multipart/form-data">
            <label>Judul Berita</label>
            <input type="text" name="judul" placeholder="Masukkan judul..." required>

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Nusantara">Nusantara</option>
                <option value="Edukasi">Edukasi</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Teknologi">Teknologi</option>
            </select>

            <label>Isi Berita</label>
            <textarea name="isi" placeholder="Tulis isi berita..." required></textarea>

            <label>Komentar</label>
            <textarea name="komentar" placeholder="Tulis komentar singkat (opsional)..."></textarea>

            <label>Upload Gambar (opsional)</label>
            <input type="file" name="gambar" accept="image/*">
    </div>

    <div class="card-footer">
        <button type="button" class="btn-cancel" onclick="window.location.href='home.php'">Batal</button>
        <!-- tombol ini penting! -->
        <button type="submit" name="upload" class="btn-publish">Publikasikan</button>
    </div>
        </form>
</div>

</body>
</html>
