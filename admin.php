<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar PPDB</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pendaftar PPDB</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Alamat</th>
                    <th>Asal Sekolah</th>
                    <th>Nama Ortu</th>
                    <th>Pekerjaan Ortu</th>
                    <th>Nilai Rapot</th>
                   <th>No Telepon</t>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hubungkan ke database dan ambil data pendaftar
                $conn = new mysqli("localhost", "root", "", "jincuriki");
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM pendaftaran";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["nisn"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["asal_sekolah"] . "</td>";
                        echo "<td>" . $row["nama_ortu"] . "</td>";
                        echo "<td>" . $row["pekerjaan_ortu"] . "</td>";
                        echo "<td>" . $row["telepon"] . "</td>";
                        echo "<td>" . $row["nilai_rapot"] . "</td>";
                        echo "<td><img src='" . $row["foto"] . "'/></td>";
                        echo "<td>
                                <form action='admin.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='nama' value='" . $row['nama'] . "'>
                                    <input type='hidden' name='action' value='delete'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                                </form>
                                <button class='btn btn-primary btn-sm' onclick='editData(" . json_encode($row) . ")'>Edit</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href="index.php" class="btn btn-primary mb-3">Kembali Beranda</a>

        <!-- Formulir Edit -->
        <div class="modal" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Pendaftar</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="admin.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <div class="form-group">
                                <label for="edit_nama">Nama:</label>
                                <input type="text" class="form-control" id="edit_nama" name="edit_nama" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_nisn">NISN:</label>
                                <input type="text" class="form-control" id="edit_nisn" name="edit_nisn" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_alamat">Alamat:</label>
                                <input type="text" class="form-control" id="edit_alamat" name="edit_alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_asal_sekolah">Asal Sekolah:</label>
                                <input type="text" class="form-control" id="edit_asal_sekolah" name="edit_asal_sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_nama_ortu">Nama Ortu:</label>
                                <input type="text" class="form-control" id="edit_nama_ortu" name="edit_nama_ortu" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_pekerjaan_ortu">Pekerjaan Ortu:</label>
                                <input type="text" class="form-control" id="edit_pekerjaan_ortu" name="edit_pekerjaan_ortu" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_telepon">No Telepon:</label>
                                <input type="text" class="form-control" id="edit_telepon" name="edit_telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_nilai_rapot">Nilai Rapot:</label>
                                <input type="text" class="form-control" id="edit_nilai_rapot" name="edit_nilai_rapot" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_foto">Foto:</label>
                                <input type="file" class="form-control-file" id="edit_foto" name="edit_foto" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editData(row) {
            document.getElementById('edit_nama').value = row.nama;
            document.getElementById('edit_nisn').value = row.nisn;
            document.getElementById('edit_alamat').value = row.alamat;
            document.getElementById('edit_asal_sekolah').value = row.asal_sekolah;
            document.getElementById('edit_nama_ortu').value = row.nama_ortu;
            document.getElementById('edit_pekerjaan_ortu').value = row.pekerjaan_ortu;
            document.getElementById('edit_telepon').value = row.telepon;
            document.getElementById('edit_nilai_rapot').value = row.nilai_rapot;
            $('#editModal').modal('show');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "jincuriki");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses delete data
if(isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $sql = "DELETE FROM pendaftaran WHERE nama=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus.');</script>";
        echo "<script>window.location = 'admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.');</script>";
    }
}

// Proses update data
if(isset($_POST['action']) && $_POST['action'] === 'update') {
    $nama = $_POST['edit_nama'];
    $nisn = $_POST['edit_nisn'];
    $alamat = $_POST['edit_alamat'];
    $asal_sekolah = $_POST['edit_asal_sekolah'];
    $nama_ortu = $_POST['edit_nama_ortu'];
    $pekerjaan_ortu = $_POST['edit_pekerjaan_ortu'];
    $telepon = $_POST['edit_telepon'];
    $nilai_rapot = $_POST['edit_nilai_rapot'];

    $foto = $_FILES['edit_foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["edit_foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["edit_foto"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Upload file if everything is okay
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["edit_foto"]["tmp_name"], $target_file)) {
            $foto_path = $target_dir . $foto;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "UPDATE pendaftaran SET nisn=?, alamat=?, asal_sekolah=?, nama_ortu=?, pekerjaan_ortu=?, telepon=?, nilai_rapot=?, foto=? WHERE nama=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $nisn, $alamat, $asal_sekolah, $nama_ortu, $pekerjaan_ortu, $telepon, $nilai_rapot, $foto_path, $nama);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui.');</script>";
        echo "<script>window.location = 'admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>
