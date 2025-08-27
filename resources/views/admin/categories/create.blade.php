@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Category name" class="w-full border p-2">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
