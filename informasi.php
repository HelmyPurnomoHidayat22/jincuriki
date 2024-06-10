<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMA Jincuriki</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('background.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #000; /* Change text color to black */
    }
    .navbar-brand img {
      width: 50px;
      height: auto;
    }
    .navbar {
      background-color: #333; /* Dark gray background for navbar */
    }
    .jumbotron {
      background: rgba(0, 0, 0, 0.8); /* Dark gray background with some transparency */
      color: #000; /* Change text color to black */
      text-align: center;
      padding: 100px 25px;
      position: relative;
      z-index: 1;
    }
    .jumbotron img {
      width: 150px; /* Increased logo size */
      height: auto;
      margin-bottom: 20px;
    }
    .btn-primary.nav-link {
      background-color: dark;
      border-color: sandybrown;
      color: #fff; /* Change text color to white */
      padding: .5rem 1rem;
      border-radius: .25rem;
      text-decoration: none;
      transition: all .2s ease-in-out;
    }
    .btn-primary.nav-link:hover {
      background-color: #0069d9;
      border-color: #0069d9;
    }
    /* Dark mode styles */
    body.dark-mode {
      background-color: #000;
      color: #e0e0e0;
    }
    .navbar.dark-mode {
      background-color: #333;
    }
    .navbar.dark-mode .navbar-brand,
    .navbar.dark-mode .nav-link,
    .jumbotron.dark-mode h1,
    .jumbotron.dark-mode p,
    .footer.dark-mode {
      color: #fff;
    }
    .jumbotron.dark-mode {
      filter: brightness(0.5);
    }
    .footer.dark-mode {
      background-color: #333;
      color: #e0e0e0;
    }
    .vision-mission-section {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background: white;
      padding: 50px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }
    .vision-mission {
      flex: 1;
      padding: 20px;
    }
    .vision-mission h2 {
      color: #007bff; /* Change text color to blue */
      border-bottom: 2px solid #007bff;
      display: inline-block;
      margin-bottom: 15px;
    }
    .vision-mission p {
      margin-bottom: 15px;
    }
    .gold-text {
      color: gold; /* Change text color to gold */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="logo">
      SMA Jincuriki
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="visi.php">Visi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="kontak.php">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="ppdb.php">PPDB</a>
        </li>
        <li class="nav-item">
          <button class="btn btn-secondary nav-link" onclick="toggleDarkMode()">Dark Mode</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="content-container">
          <img src="logo.png" alt="Logo">
          <div>
            <h1 class="gold-text">INFORMASI</h1> <!-- Added gold-text class -->
            <p class="gold-text">Di sini, Anda akan menemukan segala sesuatu yang perlu Anda ketahui tentang kegiatan sekolah, pengumuman penting, jadwal pelajaran, dan berbagai program unggulan yang kami tawarkan. Kami berkomitmen untuk menyediakan informasi terbaru dan akurat agar siswa, orang tua, dan seluruh komunitas sekolah dapat selalu terhubung dengan perkembangan terbaru di 
              SMA JINCURIKI. Jangan ragu untuk menjelajahi laman ini dan temukan berbagai informasi bermanfaat yang telah kami siapkan khusus untuk Anda..</p>
            <a href="#" class="btn btn-primary">See it in action!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h2 class="gold-text">Selamat Datang di SMA Jincuriki</h2>
      <p class="gold-text">Terima kasih telah mengunjungi, dan mari bersama-sama menciptakan lingkungan belajar yang inspiratif dan penuh prestasi!Terima kasih telah mengunjungi, 
        dan mari bersama-sama menciptakan lingkungan belajar yang inspiratif dan penuh prestasi!</p>
    </div>
  </div>
</div>

<footer class="footer text-center">
  <div class="container">
    <!-- Footer content -->
    <p>&copy; 2024 SMA Jincuriki. All rights reserved.</p>
  </div>
</footer>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    document.querySelector('.navbar').classList.toggle('dark-mode');
    document.querySelector('.jumbotron').classList.toggle('dark-mode');
    document.querySelector('.footer').classList.toggle('dark-mode');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
