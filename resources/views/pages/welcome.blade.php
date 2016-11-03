@extends('main')

@section('title', '| Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
              <h1>Welcome to My Blog!</h1>
              <p class="lead">Thank you so much for visiting. This is my test blog built with Laravel. Please read my popular post!</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div> <!-- end of header .row -->

    <div class="row">
        <h1>Latest Articles</h1>
        <div class="col-md-8">

            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    @if ($post->image === null) 
                    @else 
                        <img src="{{ asset('images/' . $post->image) }}" width="748" height="400"/>
                    @endif
                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>Popular Post</h2>
        </div>
    </div>
@stop
