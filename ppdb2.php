<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran PPDB</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 50px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        #foto {
            background-color: red;
            padding: 5px;
        }
        .marquee {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulir Pendaftaran PPDB</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'jincuriki';
            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $alamat = $_POST['alamat'];
            $asal_sekolah = $_POST['asal_sekolah'];
            $nama_ortu = $_POST['nama_ortu'];
            $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
            $telepon = $_POST['telepon'];
            $nilai_rapot = $_POST['nilai_rapot'];

            // Periksa apakah ID dan NISN adalah angka
            if (!ctype_digit($id) || !ctype_digit($nisn)) {
                header("Location: ppdb2.php?status=error");
                exit();
            }

            $target_dir = "uploads/";
            $target_file = $target_dir . uniqid() . basename($_FILES["foto"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["foto"]["size"] > 5000000 || !in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                header("Location: ppdb2.php?status=error");
                exit();
            }

            $stmt = $conn->prepare("INSERT INTO pendaftaran (id, nama, nisn, alamat, asal_sekolah, nama_ortu, pekerjaan_ortu, telepon, nilai_rapot, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssssss", $id, $nama, $nisn, $alamat, $asal_sekolah, $nama_ortu, $pekerjaan_ortu, $telepon, $nilai_rapot, $target_file);

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file) && $stmt->execute()) {
                header("Location: fiksppdb2.php?id=$id&status=success");
                exit();
            } else {
                header("Location: ppdb2.php?status=error");
                exit();
            }
        }
        ?>
        <form action="ppdb2.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">NIS</label>
                <input type="number" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua:</label>
                <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ortu">Pekerjaan Orang Tua:</label>
                <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telepon">No Telepon:</label>
                <input type="text" id="telepon" name="telepon" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_rapot">Nilai Rapot:</label>
                <input type="text" id="nilai_rapot" name="nilai_rapot" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto (Background Merah):</label>
                <input type="file" id="foto" name="foto" class="form-control-file" required accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">DAFTAR</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
        <div class="marquee">
            <marquee>Pastikan data yang anda masukkan sudah benar!</marquee>
        </div>
    </div>
</body>
</html>
