@extends('layouts.frontend')

@section('content')
<section class="pt-28 pb-20 noise bg-hero-gradient">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold mb-4">About</h1>
    <p class="text-slate-300 leading-relaxed">
      This page uses the same design system as the home page. Replace this text with your actual About content.
    </p>
  </div>
</section>
  <!-- Mission & Vision -->
  <section class="py-16 bg-slate-900/50">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8">
      <div class="bg-white/5 rounded-2xl p-8 ring-1 ring-white/10">
        <h3 class="text-xl font-bold mb-3">Our Mission</h3>
        <p class="text-slate-300">To empower individuals by providing insightful tutorials, guides, and resources in web development and technology. We aim to make knowledge accessible for everyone.</p>
      </div>
      <div class="bg-white/5 rounded-2xl p-8 ring-1 ring-white/10">
        <h3 class="text-xl font-bold mb-3">Our Vision</h3>
        <p class="text-slate-300">To become a trusted global platform for developers and creators where innovation, learning, and collaboration thrive together.</p>
      </div>
    </div>
  </section>

@endsection
