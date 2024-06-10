<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMA JINCURIKI</title>
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
      background-color: darkgoldenrodgrey;
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

    /* Vision and Mission styles */
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
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
          <a class="nav-link" href="#">Visi dan Misi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="informasi.php">Informasi</a>
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
  <img src="logo.png" alt="Logo">
  <h1 style="color: #007bff;">VISI & MISI</h1> <!-- Change text color to blue -->
</div>

<div class="container">
  <div class="vision-mission-section">
    <div class="vision-mission">
      <h2>Visi</h2>
      <p>Visi kami adalah menciptakan generasi muda yang mandiri, berintegritas, dan bertanggung jawab, siap menghadapi tantangan global dalam semangat persatuan dan kesatuan.</p>
      <p><strong>Pendidikan Berkualitas</strong><br>Kami menyediakan lingkungan belajar yang kondusif dan fasilitas yang memadai untuk mendukung pencapaian akademis
      Guru-guru kami terdorong untuk menggunakan metode pengajaran yang inovatif dan kreatif, sehingga setiap siswa dapat mencapai potensi akademisnya secara efektif.</p>
    </div>
    <div class="vision-mission">
      <h2>Misi</h2>
      <p>SMA JINCURIKI, kami berkomitmen untuk menjadi pusat pendidikan yang berorientasi pada pembentukan karakter yang kuat dan berkualitas, selaras dengan nilai-nilai luhur para hokage terdahulu.</p>
      <p><strong>Kemandirian dan Kreativitas</strong><br>Kami mengembangkan kemandirian dan kreativitas siswa dengan memberikan ruang bagi inovasi, eksperimen, dan pemecahan masalah.
      Dengan mendorong ekspresi diri yang positif dan mendukung minat dan bakat siswa.</p>
    </div>
  </div>
</div>

<footer class="bg-light text-center text-lg-start mt-5 footer">
  <div class="text"> <!-- Ensure this div is closed properly -->
    <!-- Footer content -->
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

</body>
</html>
