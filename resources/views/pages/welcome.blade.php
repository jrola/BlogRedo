@extends('main')

@section('title', '| Homepage')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('jumbotron')

    <div class="jumbotron">
        <h2 class="text-center">Welcome to my blog</h2>
        <p class="text-center">This is the place to be</p>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'queries.search', 'data-parsley-validate' => '', 'class'=>'navbar-form')) !!}

                {!! Form::text('search', null, array('required', 'class'=>'form-control searchForm', 'placeholder'=> 'SEARCH THE FORUM...')) !!}
                {!! Form::submit('Search',array('class'=>'btn btn-primary', 'required' => '')) !!}

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

                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            
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
                <h4>Categories</h4>
                <hr>
                <div class="categoryList">
                    @foreach($data['displayCategory'] as $category)
                        <p><a href="{{ route('catLists', $category->id) }}">{{ $category->name }}</a></p>
                        <hr>
                    @endforeach
                </div>
            </div>

            <div class="well">
                <h4>Tags</h4>
                <hr>
                @foreach ($data['tags'] as $tag)
                    <a class="label label-default" href="{{ route('tagLists', $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

 <a href="/blog" class="btn btn-default btn-block btnMorePosts">View All Posts >></a>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection