@extends('main')

@section('title', '| Homepage')

@section('content')

    
    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header">Featured Posts</h2>

            @foreach($posts as $post)
                <div class="postContainer">
                    <h2>
                        <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                    </h2>

                    <p class="post-comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</p>

                    <p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}</p>

                    @if ($post->image === null) 
                    @else 
                        <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="900" height="300"/>
                    @endif
                    
                    <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>

                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
            
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
        <h2 class="page-header">Popular Articles</h2>
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
            </div>

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
