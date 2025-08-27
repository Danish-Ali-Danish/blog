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

  <header id="navbar" class="fixed top-0 inset-x-0 z-50 backdrop-blur supports-[backdrop-filter]:bg-slate-900/50 bg-slate-900/70 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
          <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-400 via-fuchsia-400 to-sky-400 bg-clip-text text-transparent">MyBlog</span>
        </a>
        <nav class="hidden md:flex items-center gap-8 text-sm text-slate-200">
          <a class="link-underline hover:text-white" href="{{ route('home') }}">Home</a>
          <a class="link-underline hover:text-white" href="{{ route('blog.index') }}">Blog</a>
          <a class="link-underline hover:text-white" href="{{ route('frontend.categories.index') }}">categories</a>
          <a class="link-underline hover:text-white" href="{{ route('about') }}">About</a>
          <a class="link-underline hover:text-white" href="{{ route('contact') }}">Contact</a>
        </nav>
        <div class="flex items-center gap-3">
          <form method="GET" action="{{ route('blog.index') }}" class="hidden sm:flex items-center gap-2 rounded-full bg-white/5 ring-1 ring-white/10 px-3 py-1.5">
            <i class='bx bx-search text-lg text-slate-300'></i>
            <input name="search" value="{{ request('search') }}" class="bg-transparent placeholder:text-slate-400 text-sm focus:outline-none text-slate-100 w-40" placeholder="Search articles..." />
          </form>
          <button class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/5 ring-1 ring-white/10"><i class='bx bx-menu text-2xl'></i></button>
        </div>
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="bg-slate-950 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-slate-400">© {{ date('Y') }} MyBlog. All rights reserved.</p>
        <div class="flex items-center gap-4 text-xl text-slate-300">
          <a href="#" class="hover:text-white"><i class='bx bxl-facebook'></i></a>
          <a href="#" class="hover:text-white"><i class='bx bxl-twitter'></i></a>
          <a href="#" class="hover:text-white"><i class='bx bxl-github'></i></a>
          <a href="#" class="hover:text-white"><i class='bx bxl-instagram'></i></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.1/dist/vanilla-tilt.min.js"></script>
    <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    const nav = document.getElementById('navbar');
    document.addEventListener('scroll', () => {
      nav.classList.toggle('shadow-soft', window.scrollY > 10);
    });
    AOS.init({ once: true, duration: 700, easing: 'ease-out-cubic' });
  </script>
  @stack('scripts')
</body>
</html>
