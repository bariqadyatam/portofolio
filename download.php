<?php
declare(strict_types=1);

/**
 * Menyajikan file CV sebagai unduhan.
 * Nama file diambil dari data.php supaya tidak bisa dipakai untuk membaca file lain.
 */

$data = require __DIR__ . '/data.php';
require __DIR__ . '/includes/helpers.php';

$path = cv_path($data['profile']);

if ($path === null || !is_readable($path)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo "CV belum tersedia. Letakkan file PDF CV di folder ini dan perbarui 'cv' pada data.php.";
    exit;
}

$downloadName = 'CV-Bariq-Adyatma.pdf';
$size = filesize($path) ?: 0;

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $downloadName . '"; filename*=UTF-8\'\'' . rawurlencode($downloadName));
header('Content-Length: ' . $size);
header('Content-Transfer-Encoding: binary');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: private, max-age=0, must-revalidate');

while (ob_get_level() > 0) {
    ob_end_clean();
}

readfile($path);
