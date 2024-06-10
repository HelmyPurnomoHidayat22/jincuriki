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
    }
    .navbar-brand img {
      width: 50px;
      height: auto;
    }
    .navbar {
      color: whitesmoke;
    }
    .jumbotron {
      background: url('background.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 100px 25px;
      position: relative;
      z-index: 1;
    }
    .jumbotron img {
      width: 170px;
      height: auto;
      margin-bottom: 20px;
    }
    .btn-primary.nav-link {
      background-color: darkgoldenrodgrey;
      border-color: sandybrown;
      color: whitesmoke;
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
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="logo"> SMA Jincuriki
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary nav-link" href="visi.php">Visi</a>
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
                        <a class="btn btn-secondary nav-link" href="loginadmin.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-secondary nav-link" onclick="toggleDarkMode()">Mode Gelap</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <img src="logo.png" alt="Logo">
        <h1>SMA JINCURIKI</h1>
        <p>Jl.Konoha no.10</p>
        <p>Telp: 085713833954 | Email: helmypurnomo234@gmail.com</p>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Selamat Datang di SMA JINCURIKI</h2>
                <p>Website resmi SMA Jincuriki menyediakan berbagai informasi terkini mengenai kegiatan sekolah, visi dan misi, Informasi, Kontak, PPDB, dan lainnya.</p>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start mt-5 footer">
        <div class="text-center p-3">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
