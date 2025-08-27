<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Home page
    public function home()
    {
        $categories    = Category::orderBy('name')->get();
        
        $featuredPosts = Post::latest()->take(6)->get(); // adjust logic if you have "featured" flag
        $latestPosts   = Post::latest()->take(9)->get();

        return view('frontend.home', compact('categories', 'featuredPosts', 'latestPosts'));
    }

    // Blog listing page
    public function blog(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        $q          = Post::query()->with('category')->latest();

        if ($request->filled('category')) {
            $cat = Category::where('slug', $request->category)->first();
            if ($cat) {
                $q->where('category_id', $cat->id);
            }
        }

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $q->where(function ($qq) use ($term) {
                $qq->where('title', 'like', $term)
                    ->orWhere('excerpt', 'like', $term)
                    ->orWhere('content', 'like', $term);
            });
        }

        $posts = $q->paginate(9)->withQueryString();

        return view('frontend.blog', compact('categories', 'posts'));
    }

    // Single post page
  public function post($slug)
{
    $post = Post::where('slug', $slug)->with('category')->firstOrFail();
    $related = Post::where('category_id', $post->category_id)
                   ->where('id', '!=', $post->id)
                   ->latest()->take(6)->get();

    return view('frontend.blogpostdetail', compact('post', 'related'));
}

    // All categories
    public function blogcategories()
    {
        $categories = Category::all();
        return view('frontend.blogcategories', compact('categories'));
    }


    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contactus');
    }
}
