@extends('main')

@section('title', '| Search')

@section('content')

	<h1>Search results for "{{ $query }}"</h1>
	<hr>

	<div class="row">
		
		@foreach ($posts as $post)

			<div class="col-md-4 col-sm-6">
				<div class="blog-post">
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
	</div>

@endsection