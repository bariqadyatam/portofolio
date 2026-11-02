<?php
/** @var array $data */
$profile = $data['profile'];
$year = date('Y');
?>
<footer class="site-footer">
    <div class="wrap footer-inner">
        <div class="footer-brand">
            <span class="brand-mark"><?= e(initials($profile['name'])) ?></span>
            <div>
                <strong><?= e($profile['name']) ?></strong>
                <p><?= e($profile['role']) ?> · <?= e($profile['location']) ?></p>
            </div>
        </div>

        <div class="footer-links">
            <?php foreach ($profile['links'] as $link): ?>
                <a href="<?= e($link['url']) ?>" <?= str_starts_with($link['url'], 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
                    <?= icon($link['icon']) ?><span><?= e($link['label']) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="wrap footer-bottom">
        <p>&copy; <?= e((string) $year) ?> <?= e($profile['name']) ?>. Dibangun dengan PHP native.</p>
        <a class="to-top" href="#top">Kembali ke atas ↑</a>
    </div>
</footer>

<button class="to-top-fab" id="to-top" type="button" aria-label="Kembali ke atas">↑</button>

<script src="assets/js/app.js" defer></script>
</body>
</html>
