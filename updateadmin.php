<?php
// Hubungkan ke database dan ambil data pendaftar
$conn = new mysqli("localhost", "root", "", "jincuriki");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses update data
if(isset($_POST['action']) && $_POST['action'] === 'update') {
    // Ambil data yang dikirimkan dari formulir
    $id = $_POST['update_id'];
    $nama = $_POST['update_nama'];
    $nisn = $_POST['update_nisn'];
    $alamat = $_POST['update_alamat'];
    $asal_sekolah = $_POST['update_asal_sekolah'];
    $nama_ortu = $_POST['update_nama_ortu'];
    $pekerjaan_ortu = $_POST['update_pekerjaan_ortu'];
    $nilai_rapot = $_POST['update_nilai_rapot'];
    // Ambil data lainnya yang diperlukan untuk update

    // Buat query untuk melakukan update
    $sql = "UPDATE pendaftaran SET nama=?, nisn=?, alamat=?, asal_sekolah=?, nama_ortu=?, pekerjaan_ortu=?, nilai_rapot=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $nama, $nisn, $alamat, $asal_sekolah, $nama_ortu, $pekerjaan_ortu, $nilai_rapot, $id);

    // Lakukan eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diupdate.');</script>";
        // Redirect atau refresh halaman agar perubahan terlihat
        echo "<script>window.location = 'admin.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
$conn->close();
?>
