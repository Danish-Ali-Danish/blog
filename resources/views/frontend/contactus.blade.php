@extends('layouts.frontend')

@section('content')
<section class="pt-28 pb-20 noise bg-hero-gradient">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold mb-6">Contact</h1>
    <form action="#" method="POST" class="space-y-4 max-w-xl">
      @csrf
      <input class="w-full rounded-xl px-4 py-3 text-slate-900" placeholder="Your name" />
      <input class="w-full rounded-xl px-4 py-3 text-slate-900" placeholder="Your email" />
      <textarea class="w-full rounded-xl px-4 py-3 text-slate-900" rows="4" placeholder="Message"></textarea>
      <button class="rounded-xl px-5 py-3 font-semibold bg-slate-900 text-white hover:bg-slate-800">Send</button>
    </form>
  </div>
</section>



@endsection
