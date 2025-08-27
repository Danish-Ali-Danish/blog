@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Category</h2>

    <form action="{{ route('categories.update',$category->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" class="w-full border p-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
