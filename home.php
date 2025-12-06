<?php
session_start();
$isLoggedIn = isset($_SESSION['user_email']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stepen NEWS</title>
  <link rel="stylesheet" href="home.css">
  <style>
    .btn-berita-lengkap {
      display: inline-block;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 600;
      margin: 25px auto 0;
      transition: 0.3s;
      text-align: center;
    }
    .btn-berita-lengkap:hover {
      background: #005dc0;
    }

    /* Tambahan untuk video di reels */
    .reel-item video {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">Stepen <span>NEWS</span></div>
    <nav>
      <a href="#">Home</a>
      <a href="tentang.php">Tentang</a>
      <a href="#">Berita Hot🔥</a>
      <a href="#">Edukasi</a>
      <a href="#">Teknologi</a>
      <a href="#">Nusantara</a>
      <a href="#">Olahraga</a>
    </nav>
    <div class="nav-btns">
      <input type="text" placeholder="Cari...">
      <a href="register.php"><button class="btn-daftar">DAFTAR</button></a>
      <a href="login.php"><button class="btn-masuk">MASUK</button></a>
    </div>
  </header>

  <section class="banner">
    <div class="banner-img">
      <img src="mobil berita.jpg" alt="Berita utama">
      <div class="banner-text">
        <h3>NEWS</h3>
        <h4>Mitsubishi Destinator</h4>
      </div>
    </div>
  </section>

  <!-- ==================== REELS (PAKAI VIDEO) ==================== -->
  <section class="reels">
    <div class="reels-head">
      <h2>Reels</h2>
      <a href="#" class="btn-selengkapnya">Selengkapnya</a>
    </div>

    <div class="reels-container">
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
      <div class="reel-item"><video src="video reels.mp4" controls muted loop></video></div>
    </div>
  </section>

  <!-- ==================== BERITA ==================== -->
  <section class="berita">
    <div class="berita-terkini">
      <h2>Berita Terkini</h2>
      <div class="grid-terkini">
        <div class="card">
          <img src="berita terkini1.jpeg" alt="Berita 1">
          <p>4 Gubernur Riau Terjerat Korupsi, Warmendagri: Harus Evaluasi Sistem Pemilihan</p>
        </div>
        <div class="card">
          <img src="berita terkini.jpeg" alt="Berita 2">
          <p>Adam Alis Gak Nyangka Jadi Pahlawan Persib Kalahkan Selangor</p>
        </div>
        <div class="card">
          <img src="berita terkini3.jpeg" alt="Berita 3">
          <p>Prabowo Undang Jokowi Ke Peresmian Pabrik Lotte, Tapi Tak Hadir</p>
        </div>
        <div class="card">
          <img src="berita terkini4.jpeg" alt="Berita 4">
          <p>Bhayangkara Vs Bali: Munster Puji Kualitas Serdadu Tridatu</p>
        </div>
      </div>
    </div>

    <div class="berita-populer">
      <h2>Berita Populer</h2>
      <ol class="populer-list">
        <li>
          <div class="populer-item">
            <div class="nomor">1</div>
            <div class="populer-info">
              <span class="kategori">Nasional</span>
              <p>Detik-detik Gubernur Riau Ditangkap KPK di Kafe Diungkap Wakilnya</p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">2</div>
            <div class="populer-info">
              <span class="kategori">Nasional</span>
              <p>Ini Ucapan Jokowi Yang Bikin Kepala Daerah Malu </p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">3</div>
            <div class="populer-info">
              <span class="kategori">Nusantara</span>
              <p>Festival Budaya Daerah Menarik Banyak Wisatawan</p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">4</div>
            <div class="populer-info">
              <span class="kategori">Olahraga</span>
              <p>Ronaldo Ungkap Alasan Tak Hadiri Pemakaman Diogo Jota</p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">5</div>
            <div class="populer-info">
              <span class="kategori">Nasional</span>
              <p>Biang Kerok Pakaian Bekas Impor Banjiri RI Terbongkar</p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">6</div>
            <div class="populer-info">
              <span class="kategori">Properti</span>
              <p>Desain Rumah Minimalis Yang Sedang Populer di Tahun Ini</p>
            </div>
          </div>
        </li>
        <li>
          <div class="populer-item">
            <div class="nomor">7</div>
            <div class="populer-info">
              <span class="kategori">Edukasi</span>
              <p>RI Penentu Masa Depan Ekologi Regional dan Global</p>
            </div>
          </div>
        </li>
      </ol>
    </div>

    <div style="text-align:center; margin-top:25px;">
      <a href="list_news.php" class="btn-berita-lengkap">Lihat Berita Pengguna →</a>
    </div>
  </section>

  <!-- ==================== NASIONAL ==================== -->
  <section class="nasional">
    <div class="reels-head">
      <h2>Berita Nasional</h2>
    </div>

    <div class="nasional-container">
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 1">
        <p>Pemerintah umumkan kebijakan baru energi hijau.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 2">
        <p>BNPB siaga darurat hadapi cuaca ekstrem di Sumatera.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 3">
        <p>Presiden resmikan proyek strategis nasional di Kalimantan.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 4">
        <p>Polri siapkan operasi pengamanan jelang akhir tahun.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 5">
        <p>Kementerian Kesehatan dorong vaksinasi massal di desa.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 6">
        <p>Ekonomi Indonesia tumbuh positif di kuartal keempat.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 7">
        <p>BNN tangkap jaringan besar narkotika lintas provinsi.</p>
      </div>
      <div class="nasional-item">
        <img src="reels.jpg" alt="Nasional 8">
        <p>Menkominfo tindak tegas situs judi online ilegal.</p>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-left">
      <p>📍 Jl. Bhakti Suci No.100, Cimpaeun, Kec. Tapos, Kota Depok, Jawa Barat</p>
      <p>📧 stepennews@gmail.com</p>
    </div>

    <div class="footer-mid">
      <h3>Seputar Stepen NEWS</h3>
      <a href="staff.html">Tentang Kami</a>
      <a href="#">Sitemap</a>
    </div>

    <div class="footer-right">
      <h1>Stepen <span>NEWS</span></h1>
    </div>
  </footer>

  <div class="copyright">
    © 2025 Portal Stepen NEWS
  </div>
  
</body>
</html>
