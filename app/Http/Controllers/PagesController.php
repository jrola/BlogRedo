<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() 
	{
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		$popularPosts = Post::orderBy('created_at', 'desc')->limit(6)->get();
		$displayCategory = Category::all();
		$tags = Tag::all();

		$data = [];
		$data['posts'] = $posts;
		$data['popularPosts'] = $popularPosts;
		$data['displayCategory'] = $displayCategory;
		$data['tags'] = $tags;

		return view('pages.welcome')->withData($data);
	}

	public function getAbout() 
	{
		$first = 'Jack';
		$last = 'Rola';

		$fullname = $first . " " . $last;
		$email = 'test@test.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() 
	{
		return view('pages.contact');
	}

	public function postContact(Request $request) 
	{
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@test.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}

	public function displayCat($id)
	{
		$category = Category::find($id);

		$posts = Post::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
								  
    	return view('blog.displayCategory', compact('posts', 'category'));
	}

	public function displayTag($id)
	{
		$tag = tag::find($id);

		$posts = Post::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
								  
    	return view('blog.displayCategory', compact('posts', 'category'));
	}
}