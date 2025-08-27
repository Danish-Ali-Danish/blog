@extends('layouts.frontend')

@section('content')
<section class="pt-20 pb-16 bg-slate-950">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-extrabold">Categories</h1>
      <p class="mt-2 text-slate-400">Browse all topics and discover articles by category.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($categories as $category)
        <a href="{{ route('blog.index',['category' => $category->slug]) }}" 
           class="group block rounded-2xl overflow-hidden bg-white/5 ring-1 ring-white/10 hover:bg-white/10 p-6">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-indigo-500/20 flex items-center justify-center">
              <i class="{{ $category->icon ?? 'bx bx-folder' }} text-2xl text-indigo-400"></i>
            </div>
            <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
          </div>
          <p class="text-slate-400 text-sm">{{ $category->description ?? 'No description yet.' }}</p>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endsection
