@php
  $pageTitle = $pageTitle ?? 'MyBlog — Modern Frontend';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $pageTitle }}</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { inter: ["Inter", "ui-sans-serif", "system-ui"] },
          boxShadow: {
            soft: "0 10px 30px -12px rgb(0 0 0 / 0.25)",
            glow: "0 8px 24px -6px rgb(99 102 241 / .5)",
          },
          backgroundImage: {
            'hero-gradient': 'radial-gradient(1200px 500px at 10% -10%, rgba(79,70,229,.35), transparent 60%), radial-gradient(900px 400px at 90% -20%, rgba(236,72,153,.35), transparent 60%), linear-gradient(180deg, #0f172a, #0b1220 60%)',
          }
        }
      }
    }
  </script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    .noise { position: relative; }
    .noise:before { content:""; position:absolute; inset:0; pointer-events:none; opacity:.04; background-image:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="1400" height="400"><filter id="n"><feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="2" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23n)" opacity="0.45"/></svg>'); }
    .link-underline { background-size: 0 2px; background-image: linear-gradient(currentColor,currentColor); background-repeat: no-repeat; background-position: 0 100%; transition: background-size .3s ease; }
    .link-underline:hover { background-size: 100% 2px; }
  </style>

  @stack('head')
</head>
<body class="font-inter text-slate-100 bg-slate-950 selection:bg-indigo-500/40 selection:text-white">
    @yield('content')
  @stack('scripts')
</body>
</html>
