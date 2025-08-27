@extends('layouts.admin') <!-- aapka main layout -->

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
    <p class="text-slate-300 mt-4">Welcome, {{ auth()->user()->name }}!</p>
</div>
@endsection
