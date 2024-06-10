<?php
require __DIR__ . "/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jincuriki';
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pendaftaran WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Set Dompdf options
        $options = new Options();
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);

        // Set paper size and orientation
        $dompdf->setPaper("A4", "portrait");

        // Load HTML template
        $html = file_get_contents("template.html");

        // Replace placeholders with actual data
        $html = str_replace(
            ["{{ nama }}", "{{ nisn }}", "{{ alamat }}", "{{ asal_sekolah }}", "{{ nama_ortu }}", "{{ pekerjaan_ortu }}", "{{ telepon }}", "{{ nilai_rapot }}", "{{ foto }}"],
            [$row['nama'], $row['nisn'], $row['alamat'], $row['asal_sekolah'], $row['nama_ortu'], $row['pekerjaan_ortu'], $row['telepon'], $row['nilai_rapot'], $row['foto']],
            $html
        );

        $dompdf->loadHtml($html);
        $dompdf->render();

        // Add document info
        $dompdf->addInfo("Title", "Data Pendaftaran PDF");

        // Stream PDF to browser
        $dompdf->stream("data_pendaftaran.pdf", ["Attachment" => 0]);

        // Save PDF locally
        $output = $dompdf->output();
        file_put_contents("data_pendaftaran_$id.pdf", $output);
    } else {
        echo "ID tidak ditemukan.";
    }
} else {
    echo "Parameter ID tidak valid.";
}
?>
