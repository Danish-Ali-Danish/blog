@extends('layouts.frontend')

@section('content')
<section class="noise bg-hero-gradient pt-28 pb-20" id="hero">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
      <div data-aos="fade-right">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-200 mb-4">
          <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          Fresh insights, weekly
        </div>
        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
          Learn, build & grow with
          <span class="bg-gradient-to-r from-fuchsia-400 via-indigo-400 to-sky-400 bg-clip-text text-transparent">developer-grade articles</span>
        </h1>
        <p class="mt-4 text-slate-300 max-w-xl">Actionable tutorials on Laravel, JS, performance, and product thinking — explained with clarity and code samples.</p>
        <div class="mt-6 flex flex-wrap gap-3">
          <a href="#featured" class="rounded-full px-5 py-2.5 font-semibold shadow-glow bg-gradient-to-r from-indigo-500 via-fuchsia-500 to-sky-500 hover:via-pink-500 hover:to-emerald-400 transition-transform active:scale-95">Explore Featured</a>
          <a href="#latest" class="rounded-full px-5 py-2.5 font-semibold ring-1 ring-white/15 bg-white/5 hover:bg-white/10">Read Latest</a>
        </div>
        <div class="mt-8 flex items-center gap-4 text-sm text-slate-300">
          <div class="flex -space-x-2">
            <img class="w-8 h-8 rounded-full ring-2 ring-slate-900" src="https://i.pravatar.cc/32?img=5" alt=""/>
            <img class="w-8 h-8 rounded-full ring-2 ring-slate-900" src="https://i.pravatar.cc/32?img=7" alt=""/>
            <img class="w-8 h-8 rounded-full ring-2 ring-slate-900" src="https://i.pravatar.cc/32?img=15" alt=""/>
          </div>
          <span>10k+ monthly readers</span>
        </div>
      </div>
      <div class="relative" data-aos="fade-left">
        <div class="absolute -top-6 -right-6 w-28 h-28 rounded-full bg-fuchsia-500/20 blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 rounded-full bg-indigo-500/20 blur-2xl"></div>
        <div class="grid grid-cols-2 gap-4">
          @foreach($featuredPosts->take(4) as $fp)
          <a href="{{ route('blog.post', $fp->slug) }}" class="tilt group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-soft">
            <img class="h-48 w-full object-cover group-hover:scale-105 transition" src="{{ $fp->image ?? 'https://source.unsplash.com/600x400/?code' }}" alt="" />
            <div class="p-4">
              <p class="text-xs text-slate-300 mb-1">{{ $fp->type ?? 'Post' }}</p>
              <h3 class="font-semibold">{{ $fp->title }}</h3>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Category chips -->
    <div id="categories" class="mt-10 flex gap-3 overflow-x-auto no-scrollbar" data-aos="fade-up">
      <a href="{{ route('frontend.categories.index') }}" class="px-3 py-1.5 rounded-full text-xs font-semibold ring-1 ring-white/15 bg-white/5 whitespace-nowrap">All</a>
      @foreach($categories as $cat)
        <a href="{{ route('blog.index', ['category' => $cat->slug]) }}" class="px-3 py-1.5 rounded-full text-xs font-semibold {{ ['from-indigo-500','from-fuchsia-500','from-sky-500','from-emerald-500','from-amber-500'][($loop->index)%5] ?? 'from-indigo-500' }} bg-gradient-to-r to-fuchsia-500 whitespace-nowrap">{{ $cat->name }}</a>
      @endforeach
    </div>
  </div>
</section>

<!-- Featured (Swiper) -->
<section id="featured" class="py-16 bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between mb-6">
      <h2 class="text-2xl sm:text-3xl font-bold">Featured Posts</h2>
      <div class="text-sm text-slate-300">Handpicked reads</div>
    </div>

    <div class="swiper mySwiper" data-aos="fade-up">
      <div class="swiper-wrapper">
        @foreach($featuredPosts as $post)
        <a href="{{ route('blog.post', $post->slug) }}" class="swiper-slide group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-soft">
          <div class="relative">
            <img class="h-52 w-full object-cover group-hover:scale-105 transition" src="{{ $post->image ?? 'https://source.unsplash.com/800x500/?technology' }}" alt="" />
            @if($post->type)
              <span class="absolute top-3 left-3 text-[10px] uppercase tracking-wide px-2 py-1 rounded-full bg-indigo-500/90">{{ $post->type }}</span>
            @endif
          </div>
          <div class="p-5">
            <h3 class="font-semibold text-lg">{{ $post->title }}</h3>
            <p class="mt-1 text-sm text-slate-300 line-clamp-2">{{ $post->excerpt }}</p>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-400">
              <span>{{ \Illuminate\Support\Str::words(strip_tags($post->content), 10, '...') ?? 'No content available' }}</span>
              <span class="text-sky-400 group-hover:text-sky-300">Read →</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<!-- Latest Posts Grid -->
<section id="latest" class="py-16 bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between mb-6">
      <h2 class="text-2xl sm:text-3xl font-bold">Latest</h2>
      <a href="{{ route('blog.index') }}" class="text-sky-400 text-sm hover:text-sky-300">View all</a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($latestPosts as $lp)
      <a href="{{ route('blog.post', $lp->slug) }}" class="tilt group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-soft">
        <img class="h-48 w-full object-cover group-hover:scale-105 transition" src="{{ $lp->image ?? 'https://source.unsplash.com/800x500/?blog' }}" alt="" />
        <div class="p-5">
          <div class="flex items-center gap-2 text-[10px] uppercase tracking-wide">
            <span class="px-2 py-1 rounded-full bg-emerald-500/90">{{ $lp->type ?? 'Post' }}</span>
            <span class="text-slate-400">{{ $lp->created_at->format('M Y') }}</span>
          </div>
          <h3 class="mt-2 font-semibold text-lg">{{ $lp->title }}</h3>
          <p class="mt-1 text-sm text-slate-300 line-clamp-2">{{ $lp->excerpt }}</p>
          <div class="mt-4 flex items-center justify-between text-xs text-slate-400">
            <span>&nbsp;</span>
            <span class="text-sky-400 group-hover:text-sky-300">Read →</span>
          </div>
        </div>
      </a>
      @empty
      <p class="text-slate-400">No posts yet.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- Newsletter CTA (kept static) -->
<section class="py-16 bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="zoom-in">
    <div class="rounded-3xl p-8 sm:p-12 bg-gradient-to-r from-indigo-600 via-fuchsia-600 to-sky-600 shadow-glow">
      <div class="grid lg:grid-cols-2 gap-8 items-center">
        <div>
          <h3 class="text-2xl sm:text-3xl font-extrabold">Get the best posts in your inbox</h3>
          <p class="mt-2 text-slate-100/90">No spam. Just high-signal reads.</p>
        </div>
        <form class="flex w-full gap-3" onsubmit="return false;">
          <input class="w-full rounded-xl px-4 py-3 text-slate-900" type="email" placeholder="Enter your email" />
          <button class="whitespace-nowrap rounded-xl px-5 py-3 font-semibold bg-slate-900 text-white hover:bg-slate-800">Subscribe</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  new Swiper('.mySwiper', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      640: { slidesPerView: 1.5 },
      1024: { slidesPerView: 2.5 }
    }
  });
</script>
@endpush
