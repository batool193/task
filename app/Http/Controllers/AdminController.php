<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

class AdminController extends Controller
{

    public function getPosts(Request $request)
    {

        if ($request->has('trashed')) {
            $posts = Post::onlyTrashed()
                ->get();
                return view('posts.index',compact('posts'));

        } else {

            $posts = Post::all();
            $user = Auth::user();
            $postIds = $user->posts()->pluck('id');
            $comments = Comment::whereIn('post_id', $postIds)->get(); 
            return view('posts.index',compact('posts','comments'));
  
        }

       // return view('posts.index',compact('posts','comments'));
    }

  
}
