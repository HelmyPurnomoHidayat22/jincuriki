<?php
require 'vendor/autoload.php'; // Menggunakan autoloader dari Composer
use Dompdf\Dompdf; // Menggunakan kelas Dompdf
use Dompdf\Options; // Menggunakan kelas Options

// Cek apakah ada data POST yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengatur koneksi ke database
    $host = 'localhost'; 
    $namapengguna = 'akar'; 
    $katasandi = ''; 
    $database = 'jincuriki'; 
    $conn = new mysqli($host, $namapengguna, $katasandi, $database);

    // Memeriksa koneksi database
    if ($conn->connect_error) { 
        die("Koneksi gagal: " . $conn->connect_error); 
    } 

    // Mengambil data dari formulir POST
    $nama = $_POST['nama']; 
    $nisn = $_POST['nisn']; 
    $alamat = $_POST['alamat']; 
    $asal_sekolah = $_POST['asal_sekolah']; 
    $nama_ortu = $_POST['nama_ortu']; 
    $pekerjaan_ortu = $_POST['pekerjaan_ortu']; 
    $nilai_rapot = $_POST['nilai_rapot']; 
    $foto = $_FILES['foto']; 

    // Memeriksa apakah NISN berupa angka
    if (!ctype_digit($nisn)) { 
        header("Location: ppdb2.php?status=error"); 
        exit(); 
    } 

    // Menentukan direktori unggahan
    $target_dir = "unggahan/"; 
    $target_file = $target_dir . uniqid() . basename($foto["name"]); 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

    // Memeriksa ukuran file dan tipe gambar yang diunggah
    if ($foto["size"] > 5000000 || !in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) { 
        header("Location: ppdb2.php?status=error"); 
        exit(); 
    } 

    // Memindahkan file gambar yang diunggah ke direktori unggahan
    if (!move_uploaded_file($foto["tmp_name"], $target_file)) { 
        header("Location: ppdb2.php?status=error"); 
        exit(); 
    } 

    // Menyiapkan query untuk memasukkan data ke database
    $stmt = $conn->prepare("INSERT INTO pendaftaran (nama, nisn, alamat, asal_sekolah, nama_ortu, pekerjaan_ortu, nilai_rapot, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); 
    $stmt->bind_param("ssssssss", $nama, $nisn, $alamat, $asal_sekolah, $nama_ortu, $pekerjaan_ortu, $nilai_rapot, $target_file); 
    
    // Menjalankan query dan memeriksa apakah berhasil
    if ($stmt->execute()) { 
        $stmt->close(); 
        $conn->close(); 

        // Mengatur opsi untuk pembuatan PDF
        $options = new Options(); 
        $options->set('isPhpEnabled', true); // Mengaktifkan fitur PHP
        $options->set('isHtml5ParserEnabled', true); // Mengaktifkan parser HTML5

        // Membuat objek Dompdf dengan opsi yang sudah ditentukan
        $dompdf = new Dompdf($options); 

        // Mengatur isi HTML untuk PDF
        $html = "<html><head><title>Formulir Pendaftaran</title><style>body { font-family: Arial, sans-serif; } .container { width: 100%; padding: 20px; background-color: #f2f2f2; } .header { text-align: center; margin-bottom: 20px; } .form-group { margin-bottom: 15px; } .form-group p { margin: 0; } .photo { text-align: center; } .photo img { max-width: 150px; max-height: 200px; }</style></head><body><div class='container'><div class='header'><h1>Formulir Pendaftaran PPDB</h1></div><div class='form-group'><label>Nama:</label><p>{$nama}</p></div><div class='form-group'><label>NISN:</label><p>{$nisn}</p></div><div class='form-group'><label>Alamat:</label><p>{$alamat}</p></div><div class='form-group'><label>Asal Sekolah:</label><p>{$asal_sekolah}</p></div><div class='form-group'><label>Nama Orang Tua:</label><p>{$nama_ortu}</p></div><div class='form-group'><label>Pekerjaan Orang Tua:</label><p>{$pekerjaan_ortu}</p></div><div class='form-group'><label>Nilai Rapot:</label><p>{$nilai_rapot}</p></div><div class='photo'><label>Foto:</label><img src='{$target_file}' alt='Foto'></div></div></body></html>";

        // Memuat HTML ke objek Dompdf
        $dompdf->loadHtml($html); 
        
        // Mengatur ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait'); 
        
        // Melakukan render HTML menjadi PDF
        $dompdf->render(); 

        // Mengambil hasil render dan menyimpannya ke dalam variabel
        $pdf_content = $dompdf->output();

        // Mengatur header untuk men-download file
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Formulir_Pendaftaran_PPDB.pdf"');

        // Mengirimkan isi PDF sebagai output
        echo $pdf_content;
    } else { 
        // Jika query tidak berhasil dijalankan, redirect ke halaman error
        header("Location: ppdb2.php?status=error"); 
        exit(); 
    } 
} 
?>
