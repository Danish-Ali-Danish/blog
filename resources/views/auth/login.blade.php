@extends('auth.app')

@section('title', 'Login — MyBlog')

@section('content')
<div class="bg-gradient-to-br from-slate-900 via-slate-950 to-black text-slate-100 font-sans flex items-center justify-center min-h-screen">
  <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-8 w-full max-w-md shadow-2xl border border-white/20">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-indigo-400 to-sky-400 bg-clip-text text-transparent">Login</h1>
      <p class="text-slate-300 text-sm">Welcome back! Please login to your account.</p>
    </div>
    <form action="{{ route('login') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block mb-1 text-sm">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
        <label class="block mb-1 text-sm">Password</label>
        <input type="password" name="password" class="w-full px-4 py-3 rounded-xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
      </div>
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center gap-2">
          <input type="checkbox" class="w-4 h-4"> Remember me
        </label>
        <a href="#" class="text-sky-400 hover:text-sky-300">Forgot Password?</a>
      </div>
      <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-sky-600 hover:opacity-90 px-6 py-3 rounded-xl text-white flex justify-center items-center gap-2 shadow-lg">
        <i class='bx bx-log-in'></i> Login
      </button>
    </form>
    <p class="mt-6 text-center text-sm text-slate-300">Don't have an account? 
      <a href="{{ route('register') }}" class="text-sky-400 hover:text-sky-300">Register</a>
    </p>
  </div>
</div>
@endsection
