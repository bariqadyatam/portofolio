/* Portofolio Bariq Adyatma — interaksi ringan, tanpa dependency. */
(function () {
    'use strict';

    var root = document.documentElement;
    var header = document.getElementById('site-header');
    var nav = document.getElementById('nav');
    var menuBtn = document.getElementById('menu-btn');
    var themeBtn = document.getElementById('theme-toggle');
    var toTop = document.getElementById('to-top');
    var progressBar = document.getElementById('progress-bar');
    var copyBtn = document.getElementById('copy-email');
    var navLinks = Array.prototype.slice.call(document.querySelectorAll('[data-nav]'));

    /* ---------- Theme ---------- */
    function syncThemeButton() {
        if (!themeBtn) return;
        var dark = root.dataset.theme !== 'light';
        themeBtn.setAttribute('aria-pressed', String(dark));
        themeBtn.setAttribute('aria-label', dark ? 'Aktifkan tema terang' : 'Aktifkan tema gelap');
    }

    syncThemeButton();

    if (themeBtn) {
        themeBtn.addEventListener('click', function () {
            var next = root.dataset.theme === 'light' ? 'dark' : 'light';
            root.dataset.theme = next;
            try { localStorage.setItem('theme', next); } catch (e) {}
            syncThemeButton();
        });
    }

    /* ---------- Mobile menu ---------- */
    function closeMenu() {
        if (!nav || !menuBtn) return;
        nav.classList.remove('is-open');
        menuBtn.setAttribute('aria-expanded', 'false');
    }

    if (menuBtn && nav) {
        menuBtn.addEventListener('click', function () {
            var open = nav.classList.toggle('is-open');
            menuBtn.setAttribute('aria-expanded', String(open));
        });

        navLinks.forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeMenu();
        });

        document.addEventListener('click', function (event) {
            if (!nav.classList.contains('is-open')) return;
            if (nav.contains(event.target) || menuBtn.contains(event.target)) return;
            closeMenu();
        });
    }

    /* ---------- Scroll: header, progress, back-to-top ---------- */
    var ticking = false;

    function onScroll() {
        var y = window.scrollY || window.pageYOffset;
        if (header) header.classList.toggle('is-stuck', y > 8);
        if (toTop) toTop.classList.toggle('is-visible', y > 520);

        if (progressBar) {
            var doc = document.documentElement;
            var max = doc.scrollHeight - window.innerHeight;
            var ratio = max > 0 ? Math.min(y / max, 1) : 0;
            progressBar.style.width = (ratio * 100).toFixed(2) + '%';
        }

        ticking = false;
    }

    window.addEventListener('scroll', function () {
        if (!ticking) {
            ticking = true;
            window.requestAnimationFrame(onScroll);
        }
    }, { passive: true });

    onScroll();

    if (toTop) {
        toTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ---------- Reveal on scroll ---------- */
    var revealItems = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window && revealItems.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

        revealItems.forEach(function (item, index) {
            item.style.transitionDelay = Math.min(index % 4, 3) * 60 + 'ms';
            revealObserver.observe(item);
        });
    } else {
        revealItems.forEach(function (item) { item.classList.add('is-visible'); });
    }

    /* ---------- Active nav on scroll ---------- */
    var sections = navLinks
        .map(function (link) { return document.getElementById(link.dataset.nav); })
        .filter(Boolean);

    if ('IntersectionObserver' in window && sections.length) {
        var navObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                navLinks.forEach(function (link) {
                    link.classList.toggle('is-active', link.dataset.nav === entry.target.id);
                });
            });
        }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });

        sections.forEach(function (section) { navObserver.observe(section); });
    }

    /* ---------- Copy email ---------- */
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            var email = copyBtn.dataset.email || '';
            var label = copyBtn.querySelector('span');
            var original = label ? label.textContent : '';

            function done(text) {
                copyBtn.classList.add('is-copied');
                if (label) label.textContent = text;
                window.setTimeout(function () {
                    copyBtn.classList.remove('is-copied');
                    if (label) label.textContent = original;
                }, 1800);
            }

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(email).then(function () {
                    done('Tersalin!');
                }).catch(function () {
                    done('Salin manual: ' + email);
                });
            } else {
                done('Salin manual: ' + email);
            }
        });
    }
})();
