<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Cookie;

class BlogController extends Controller
{
    
    public function getIndex() 
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) 
    {
        // fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();

        $post->view_count += 1;

        $post->save();



        //if ( !Cookie::get('post_viewed') ) 
        //{
            // Update view counter of post
            //$post->view_count = $post->view_count + 1;
            //$post->save();
            // Create a cookie before the response and set it for 30 days
            //Cookie::queue('post_viewed', true, 60 * 24 * 30);
        //}

        // return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }
}