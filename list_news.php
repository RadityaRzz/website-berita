<?php
session_start();
include 'db.php';

// ngecek user udah login apa belum
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// ambil semua berita dari database, urut dari yang terbaru
$result = mysqli_query($conn, "SELECT * FROM news ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Berita Pengguna | StepenNEWS</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  body {
      font-family: 'Poppins', sans-serif;
      background: #f4f7ff;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
  }

  header {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 16px 0;
      font-size: 20px;
      font-weight: 600;
      letter-spacing: 0.5px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.15);
  }

  h2.judul-section {
      text-align: center;
      color: #007bff;
      font-size: 28px;
      font-weight: 700;
      margin: 35px 0 25px;
      text-shadow: 0 1px 2px rgba(0,0,0,0.1);
  }

  .scroll-container {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
  }

  .container {
      max-width: 100%;
      margin: 0 auto 60px;
      padding: 20px 60px;
      display: flex;
      gap: 25px;
      overflow-x: auto;
      scroll-behavior: smooth;      
  }

  /* scrollbar */
  .container::-webkit-scrollbar {
      height: 10px;
  }
  .container::-webkit-scrollbar-thumb {
      background: #007bff;
      border-radius: 6px;
  }
  .container::-webkit-scrollbar-track {
      background: #e6edff;
  }

  /* tombol scroll kiri kanan */
  .scroll-btn {
      background: #007bff;
      color: white;
      border: none;
      padding: 14px 16px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 22px;
      transition: 0.3s;
      box-shadow: 0 3px 8px rgba(0,0,0,0.15);
      position: absolute;
      z-index: 10;
  }
  .scroll-btn:hover {
      background: #005dc0;
  }
  .scroll-left { left: 15px; }
  .scroll-right { right: 15px; }

  /* gaya kartu berita */
  .card {
      min-width: 520px;
      max-width: 520px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 14px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: all 0.3s ease;
      display: flex;
      flex-shrink: 0;
      cursor: pointer;
      backdrop-filter: blur(5px);
  }

  .card:hover {
      transform: translateY(-6px) scale(1.02);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  }

  .card img {
      width: 45%;
      height: auto;
      object-fit: cover;
      border-right: 2px solid #007bff20;
  }

  .card-content {
      padding: 18px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex: 1;
  }

  .card-content .kategori {
      font-size: 12px;
      background: #e8f1ff;
      color: #0056b3;
      padding: 4px 8px;
      border-radius: 6px;
      display: inline-block;
      margin-bottom: 6px;
      font-weight: 600;
      text-transform: uppercase;
  }

  .card-content h3 {
      font-size: 18px;
      color: #007bff;
      margin-bottom: 10px;
      line-height: 1.4em;
  }

  .card-content p {
      font-size: 14px;
      color: #333;
      line-height: 1.5em;
      flex-grow: 1;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 8px;
  }

  .card-footer {
      font-size: 12px;
      color: #666;
      padding-top: 10px;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
  }

  .back-btn {
      background: #007bff;
      color: white;
      text-decoration: none;
      padding: 10px 16px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
      position: fixed;
      top: 22px;
      left: 22px;
      font-size: 14px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  }

  .back-btn:hover {
      background: #005dc0;
  }

  /* biar rapi di HP */
  @media (max-width: 768px) {
      .card { min-width: 420px; max-width: 420px; }
      h2.judul-section { font-size: 24px; }
  }

  @media (max-width: 500px) {
      .card {
          flex-direction: column;
          min-width: 320px;
          max-width: 320px;
      }
      .card img {
          width: 100%;
          height: 180px;
          border-right: none;
          border-bottom: 2px solid #007bff20;
      }
  }
</style>
</head>
<body>

<header>Portal Berita StepenNEWS</header>

<a href="home.php" class="back-btn">← Balik ke Beranda</a>

<h2 class="judul-section">📰 Berita Buatan Pengguna</h2>

<div class="scroll-container">
  <button class="scroll-btn scroll-left">⟨</button>

  <div class="container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card">
        <img src="<?= !empty($row['gambar']) ? htmlspecialchars($row['gambar']) : 'https://via.placeholder.com/400x250?text=No+Image'; ?>" alt="Gambar Berita">
        <div class="card-content">
          <div class="kategori"><?= htmlspecialchars($row['kategori']); ?></div>
          <h3><?= htmlspecialchars($row['judul']); ?></h3>
          <p><?= nl2br(htmlspecialchars(substr($row['isi'], 0, 180))) . '...'; ?></p>
          <div class="card-footer">
            <span>✍️ <?= htmlspecialchars($row['penulis']); ?></span>
            <span><?= date("d M Y", strtotime($row['tanggal'])); ?></span>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <button class="scroll-btn scroll-right">⟩</button>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const container = document.querySelector('.container');
      const btnLeft = document.querySelector('.scroll-left');
      const btnRight = document.querySelector('.scroll-right');

      // auto scroll dikit biar ga statis pas buka halaman
      if (container) {
          container.scrollBy({ left: 200, behavior: 'smooth' });
          setTimeout(() => container.scrollBy({ left: -100, behavior: 'smooth' }), 1000);
      }

      // fungsi scroll kiri kanan
      btnLeft.addEventListener('click', () => {
          container.scrollBy({ left: -450, behavior: 'smooth' });
      });
      btnRight.addEventListener('click', () => {
          container.scrollBy({ left: 450, behavior: 'smooth' });
      });
  });
</script>

</body>
</html>
