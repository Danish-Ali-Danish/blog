@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Categories</h2>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ New Category</a>
    
    <table class="table-auto w-full mt-4 border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">Name</th>
                <th class="px-3 py-2">Slug</th>
                <th class="px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr class="border-b">
                <td class="px-3 py-2">{{ $cat->name }}</td>
                <td class="px-3 py-2">{{ $cat->slug }}</td>
                <td class="px-3 py-2">
                    <a href="{{ route('categories.edit',$cat->id) }}" class="text-blue-600">Edit</a> |
                    <form action="{{ route('categories.destroy',$cat->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
