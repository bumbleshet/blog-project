<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(2);
        $userId = Auth::id();
        // return dd($posts);

        $categories = [1 => 'Technology', 2 => 'Health', 3 => 'Tips'];

        return view('home')
            ->with('categories', $categories)
            ->with('posts', $posts)
            ->with('userId', $userId);
    }
}
