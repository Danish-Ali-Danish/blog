@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Posts</h2>
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ New Post</a>

    <table class="table-auto w-full mt-4 border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">Title</th>
                <th class="px-3 py-2">Category</th>
                <th class="px-3 py-2">Author</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="border-b">
                <td class="px-3 py-2">{{ $post->title }}</td>
                <td class="px-3 py-2">{{ $post->category->name }}</td>
                <td class="px-3 py-2">{{ $post->user->name }}</td>
                <td class="px-3 py-2">
                    <a href="{{ route('posts.edit',$post->id) }}" class="text-blue-600">Edit</a> |
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
