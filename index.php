<?php
declare(strict_types=1);

$data = require __DIR__ . '/data.php';
require __DIR__ . '/includes/helpers.php';

$profile = $data['profile'];
$cv = cv_path($profile);

require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <span id="top"></span>

    <!-- ================= HERO ================= -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-glow" aria-hidden="true"></div>
        <div class="wrap hero-inner">
            <div class="hero-copy">
                <p class="eyebrow reveal">
                    <span class="dot" aria-hidden="true"></span>
                    <?= e($profile['status']) ?>
                </p>

                <h1 id="hero-title" class="reveal">
                    <?= e($profile['name']) ?>
                    <span class="hero-role"><?= e($profile['role']) ?></span>
                </h1>

                <p class="hero-tagline reveal"><?= e($profile['tagline']) ?></p>

                <div class="hero-cta reveal">
                    <a class="btn btn-primary" href="#projects">
                        Lihat proyek <?= icon('arrow') ?>
                    </a>
                    <?php if ($cv !== null): ?>
                        <a class="btn btn-outline" href="download.php" download>
                            <?= icon('download') ?> Unduh CV
                        </a>
                    <?php endif; ?>
                </div>

                <ul class="hero-meta reveal">
                    <li><?= icon('pin') ?><span><?= e($profile['location']) ?></span></li>
                    <li>
                        <a href="mailto:<?= e($profile['email']) ?>"><?= icon('mail') ?><span><?= e($profile['email']) ?></span></a>
                    </li>
                </ul>
            </div>

            <aside class="hero-card reveal" aria-label="Ringkasan profil">
                <div class="card-head">
                    <span class="pill">Profil singkat</span>
                    <span class="mono"><?= e((string) date('Y')) ?></span>
                </div>
                <ul class="hero-stats">
                    <?php foreach ($profile['highlights'] as $item): ?>
                        <li>
                            <strong><?= e($item['value']) ?></strong>
                            <span><?= e($item['label']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="card-foot">
                    <span class="pill pill-soft">PHP</span>
                    <span class="pill pill-soft">Laravel</span>
                    <span class="pill pill-soft">Node.js</span>
                    <span class="pill pill-soft">GCP</span>
                </div>
            </aside>
        </div>
    </section>

    <!-- ================= ABOUT ================= -->
    <section class="section" id="about" aria-labelledby="about-title">
        <div class="wrap">
            <header class="section-head reveal">
                <span class="section-num">01</span>
                <div>
                    <h2 id="about-title">Tentang Saya</h2>
                    <p class="section-sub">Ringkasan profesional</p>
                </div>
            </header>

            <div class="grid about-grid">
                <div class="about-text reveal">
                    <p class="lead"><?= e($profile['summary']) ?></p>

                    <div class="about-facts">
                        <div class="fact">
                            <span class="fact-label">Pendidikan</span>
                            <span class="fact-value">S1 Terapan Teknologi Informasi, UNESA</span>
                        </div>
                        <div class="fact">
                            <span class="fact-label">Fokus</span>
                            <span class="fact-value">Cloud Computing · Web &amp; Backend Development</span>
                        </div>
                        <div class="fact">
                            <span class="fact-label">Domisili</span>
                            <span class="fact-value"><?= e($profile['location']) ?></span>
                        </div>
                        <div class="fact">
                            <span class="fact-label">Bahasa</span>
                            <span class="fact-value">
                                <?php
                                $langs = array_map(
                                    static fn (array $l): string => $l['name'] . ' (' . $l['level'] . ')',
                                    $data['languages']
                                );
                                echo e(implode(' · ', $langs));
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="about-side reveal">
                    <div class="mini-card">
                        <span class="mini-card-icon"><?= icon('spark') ?></span>
                        <h3>Yang saya kerjakan</h3>
                        <ul class="tick-list">
                            <li>Membangun antarmuka web yang responsif dan mudah diakses.</li>
                            <li>Mengembangkan API dan layanan backend dengan PHP/Laravel maupun Node.js.</li>
                            <li>Men-deploy dan merawat aplikasi di Google Cloud Platform.</li>
                            <li>Mengelola konten, dokumentasi, dan operasional website organisasi.</li>
                        </ul>
                    </div>
                    <div class="mini-card mini-card-quiet">
                        <h3>Sedang dipelajari</h3>
                        <p>Infrastruktur cloud, kontainerisasi dengan Docker, dan praktik backend yang rapi untuk aplikasi produksi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= EXPERIENCE ================= -->
    <section class="section section-alt" id="experience" aria-labelledby="exp-title">
        <div class="wrap">
            <header class="section-head reveal">
                <span class="section-num">02</span>
                <div>
                    <h2 id="exp-title">Pengalaman</h2>
                    <p class="section-sub">Kerja, magang, dan pendidikan</p>
                </div>
            </header>

            <ol class="timeline">
                <?php foreach ($data['experience'] as $job): ?>
                    <li class="timeline-item reveal">
                        <div class="timeline-dot" aria-hidden="true"></div>
                        <div class="timeline-body">
                            <div class="timeline-top">
                                <h3><?= e($job['role']) ?></h3>
                                <span class="period"><?= e($job['period']) ?></span>
                            </div>
                            <p class="timeline-org">
                                <?= e($job['company']) ?>
                                <?php if (!empty($job['type'])): ?>
                                    <span class="tag"><?= e($job['type']) ?></span>
                                <?php endif; ?>
                                <span class="muted">· <?= e($job['location']) ?></span>
                            </p>
                            <ul class="bullets">
                                <?php foreach ($job['points'] as $point): ?>
                                    <li><?= e($point) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="chips">
                                <?php foreach ($job['stack'] as $tech): ?>
                                    <li><?= e($tech) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endforeach; ?>

                <?php foreach ($data['education'] as $edu): ?>
                    <li class="timeline-item reveal">
                        <div class="timeline-dot" aria-hidden="true"></div>
                        <div class="timeline-body">
                            <div class="timeline-top">
                                <h3><?= e($edu['degree']) ?></h3>
                                <span class="period"><?= e($edu['period']) ?></span>
                            </div>
                            <p class="timeline-org">
                                <?= e($edu['school']) ?>
                                <span class="muted">· <?= e($edu['location']) ?></span>
                            </p>
                            <ul class="bullets">
                                <?php foreach ($edu['points'] as $point): ?>
                                    <li><?= e($point) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="chips">
                                <?php foreach ($edu['stack'] as $tech): ?>
                                    <li><?= e($tech) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>

            <h3 class="subhead reveal">Pelatihan &amp; Sertifikasi</h3>
            <div class="grid cert-grid">
                <?php foreach ($data['certifications'] as $cert): ?>
                    <article class="cert-card reveal">
                        <div class="cert-head">
                            <span class="cert-badge" aria-hidden="true">✓</span>
                            <span class="period"><?= e($cert['period']) ?></span>
                        </div>
                        <h4><?= e($cert['title']) ?></h4>
                        <p class="cert-issuer"><?= e($cert['issuer']) ?></p>
                        <ul class="bullets">
                            <?php foreach ($cert['points'] as $point): ?>
                                <li><?= e($point) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="chips">
                            <?php foreach ($cert['stack'] as $tech): ?>
                                <li><?= e($tech) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= PROJECTS ================= -->
    <section class="section" id="projects" aria-labelledby="projects-title">
        <div class="wrap">
            <header class="section-head reveal">
                <span class="section-num">03</span>
                <div>
                    <h2 id="projects-title">Proyek</h2>
                    <p class="section-sub">Tugas akhir, capstone, dan pekerjaan nyata</p>
                </div>
            </header>

            <div class="grid project-grid">
                <?php foreach ($data['projects'] as $i => $project): ?>
                    <article class="project-card<?= $project['featured'] ? ' project-card-featured' : '' ?> reveal">
                        <div class="project-top">
                            <span class="project-kind"><?= e($project['kind']) ?></span>
                            <span class="mono"><?= e($project['year']) ?></span>
                        </div>
                        <h3><?= e($project['title']) ?></h3>
                        <p><?= e($project['summary']) ?></p>
                        <ul class="bullets">
                            <?php foreach ($project['points'] as $point): ?>
                                <li><?= e($point) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="chips">
                            <?php foreach ($project['stack'] as $tech): ?>
                                <li><?= e($tech) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="project-index" aria-hidden="true"><?= e(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= SKILLS ================= -->
    <section class="section section-alt" id="skills" aria-labelledby="skills-title">
        <div class="wrap">
            <header class="section-head reveal">
                <span class="section-num">04</span>
                <div>
                    <h2 id="skills-title">Keahlian</h2>
                    <p class="section-sub">Teknis, perangkat, dan interpersonal</p>
                </div>
            </header>

            <div class="grid skill-grid">
                <?php foreach ($data['skills'] as $group): ?>
                    <div class="skill-card reveal">
                        <h3><?= e($group['group']) ?></h3>
                        <ul class="chips chips-lg">
                            <?php foreach ($group['items'] as $item): ?>
                                <li><?= e($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= CONTACT ================= -->
    <section class="section contact" id="contact" aria-labelledby="contact-title">
        <div class="wrap contact-inner reveal">
            <p class="eyebrow"><span class="dot" aria-hidden="true"></span> Mari terhubung</p>
            <h2 id="contact-title">Punya proyek atau posisi yang cocok?</h2>
            <p class="contact-sub">
                Saya terbuka untuk peluang sebagai web developer, backend developer, atau cloud engineer.
                Kirim email dan saya akan membalas secepatnya.
            </p>

            <div class="contact-actions">
                <a class="btn btn-primary" href="mailto:<?= e($profile['email']) ?>">
                    <?= icon('mail') ?> <?= e($profile['email']) ?>
                </a>
                <button class="btn btn-outline" type="button" id="copy-email" data-email="<?= e($profile['email']) ?>">
                    <?= icon('copy') ?> <span>Salin email</span>
                </button>
            </div>

            <ul class="contact-links">
                <?php foreach ($profile['links'] as $link): ?>
                    <li>
                        <a href="<?= e($link['url']) ?>" <?= str_starts_with($link['url'], 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' ?>>
                            <?= icon($link['icon']) ?> <?= e($link['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
