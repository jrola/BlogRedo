<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Post;

class QueryController extends Controller
{
    public function search(Request $request)
	{
    	// Gets the query string from our form submission 
    	$query = $request->input('search');


    	$this->validate($request, array( 'search' => 'required'));

    	$posts = Post::where('title', 'LIKE', '%' . $query . '%')
    							   ->orWhere('body', 'LIKE', '%' . $query . '%')
    							   ->paginate();

    	// returns a view and passes the view the list of articles and the original query.
    	return view('blog.search', compact('posts', 'query'));
 	}
}
