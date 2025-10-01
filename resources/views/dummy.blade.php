<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Simple Navbar</title>
    <style>
        :root {
            --bg: #0f172a;
            /* dark navy */
            --accent: #06b6d4;
            /* cyan */
            --muted: #94a3b8;
            /* gray */
            --glass: rgba(255, 255, 255, 0.04);
        }

        /* Reset-ish */
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg, #071022 0%, #0b1220 100%);
            color: #e6eef6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Navbar */
        .nav {
            width: 100%;
            background: linear-gradient(180deg, var(--glass), transparent);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0.6rem 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            color: inherit
        }

        .logo {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--accent), #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #04263b
        }

        .brand-name {
            font-weight: 600
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            padding: 6px 8px;
            border-radius: 6px;
            font-size: 0.95rem
        }

        .nav-links a:hover {
            color: var(--accent);
            background: rgba(6, 182, 212, 0.06)
        }

        .cta {
            padding: 8px 12px;
            border-radius: 8px;
            background: linear-gradient(90deg, var(--accent), #7c3aed);
            color: #05202b;
            text-decoration: none;
            font-weight: 600
        }

        /* Mobile menu */
        .mobile-toggle {
            display: none;
            border: 0;
            background: transparent;
            color: inherit;
            font-size: 1.2rem
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            padding: 0.5rem 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.02)
        }

        .mobile-menu a {
            padding: 8px 0;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.02);
            color: var(--muted)
        }

        /* Responsiveness */
        @media (max-width:800px) {
            .nav-links {
                display: none
            }

            .mobile-toggle {
                display: inline-flex
            }

            .mobile-menu {
                display: none
            }

            .container {
                padding: 0.6rem
            }
        }
    </style>
</head>

<body>

    <!-- Simple top navbar: logo + links + CTA + mobile toggle -->
    <header class="nav" role="banner">
        <div class="container">
            <a href="#" class="brand" aria-label="Homepage">
                <div class="logo">FM</div>
                <div class="brand-name">FluxMini</div>
            </a>

            <nav class="nav-links" role="navigation" aria-label="Main navigation">
                <a href="#features">Features</a>
                <a href="#docs">Docs</a>
                <a href="#pricing">Pricing</a>
                <a href="#blog">Blog</a>
            </nav>

            <div style="display:flex;align-items:center;gap:0.6rem">
                <a class="cta" href="#get">Get Started</a>
                <button class="mobile-toggle" aria-expanded="false" aria-controls="mobileMenu" id="navToggle">☰</button>
            </div>
        </div>

        <div id="mobileMenu" class="mobile-menu" role="menu" aria-hidden="true">
            <a href="#features">Features</a>
            <a href="#docs">Docs</a>
            <a href="#pricing">Pricing</a>
            <a href="#blog">Blog</a>
            <a href="#get" style="padding-top:8px"><strong>Get Started</strong></a>
        </div>
    </header>

    <main style="padding:2rem;max-width:900px;margin:0 auto;line-height:1.6">
        <h1 style="margin-top:0">Contoh Navbar Sederhana</h1>
        <p>Ini contoh header/navbar sederhana, responsive — otomatis sembunyiin link dan munculin toggle di layar kecil.
        </p>
        <p>Gunakan file ini sebagai basis: mau ditambahkan dropdown, sticky header, atau shadow on scroll?</p>
    </main>

    <script>
        // Simple accessible toggle for mobile menu
        const toggle = document.getElementById('navToggle');
        const menu = document.getElementById('mobileMenu');
        toggle.addEventListener('click', () => {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            menu.style.display = expanded ? 'none' : 'flex';
            menu.setAttribute('aria-hidden', String(expanded));
        });
    </script>

</body>

</html>
