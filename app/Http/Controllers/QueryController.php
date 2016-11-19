<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class QueryController extends Controller
{
    public function search(Request $request)
	{
    	// Gets the query string from our form submission 
    	$query = $request->input('search');

    	$posts = DB::table('posts')->where('title', 'LIKE', '%' . $query . '%')
    							   ->orWhere('body', 'LIKE', '%' . $query . '%')
    							   ->paginate(10);

    	// returns a view and passes the view the list of articles and the original query.
    	return view('blog.search', compact('posts', 'query'));
 	}
}
