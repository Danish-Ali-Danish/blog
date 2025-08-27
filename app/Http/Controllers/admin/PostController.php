<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category','user')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts','public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $image,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success','Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = $post->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts','public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $image,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','Post deleted successfully');
    }
}
