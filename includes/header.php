<?php
/** @var array $data */
$meta = $data['meta'];
$profile = $data['profile'];
$cv = cv_path($profile);
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($meta['title']) ?></title>
    <meta name="description" content="<?= e($meta['description']) ?>">
    <meta name="keywords" content="<?= e($meta['keywords']) ?>">
    <meta name="author" content="<?= e($profile['name']) ?>">
    <meta name="theme-color" content="#070b12" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#f6f7fb" media="(prefers-color-scheme: light)">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($meta['title']) ?>">
    <meta property="og:description" content="<?= e($meta['description']) ?>">
    <meta property="og:locale" content="id_ID">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="data:image/svg+xml,<?= rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><rect width="64" height="64" rx="14" fill="#0b1220"/><text x="32" y="42" font-family="ui-sans-serif,system-ui" font-size="28" font-weight="700" fill="#6ee7b7" text-anchor="middle">BA</text></svg>') ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        // Terapkan tema tersimpan sebelum render supaya tidak berkedip.
        (function () {
            try {
                var saved = localStorage.getItem('theme');
                var prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
                document.documentElement.dataset.theme = saved || (prefersLight ? 'light' : 'dark');
            } catch (e) {}
        })();
    </script>
</head>
<body>
<a class="skip-link" href="#main">Lompat ke konten</a>
<div class="progress" aria-hidden="true"><span id="progress-bar"></span></div>

<header class="site-header" id="site-header">
    <div class="wrap header-inner">
        <a class="brand" href="#top" aria-label="<?= e($profile['name']) ?> — beranda">
            <span class="brand-mark"><?= e(initials($profile['name'])) ?></span>
            <span class="brand-text">
                <strong><?= e($profile['name']) ?></strong>
                <small><?= e($profile['role']) ?></small>
            </span>
        </a>

        <nav class="nav" id="nav" aria-label="Navigasi utama">
            <?php foreach ($data['nav'] as $item): ?>
                <a href="#<?= e($item['id']) ?>" data-nav="<?= e($item['id']) ?>"><?= e($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="header-actions">
            <?php if ($cv !== null): ?>
                <a class="btn btn-ghost btn-sm" href="download.php" download>
                    <?= icon('download') ?><span>CV</span>
                </a>
            <?php endif; ?>
            <button class="icon-btn" id="theme-toggle" type="button" aria-label="Ganti tema terang/gelap" aria-pressed="true">
                <span class="theme-icon theme-icon-sun"><?= icon('sun') ?></span>
                <span class="theme-icon theme-icon-moon"><?= icon('moon') ?></span>
            </button>
            <button class="icon-btn menu-btn" id="menu-btn" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="nav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
