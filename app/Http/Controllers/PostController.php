<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Input;
use App\Post;

class PostController extends Controller
{
    //

	public function index()
	{
		$categories = [1 => 'Technology', 2 => 'Health', 3 => 'Tips'];

		return view('posts.add-new')
			->with('categories', $categories);
	}

	public function addNewPost(Request $request)
	{
		$rules = [
            'title' => 'required',
            'body' => 'required',
        ];

        $msgs = [
        	'title.required' => 'Post Title is required.',
        	'body.required' => 'Post Content is required.'
        ];

        $validator = Validator::make(Input::all(), $rules, $msgs);

        if($validator->fails()){
            return redirect()->back()
                ->withInput(Input::all())
                ->withErrors($validator);
        }else{

           $post = new Post;
           $post->title = $request->title;
           $post->body = $request->body;
           $post->category_id = $request->category_id;
           $post->user_id = Auth::id();
           $post->save();

        return redirect()->back()
            ->with('msg','New Post Added.');
        }
	}


	public function edit($id)
	{
		
        $post = Post::find($id);

        $categories = [1 => 'Technology', 2 => 'Health', 3 => 'Tips'];
        return view('posts.edit')
            ->with('categories', $categories)
            ->with('post', $post);
            
	}

    public function updatePost(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];

        $msgs = [
            'title.required' => 'Post Title is required.',
            'body.required' => 'Post Content is required.'
        ];

        $validator = Validator::make(Input::all(), $rules, $msgs);

        if($validator->fails()){
            return redirect()->back()
                ->withInput(Input::all())
                ->withErrors($validator);
        }else{

           $post = Post::find($id);
           $post->title = $request->title;
           $post->body = $request->body;
           $post->category_id = $request->category_id;
           $post->save();
        return redirect('/home')
            ->with('msg','Post Updated.');
        }
    }
    

}