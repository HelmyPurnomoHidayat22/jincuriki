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
      background-color: #333;
      color: #fff;
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
      width: 300px;
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
    .contact-section {
      background-color: #444;
      padding: 50px 0;
      color: #e0e0e0;
    }
    .contact-form input, .contact-form textarea {
      background-color: #555;
      border: none;
      color: #fff;
      margin-bottom: 10px;
    }
    .contact-form input::placeholder, .contact-form textarea::placeholder {
      color: #ccc;
    }
    .contact-info {
      padding: 20px;
      background-color: #555;
      border-radius: 10px;
      color: #e0e0e0;
    }
    .contact-info img {
      width: 30px;
      margin-right: 10px;
    }
    .footer {
      background-color: #222;
      color: #e0e0e0;
      padding: 20px 0;
    }
    .footer a {
      color: #00f;
      text-decoration: none;
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
          <a class="btn btn-primary nav-link" href="visi.php">Visi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="informasi.php">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary nav-link" href="ppdb.php">PPDB</a>
        </li>
        <li class="nav-item">
          <button class="btn btn-primary nav-link" onclick="toggleDarkMode()">Dark Mode</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <img src="logo.png" alt="Logo">
  <h1>KONTAK</h1>
  <p>ANDA BISA MENGHUBUNGI KAMI LEWAT LAYANAN DI BAWAH INI</p>
  <p>SMA JINCURIKI</p>
</div>

<div class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Contact Us</h2>
        <form class="contact-form" onsubmit="sendToDiscord(event)">
          <input type="text" class="form-control" placeholder="Name" id="name" required>
          <input type="email" class="form-control" placeholder="E-mail" id="email" required>
          <input type="tel" class="form-control" placeholder="No telepon" id="phone" required>
          <textarea class="form-control" rows="5" placeholder="Your Message" id="message" required></textarea>
          <button type="submit" class="btn btn-primary btn-block">SEND</button>
        </form>
      </div>
      <div class="col-md-6 contact-info">
        <h2>ANDA BISA MENGHUBUNGI KAMI:</h2>
        <p><img src="w.png" alt="WhatsApp" style="width: 30px; margin-right: 10px;"><a href="https://wa.me/085713833954">whatsapp.com</a></p>
        <p><img src="instagram.jpeg" alt="Instagram" style="width: 30px; margin-right: 10px;"><a href="https://www.instagram.com/iam_myph/">instagram.com</a></p>
        <p><br>Telp: 085713833954 | Email: helmypurnomo234@gmail.com</p>
      </div>
    </div>
  </div>
</div>

<footer class="text-center footer">
  <div class="container">
    <p>&copy; 2024 SMA Jincuriki. All Rights Reserved.</p>
  </div>
</footer>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    document.querySelector('.navbar').classList.toggle('dark-mode');
    document.querySelector('.jumbotron').classList.toggle('dark-mode');
    document.querySelector('.footer').classList.toggle('dark-mode');
  }

  function sendToDiscord(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    const webhookURL = 'https://www.instagram.com/iam_myph/'; // Replace with your Discord webhook URL

    const payload = {
      content: `New Contact Form Submission\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nMessage: ${message}`
    };

    fetch(webhookURL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    })
    .then(response => {
      if (response.ok) {
        alert('Your message has been sent successfully!');
        document.querySelector('.contact-form').reset();
      } else {
        alert('There was an error sending your message.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('There was an error sending your message.');
    });
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
