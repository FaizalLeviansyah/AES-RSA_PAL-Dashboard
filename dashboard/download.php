<?php
session_start();

// Periksa apakah parameter 'file' ada di URL
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Simpan path file ke dalam sesi
    $_SESSION["download"] = $file;

    // Mengatur header untuk unduhan
    header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
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
