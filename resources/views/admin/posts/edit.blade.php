@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">New Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Title" class="w-full border p-2">
        <textarea name="body" rows="6" placeholder="Body" class="w-full border p-2"></textarea>

        <select name="category_id" class="w-full border p-2">
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <input type="file" name="image" class="w-full border p-2">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
