<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\user;
use App\Models\category;
use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'In ' . $category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'By ' . $user->name;
        }
        return view('posts', [
            "title" => "All Posts " . $title,
            "active" => "blog",
            "posts" => Post::latest()->filter(request(['search', 'user', 'category']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "single post",
            "active" => "single post",
            "post" => $post
        ]);
    }
}
