@extends('main')

@section('title', '| Blog')

@section('content')


	<div class="row">
		<div class="col-md-10">
	
			@foreach ($posts as $post)
				<div class="row">
					<div class="col-md-12 col-md-offset-1 postContainer" >
					<h2>{{ $post->title }}</h2>
						<p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}</p>
						
						@if ($post->image === null) 
			            @else 
			            	<img src="{{ asset('images/' . $post->image) }}" class="postImage" />
			            @endif
						
						<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

						<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
						
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
	</div>


@foreach ($posts as $post)

	<div class="row"> 
	    <div class="col-xs-12 col-sm-3 col-md-3">
	    @if ($post->image === null) 
			            @else 
			            	<img src="{{ asset('images/' . $post->image) }}" class="img-responsive img-thumbnail" />
			            @endif
	    
	    </div> 
	    <div class="col-xs-12 col-sm-9 col-md-9">
	        <h2>{{ $post->title }}</h2>
			<p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}</p>
			<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>
	    </div> 
	</div>

	<hr>	

@endforeach


@foreach ($posts as $post)

  
    <div class="col-md-10 postContainer">
    	<h2>{{ $post->title }}</h2>
		@if ($post->image === null) 
			            @else 
			            	<img src="{{ asset('images/' . $post->image) }}" class="pull-left margin10 img-thumbnail blogimage" />
			            @endif


   
        
         	<p>
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
             ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only 
             five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
             of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
             Lorem Ipsum.
             </p>
       
        <a class="btn btn-primary" href="http://bootsnipp.com/user/snippets/2RoQ">READ MORE</a> 
    </div>
     


@endforeach










@endsection
