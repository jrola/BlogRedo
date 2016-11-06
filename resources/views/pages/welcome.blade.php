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
            <div class="col-md-8">
                <h1 class="page-header">Latest Articles</h1>

                @foreach($posts as $post)
                    <div class="postBorder">
                    <h2>
                        <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                    </h2>

                    <p>
                        <span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y G:i a', strtotime($post->created_at)) }}
                    </p>
                    @if ($post->image === null) 
                    @else 
                        <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="900" height="300"/>
                    @endif

                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>

                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
                
                </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
@stop
