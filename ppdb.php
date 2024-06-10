<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informasi PPDB</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  /* CSS Styling */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('background.jpg'); /* Menambahkan background image */
    background-size: cover; /* Menyesuaikan background image agar menutupi seluruh layar */
    background-repeat: no-repeat; /* Mencegah background image berulang */
    background-position: center; /* Memposisikan background image di tengah */
    background-color: #f2f2f2; /* Warna latar belakang default */
  }
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #343a40; /* Warna gelap untuk form */
    color: #ffffff; /* Warna tulisan putih */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
  }
  h1, h2, h3 {
    color: #ffffff; /* Warna tulisan putih */
  }
  .btn-custom {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
  }
  .btn-custom:hover {
    background-color: #0056b3;
  }
  .back-link {
    display: block;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;
  }
  .back-link:hover {
    text-decoration: underline;
  }
  /* Animasi api */
  .flame {
    position: absolute;
    width: 30px;
    height: 30px;
    background: url('flane.png') no-repeat center center / contain;
    animation: flameMove 3s ease-in-out infinite;
    pointer-events: none;
  }
  @keyframes flameMove {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(100%); }
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo" width="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">SMA JINCURIKI</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">
  <div class="flame" style="top: -30px; left: -30px;"></div>
  <div class="flame" style="top: -30px; right: -30px;"></div>
  <div class="flame" style="bottom: -30px; right: -30px;"></div>
  <div class="flame" style="bottom: -30px; left: -30px;"></div>

  <h1>Informasi PPDB</h1>
  <p>Selamat datang di Halaman Informasi PPDB (Penerimaan Peserta Didik Baru).</p>
  <h2>Tanggal Penting</h2>
  <ul>
    <li>Periode Pendaftaran: 1 Juni - 30 Juni 2024</li>
    <li>Ujian Masuk: 15 Juli - 20 Juli 2024</li>
    <li>Pengumuman Hasil: 5 Agustus 2024</li>
  </ul>
  <h2>Persyaratan</h2>
  <ul>
    <li>Fotokopi akta kelahiran</li>
    <li>Nilai raport</li>
    <li>Foto berukuran 3*4</li>
  </ul>
  <h2>Cara Mendaftar</h2>
  <ol>
    <li>Kunjungi situs web resmi sekolah.</li>
    <li>Isi formulir pendaftaran online.</li>
    <li>Unggah dokumen yang diperlukan.</li>
    <li>Lakukan pembayaran biaya pendaftaran.</li>
    <li>Hadiri ujian masuk pada tanggal yang ditentukan.</li>
  </ol>
  <a href="auth.php" class="btn btn-primary btn-custom">Daftar Sekarang</a>
  <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
