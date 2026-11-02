# Portofolio — Bariq Adyatma

Website portofolio statis berbasis **PHP native** (tanpa framework, tanpa Composer, tanpa build step).
Seluruh isi diambil dari CV `CV BARIQ ADYATMA.pdf` dan disimpan sebagai data di `data.php`.

## Menjalankan

```bash
cd ~/Downloads/portofolio
php -S localhost:8000
```

Buka http://localhost:8000

Tidak perlu Apache/Nginx. Untuk hosting PHP (shared hosting, VPS, Cloud Run) cukup upload
seluruh folder ini.

## Deploy ke Vercel / hosting statis

**Vercel tidak menjalankan PHP.** File `.php` akan dikirim apa adanya sebagai unduhan
(`application/octet-stream`), bukan dieksekusi — itu sebabnya membuka situs di Vercel
malah men-download source code.

Solusinya: ekspor dulu ke HTML statis, lalu deploy folder `dist/`.

```bash
php build-static.php       # menghasilkan dist/index.html + assets + CV-Bariq-Adyatma.pdf
```

Setelah itu, di Vercel:

- **Root Directory**: `dist`
- **Framework Preset**: Other
- **Build Command**: kosong
- **Output Directory**: kosong

Atau langsung dari terminal: `cd dist && vercel --prod`.

Skrip `build-static.php` merender `index.php` dengan PHP CLI, mengganti tautan
`download.php` menjadi berkas PDF, dan memastikan tidak ada sisa file `.php` di `dist/`.
Jalankan ulang setiap kali `data.php` atau tampilan diubah.

Kalau tetap ingin PHP berjalan (misalnya memakai `download.php` dinamis), gunakan hosting
PHP — bukan Vercel. Alternatif di Vercel adalah community runtime `vercel-php`, tetapi
hanya untuk fungsi di folder `api/` dan tidak resmi didukung.

## Struktur

```
portofolio/
├── index.php           Halaman utama (hero, tentang, pengalaman, proyek, keahlian, kontak)
├── data.php            SEMUA isi/teks website — ubah di sini
├── download.php        Menyajikan CV sebagai unduhan (nama file dari data.php)
├── includes/
│   ├── helpers.php     e() escape, icon() SVG, cv_path(), initials()
│   ├── header.php      <head>, header, navigasi, tombol tema
│   └── footer.php      Footer + script
├── assets/
│   ├── css/style.css   Semua styling (token warna, dark/light, responsif, print)
│   └── js/app.js       Tema, menu mobile, progress bar, reveal, salin email
└── CV BARIQ ADYATMA.pdf
```

## Mengubah isi

Semua teks ada di `data.php`:

- `profile` — nama, peran, tagline, ringkasan, email, tautan, highlight
- `experience` / `education` / `certifications` — item timeline & kartu
- `projects` — kartu proyek (`featured => true` memberi border aksen)
- `skills` — grup keahlian
- `nav` — menu navigasi
- `meta` — judul dan deskripsi untuk SEO/OG

Tambahkan item baru ke array yang sesuai; `index.php` merender otomatis.

## Fitur

- PHP 8, tanpa dependency; escape output lewat `e()` (anti-XSS)
- Tema gelap/terang: mengikuti `prefers-color-scheme`, tersimpan di `localStorage`
- Responsif (uji 390 px s/d desktop), menu mobile, navigasi aktif saat scroll
- Reveal on scroll dengan `IntersectionObserver` (menghormati `prefers-reduced-motion`)
- Tombol unduh CV + salin email
- Gaya cetak (`@media print`) supaya satu halaman bisa di-print ke PDF
- Jika file CV diganti, cukup perbarui nilai `profile.cv` di `data.php`

## Catatan

- Nomor telepon sengaja tidak ditampilkan di website; tambahkan sendiri di `data.php`
  bila ingin dicantumkan (bagian kontak memakai email dan LinkedIn).
- Belum di-deploy, sesuai permintaan — hanya build lokal.
