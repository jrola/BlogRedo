@extends('main')

@section('title', '| Homepage')


@section('jumbotron')

    <div class="jumbotron">
        <h2 class="text-center">Welcome to my blog</h2>
        <p class="text-center">This is the place to be</p>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'queries.search', 'class'=>'navbar-form')) !!}

                {!! Form::text('search', null, array('required', 'class'=>'form-control', 'placeholder'=>'Search for...')) !!}
                {!! Form::submit('Search',array('class'=>'btn btn-primary ')) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header">Featured Posts</h2>

            @foreach($data['posts'] as $post)
                <div class="postContainer">
                    <h2>
                        <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                    </h2>

                    <p class="post-comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</p>

                    <p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}</p>

                    <a href="{{ route('blog.single', $post->slug) }}">
                    @if ($post->image === null) 
                    @else 
                        <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" />
                    @endif
                    </a>
                    
                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>

                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
            
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
        <h2 class="page-header">Popular Articles</h2>
            <div class="well">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($data['popularPosts'] as $post)
                
                            <h3>
                                <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            <a href="{{ route('blog.single', $post->slug) }}">
                                @if ($post->image === null) 
                                @else 
                                    <img class="img-responsive" src="{{ asset('images/' . $post->image) }}"/>
                                @endif
                            </a>
                 
                        @endforeach
                    </div>  
                </div>
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        </div>
    </div>

 <a href="/blog" class="btn btn-success btn-block btnMorePosts">View More Posts<span class="glyphicon glyphicon-chevron-right"></span></a>

@endsection
