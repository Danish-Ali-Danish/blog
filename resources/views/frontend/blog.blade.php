@extends('layouts.frontend')

@section('content')
<section class="pt-24 pb-12 bg-slate-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between mb-6">
      <h1 class="text-2xl sm:text-3xl font-bold">All Articles</h1>
      
      <form method="GET" class="flex gap-3">
        <select name="category" class="rounded-xl bg-white/5 ring-1 ring-white/10 px-3 py-2 text-sm text-slate-200">
          <option value="">All Categories</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->slug }}" @selected(request('category')===$cat->slug)>{{ $cat->name }}</option>
          @endforeach
        </select>
        <input name="search" value="{{ request('search') }}" class="rounded-xl bg-white/5 ring-1 ring-white/10 px-3 py-2 text-sm text-slate-200" placeholder="Search..." />
        <button class="rounded-xl px-4 py-2 font-semibold bg-slate-900 ring-1 ring-white/15">Filter</button>
      </form>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($posts as $post)
      <article class="group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-soft">
        <img class="h-48 w-full object-cover group-hover:scale-105 transition" src="{{ $post->image ?? 'https://source.unsplash.com/800x500/?blog' }}" alt="" />
        <div class="p-5">
          <div class="flex items-center gap-2 text-[10px] uppercase tracking-wide">
            <span class="px-2 py-1 rounded-full bg-indigo-500/90">{{ $post->type ?? 'Post' }}</span>
            <span class="text-slate-400">{{ optional($post->category)->name }}</span>
          </div>
          <h3 class="mt-2 font-semibold text-lg">
            <a href="{{ route('blog.post', $post->slug) }}">{{ $post->title }}</a>
          </h3>
          <p class="mt-1 text-sm text-slate-300 line-clamp-2">{{ $post->excerpt }}</p>
        </div>
      </article>
      @endforeach
    </div>

    <div class="mt-10">
      {{ $posts->links() }}
    </div>
  </div>
</section>
@endsection
