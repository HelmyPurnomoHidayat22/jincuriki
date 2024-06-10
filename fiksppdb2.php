<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastikan Data yang Anda Isi Telah Benar</title>
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
        <h1>Pastikan Data yang Anda Isi Telah Benar</h1>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'jincuriki';
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM pendaftaran WHERE id = $id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID tidak ditemukan.</div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Parameter ID tidak valid.</div>";
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $alamat = $_POST['alamat'];
            $asal_sekolah = $_POST['asal_sekolah'];
            $nama_ortu = $_POST['nama_ortu'];
            $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
            $nilai_rapot = $_POST['nilai_rapot'];
            $telepon = $_POST['telepon'];

            if ($_FILES["foto"]["name"]) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["foto"]["tmp_name"]);
                if ($check !== false) {
                    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                        if ($_FILES["foto"]["size"] > 5000000) {
                            echo "<div class='alert alert-danger' role='alert'>Maaf, file Anda terlalu besar.</div>";
                            exit();
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.</div>";
                        exit();
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>File bukan gambar.</div>";
                    exit();
                }

                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE pendaftaran SET 
                            nama='$nama', 
                            nisn='$nisn', 
                            alamat='$alamat', 
                            asal_sekolah='$asal_sekolah', 
                            nama_ortu='$nama_ortu', 
                            pekerjaan_ortu='$pekerjaan_ortu', 
                            nilai_rapot='$nilai_rapot', 
                            telepon='$telepon', 
                            foto='$target_file' 
                            WHERE id=$id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success' role='alert'>Data berhasil diperbarui.</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Kesalahan saat memperbarui data: " . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Maaf, terjadi kesalahan saat mengunggah berkas Anda.</div>";
                }
            } else {
                $sql = "UPDATE pendaftaran SET 
                        nama='$nama', 
                        nisn='$nisn', 
                        alamat='$alamat', 
                        asal_sekolah='$asal_sekolah', 
                        nama_ortu='$nama_ortu', 
                        pekerjaan_ortu='$pekerjaan_ortu', 
                        nilai_rapot='$nilai_rapot', 
                        telepon='$telepon' 
                        WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>Data berhasil diperbarui.</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Kesalahan saat memperbarui data: " . $conn->error . "</div>";
                }
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">NIS</label>
                <input type="text" id="id" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" class="form-control" value="<?php echo $row['nisn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required><?php echo $row['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" value="<?php echo $row['asal_sekolah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua:</label>
                <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" value="<?php echo $row['nama_ortu']; ?>" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ortu">Pekerjaan Orang Tua:</label>
                <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" class="form-control" value="<?php echo $row['pekerjaan_ortu']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telepon">No Telepon Orang Tua:</label>
                <input type="text" id="telepon" name="telepon" class="form-control" value="<?php echo $row['telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nilai_rapot">Nilai Rapot:</label>
                <input type="text" id="nilai_rapot" name="nilai_rapot" class="form-control" value="<?php echo $row['nilai_rapot']; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto tidak boleh lebih dari 100kb (upload ulang foto background merah ukuran 3*4):</label>
                <input type="file" id="foto" name="foto" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
        </form>
        <a href="print.php?id=<?php echo $id; ?>" class="btn btn-success">Cetak Data</a>
        <a href="index.php" class="btn btn-secondary">Kembali ke beranda</a>
    </div>
</body>
</html>
