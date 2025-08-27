<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalUsers = User::count();
        $totalComments = Comment::count();
        $totalCategories = Category::count();

        // Recent posts
        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts', 
            'totalUsers', 
            'totalComments', 
            'totalCategories', 
            'recentPosts'
        ));
    }
}
