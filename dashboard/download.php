<?php
session_start();

// Periksa apakah parameter 'file' ada di URL
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Simpan path file ke dalam sesi
    $_SESSION["download"] = $file;

    // Hilangkan ekstensi ".rda" dari nama file
    $download_name = preg_replace('/\.rda$/', '', basename($file));

    // Mengatur header untuk unduhan
    header("Content-Disposition: attachment; filename=\"" . $download_name . "\"");
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize($file));
    header("Connection: close");
    
    // Membaca dan mengirim file ke pengguna
    readfile($file);

    // Hapus sesi setelah unduhan selesai
    unset($_SESSION["download"]);
} else {
    echo "File tidak ditemukan.";
}
?>
