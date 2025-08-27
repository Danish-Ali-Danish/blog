@extends('layouts.frontend')

@section('content')
<section class="pt-24 pb-12 bg-slate-950">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <article class="prose prose-invert prose-slate max-w-none">
      <h1 class="text-3xl sm:text-4xl font-extrabold mb-2">{{ $post->title }}</h1>
      <div class="text-sm text-slate-400 mb-6">
        <span>{{ optional($post->category)->name }}</span>
        <span class="mx-2">•</span>
        <span>{{ $post->created_at->format('M d, Y') }}</span>
      </div>
      @if($post->image)
        <img class="rounded-2xl w-full mb-6" src="{{ $post->image }}" alt=""/>
      @endif
      <div class="text-slate-200 leading-relaxed">{!! nl2br(e($post->content)) !!}</div>
    </article>

    @if($related->count())
    <div class="mt-12">
      <h2 class="text-xl font-bold mb-4">Related posts</h2>
      <div class="grid sm:grid-cols-2 gap-6">
        @foreach($related as $r)
        <a href="{{ route('blog.post', $r->slug) }}" class="group rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 shadow-soft">
          <img class="h-40 w-full object-cover group-hover:scale-105 transition" src="{{ $r->image ?? 'https://source.unsplash.com/600x400/?blog' }}" alt="" />
          <div class="p-4">
            <p class="text-xs text-slate-300 mb-1">{{ $r->type ?? 'Post' }}</p>
            <h3 class="font-semibold">{{ $r->title }}</h3>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</section>
@endsection
