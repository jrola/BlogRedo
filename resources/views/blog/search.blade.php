@extends('main')

@section('title', '| Search')

@section('content')

	<h1>Search results for "{{ $query }}"</h1>
	<hr>

    	<div class="col-md-12 form-spacing-top ">
		<div class="row">
		
			@foreach ($posts as $post)

	        	@if ($post->image === null) 
				@else 
					<a href="{{ route('blog.single', $post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="pull-left margin10 img-thumbnail blogimage" /></a>
				@endif

				<h2><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h2>
	        	<p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}</p>

				<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

	        	<div>
	        		<div class="blogbtn"> 
	        			<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More<span class="glyphicon glyphicon-chevron-right"></span></a> 
	        		</div>  
	        	</div> 

	        	<div class="clear"></div> 
	        	<hr>
		
			@endforeach

			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						{!! $posts->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection