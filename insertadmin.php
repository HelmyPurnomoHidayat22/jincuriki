<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'jincuriki';  // Nama database Anda
$username = 'root';     // Username database Anda
$password = '';         // Password database Anda

try {
    // Membuat koneksi ke database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Mendapatkan data dari form
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $alamat = $_POST['alamat'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $nama_ortu = $_POST['nama_ortu'];
        $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
        $nilai_rapot = $_POST['nilai_rapot'];
        $foto = $_POST['foto'];  // Asumsi ini adalah URL foto yang sudah diupload

        // Query untuk memasukkan data baru
        $sql = "INSERT INTO pendaftaran (nama, nisn, alamat, asal_sekolah, nama_ortu, pekerjaan_ortu, nilai_rapot, foto)
                VALUES (:nama, :nisn, :alamat, :asal_sekolah, :nama_ortu, :pekerjaan_ortu, :nilai_rapot, :foto)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $nama,
            ':nisn' => $nisn,
            ':alamat' => $alamat,
            ':asal_sekolah' => $asal_sekolah,
            ':nama_ortu' => $nama_ortu,
            ':pekerjaan_ortu' => $pekerjaan_ortu,
            ':nilai_rapot' => $nilai_rapot,
            ':foto' => $foto
        ]);

        echo "Data berhasil ditambahkan!";
    }
} catch (PDOException $e) {
    echo "Koneksi atau query bermasalah: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pendaftar PPDB</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tambah Data Pendaftar PPDB</h1>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" class="form-control" id="nisn" name="nisn" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
            </div>
            <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua:</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ortu">Pekerjaan Orang Tua:</label>
                <input type="text" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" required>
            </div>
            <div class="form-group">
                <label for="nilai_rapot">Nilai Rapot:</label>
                <input type="text" class="form-control" id="nilai_rapot" name="nilai_rapot" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto (URL):</label>
                <input type="text" class="form-control" id="foto" name="foto" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
        <a href="index.php" class="btn btn-secondary">&larr; Kembali ke Beranda</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
