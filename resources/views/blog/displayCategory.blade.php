@extends('main')

@section('title', '| About')

@section('content')

	<h1>{{ $category->name }}</h1>
	<hr>

	<div class="row">
		
		@foreach ($posts as $post)

			<div class="col-md-4 col-sm-6">
				<div class="blog-post">
				
					<div class="post-info">
						<div class="post-date">
							<div class="date">{{ date('M j, Y', strtotime($post->created_at)) }}</div>
						</div>
						<div class="post-comments-count">
							<a href="page-blog-post-right-sidebar.html" title="Show Comments"><i class="glyphicon glyphicon-comment icon-white"></i>{{ $post->comments()->count() }}</a>
						</div>
					</div>
				
					@if ($post->image === null) 
					@else 
						<a href="{{ route('blog.single', $post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="post-image" /></a>
					@endif
				
					<div class="post-title">
						<h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
					</div>
					<div class="post-summary">
						<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>
					</div>
				
					<div class="post-more">
						<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-small btn-primary">Read more</a>
					</div>
				</div>
			</div>
		@endforeach

		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					{!! $posts->links() !!}
				</div>
			</div>
		</div>
	</div>
	    
@endsection
