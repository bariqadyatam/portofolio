<?php
/**
 * Semua isi website ada di file ini.
 * Ubah teks di sini tanpa perlu menyentuh index.php.
 */

return [
    'meta' => [
        'title'       => 'Bariq Adyatma — Cloud Computing & Web Developer',
        'description' => 'Portofolio Bariq Adyatma, fresh graduate Teknologi Informasi Terapan Universitas Negeri Surabaya. Cloud Computing (GCP), web & backend development dengan PHP, Laravel, Node.js.',
        'keywords'    => 'Bariq Adyatma, portofolio, cloud computing, web developer, PHP, Laravel, Node.js, GCP, Surabaya',
    ],

    'profile' => [
        'name'      => 'Bariq Adyatma',
        'initials'  => 'BA',
        'role'      => 'Cloud Computing & Web Developer',
        'tagline'   => 'Fresh graduate Teknologi Informasi Terapan yang membangun aplikasi web, API, dan infrastruktur cloud yang rapi, cepat, dan mudah dirawat.',
        'location'  => 'Surabaya, Jawa Timur, Indonesia',
        'email'     => 'bariqadyatma@gmail.com',
        'status'    => 'Terbuka untuk peluang full-time',
        'cv'        => 'CV BARIQ ADYATMA.pdf',
        'summary'   => 'Fresh graduate Teknologi Informasi Terapan dengan pengalaman langsung di bidang cloud computing, pengembangan web, pengembangan IT, pengelolaan media, dan teknologi digital. Menyelesaikan Bangkit Academy Cloud Computing Path dengan pengetahuan praktis Google Cloud Platform (GCP), PHP, Laravel, Node.js, RESTful API, dasar jaringan, dan pengembangan aplikasi backend. Berpengalaman mendukung operasional media digital, pengelolaan website, dan proyek IT selama magang di Satuan Polisi Pamong Praja Surabaya. Adaptif, kolaboratif, dan berkomitmen untuk terus belajar di lingkungan yang digerakkan teknologi.',
        'links' => [
            ['label' => 'LinkedIn', 'url' => 'https://linkedin.com/in/bariqadyatma', 'icon' => 'linkedin'],
            ['label' => 'Website',  'url' => 'https://bariqadyatma.vercel.app',    'icon' => 'globe'],
            ['label' => 'Email',    'url' => 'mailto:bariqadyatma@gmail.com',      'icon' => 'mail'],
        ],
        'highlights' => [
            ['value' => '2026', 'label' => 'Lulus Teknologi Informasi Terapan, UNESA'],
            ['value' => 'GCP',  'label' => 'Bangkit Academy — Cloud Computing Path'],
            ['value' => 'BNSP', 'label' => 'Junior Web Programmer, tersertifikasi'],
        ],
    ],

    'experience' => [
        [
            'role'     => 'Intern — Media Management & IT Development',
            'company'  => 'Satuan Polisi Pamong Praja Surabaya',
            'type'     => 'MSIB',
            'period'   => 'Feb 2024 — Jun 2024',
            'location' => 'Surabaya, Indonesia',
            'points'   => [
                'Mengelola dan merawat akun media sosial organisasi: membuat, menerbitkan, dan memantau konten digital untuk mendukung keterlibatan publik serta penyebaran informasi.',
                'Mengelola, merawat, dan memperbarui website informasi resmi agar konten akurat, mudah diakses, dan memberi pengalaman pengguna yang baik.',
                'Berkolaborasi dengan tim internal untuk mengumpulkan, menata, dan menerbitkan informasi seputar kegiatan organisasi, layanan publik, dan program masyarakat.',
            ],
            'stack' => ['Media Management', 'Website Management', 'Content Operations'],
        ],
    ],

    'education' => [
        [
            'school'   => 'State University of Surabaya (UNESA)',
            'degree'   => 'Bachelor of Applied Information Technology',
            'period'   => '2021 — 2026',
            'location' => 'Surabaya, Indonesia',
            'points'   => [
                'Mata kuliah relevan: Information Technology, Web Development, Information Systems, IT Development.',
                'Proyek akademik dan teknologi, termasuk Satpol PP Surabaya E-Learning Platform sebagai tugas akhir.',
            ],
            'stack' => ['Web Development', 'Information Systems', 'UI/UX'],
        ],
    ],

    'certifications' => [
        [
            'title'  => 'Bangkit Academy — Cloud Computing Path',
            'issuer' => 'Cloud Computing Cohort, 2024 Batch 2',
            'period' => 'Sep 2024 — Des 2024',
            'points' => [
                'Program intensif cloud computing: teknologi cloud, dasar jaringan, web development, backend, Google Cloud Platform (GCP), dan deployment aplikasi.',
                'Membangun RESTful API dengan Node.js serta berkolaborasi dalam tim multidisiplin pada Capstone Project aplikasi deteksi stres.',
            ],
            'stack' => ['GCP', 'Docker', 'Node.js', 'REST API'],
        ],
        [
            'title'  => 'Junior Web Programmer',
            'issuer' => 'Badan Nasional Sertifikasi Profesi (BNSP)',
            'period' => 'Des 2024 — Des 2027',
            'points' => [
                'Sertifikasi kompetensi resmi bidang pemrograman web.',
            ],
            'stack' => ['PHP', 'Web Programming'],
        ],
    ],

    'projects' => [
        [
            'title'  => 'Satpol PP Surabaya E-Learning Platform',
            'kind'   => 'Tugas Akhir',
            'year'   => '2026',
            'summary' => 'Platform e-learning sebagai proyek akhir akademik, menerapkan konsep web development, UI/UX, dan teknologi informasi untuk mendukung pembelajaran daring.',
            'points' => [
                'Merancang dan mengimplementasikan fitur pembelajaran digital untuk mendukung pendidikan daring, aksesibilitas konten, dan keterlibatan pengguna.',
                'Menyusun alur materi, kuis, dan progres belajar dalam antarmuka yang sederhana bagi peserta.',
            ],
            'stack'  => ['PHP', 'Laravel', 'MySQL', 'UI/UX'],
            'featured' => true,
        ],
        [
            'title'  => 'Bangkit Capstone — Stress Detection App',
            'kind'   => 'Capstone Project',
            'year'   => '2024',
            'summary' => 'Aplikasi deteksi stres yang dibangun bersama tim multidisiplin Bangkit Academy, memadukan pengembangan perangkat lunak dan pendekatan berbasis data.',
            'points' => [
                'Berkontribusi pada pengembangan aplikasi yang berfokus pada pemantauan pengguna, wawasan kesejahteraan mental, dan pengalaman digital yang intuitif.',
                'Membangun RESTful API dengan Node.js dan men-deploy layanan ke Google Cloud Platform.',
            ],
            'stack'  => ['Node.js', 'REST API', 'GCP', 'Cloud Run'],
            'featured' => true,
        ],
        [
            'title'  => 'Website Informasi Satpol PP Surabaya',
            'kind'   => 'Magang MSIB',
            'year'   => '2024',
            'summary' => 'Pengelolaan dan perbaikan website informasi resmi organisasi, termasuk dokumentasi panduan bagi staf internal.',
            'points' => [
                'Membuat panduan pengguna dan dokumentasi bagi staf internal untuk mempermudah pengelolaan media digital dan pembaruan website.',
                'Menganalisis dan menyelesaikan masalah teknis serta bug konten pada website resmi agar ketersediaan dan pengalaman pengguna tetap optimal.',
            ],
            'stack'  => ['CMS', 'Technical Documentation', 'QA'],
            'featured' => false,
        ],
    ],

    'skills' => [
        [
            'group' => 'Cloud & Infrastructure',
            'items' => ['Cloud Computing', 'Cloud Architecture', 'Google Cloud Platform (GCP)', 'Docker', 'Application Deployment', 'Networking Fundamentals'],
        ],
        [
            'group' => 'Web & Backend',
            'items' => ['PHP', 'Laravel', 'Node.js', 'RESTful API', 'HTML', 'SQL Querying', 'Backend Development'],
        ],
        [
            'group' => 'Tools & Media',
            'items' => ['Git', 'GitHub', 'Microsoft Office', 'Media Management', 'Technical Documentation'],
        ],
        [
            'group' => 'Soft Skills',
            'items' => ['Problem Solving', 'Team Collaboration', 'Communication', 'Adaptability', 'Time Management', 'Continuous Learning'],
        ],
    ],

    'languages' => [
        ['name' => 'Bahasa Indonesia', 'level' => 'Native'],
        ['name' => 'English',          'level' => 'Professional working proficiency'],
    ],

    'nav' => [
        ['id' => 'about',    'label' => 'Tentang'],
        ['id' => 'experience', 'label' => 'Pengalaman'],
        ['id' => 'projects', 'label' => 'Proyek'],
        ['id' => 'skills',   'label' => 'Keahlian'],
        ['id' => 'contact',  'label' => 'Kontak'],
    ],
];
