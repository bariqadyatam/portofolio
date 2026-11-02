<?php
declare(strict_types=1);

/**
 * Ekspor situs PHP menjadi HTML statis di folder dist/.
 *
 * Vercel tidak menjalankan PHP: file .php akan dikirim apa adanya sebagai
 * unduhan. Jalankan skrip ini lalu deploy isi dist/ sebagai situs statis.
 *
 * Pemakaian: php build-static.php
 */

$root = __DIR__;
$dist = $root . '/dist';

/** Hapus isi folder secara rekursif. */
function rrmdir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    $items = scandir($dir) ?: [];
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir . '/' . $item;
        is_dir($path) ? rrmdir($path) : @unlink($path);
    }
    @rmdir($dir);
}

/** Salin folder secara rekursif. */
function rcopy(string $src, string $dst): void
{
    if (!is_dir($dst) && !mkdir($dst, 0775, true) && !is_dir($dst)) {
        throw new RuntimeException("Tidak bisa membuat folder: $dst");
    }
    $items = scandir($src) ?: [];
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $from = $src . '/' . $item;
        $to = $dst . '/' . $item;
        is_dir($from) ? rcopy($from, $to) : copy($from, $to);
    }
}

$data = require $root . '/data.php';

// index.php memuat helpers.php sendiri, jadi jangan require di sini
// (fungsi e() akan bentrok).
$cvSource = $root . '/' . $data['profile']['cv'];
if (!is_file($cvSource)) {
    fwrite(STDERR, "File CV tidak ditemukan. Periksa 'cv' di data.php.\n");
    exit(1);
}

// 1. Render halaman.
ob_start();
require $root . '/index.php';
$html = (string) ob_get_clean();

if ($html === '' || str_contains($html, 'Fatal error')) {
    fwrite(STDERR, "Render gagal: keluaran kosong atau ada fatal error.\n");
    exit(1);
}

// 2. Siapkan dist/.
rrmdir($dist);
mkdir($dist, 0775, true);

// 3. Ganti tautan PHP ke berkas statis.
$cvName = 'CV-Bariq-Adyatma.pdf';
$html = str_replace('href="download.php"', 'href="' . $cvName . '"', $html);

// 4. Tulis hasil.
file_put_contents($dist . '/index.html', $html);
copy($cvSource, $dist . '/' . $cvName);
rcopy($root . '/assets', $dist . '/assets');

// 5. Jangan pernah ikutkan sisa kode PHP.
foreach (['index.php', 'download.php', 'data.php'] as $leftover) {
    @unlink($dist . '/' . $leftover);
}
if (is_dir($dist . '/includes')) {
    rrmdir($dist . '/includes');
}

$phpLeft = glob($dist . '/**/*.php') ?: [];
$bytes = filesize($dist . '/index.html') ?: 0;

printf(
    "dist/ siap: index.html %s KB, CV %s KB, assets disalin, sisa file PHP: %d\n",
    number_format($bytes / 1024, 1),
    number_format((filesize($dist . '/' . $cvName) ?: 0) / 1024, 1),
    count($phpLeft)
);
