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
        <div class="col-lg-8">
            @foreach($data['posts'] as $post)
                <article>
                    <div class="post-image">
                        <div class="post-heading">
                            <h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
                        </div>
                        <a href="{{ route('blog.single', $post->slug) }}">
                            @if ($post->image === null) 
                            @else 
                                <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" />
                            @endif
                        </a>
                    </div>
                    <p>{{ substr(strip_tags($post->body), 0, 295) }}{{ strlen(strip_tags($post->body)) > 295 ? "..." : "" }}</p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                            <li><a href="#"> {{ date('M j, Y', strtotime($post->created_at)) }}</a></li>
                            <li><a href="#"> Admin</a></li>
                            <li><a href="#"> Blog</a></li>
                            <li><a href="#"> {{ $post->comments()->count() }} Comments</a></li>
                        </ul>
                        <a href="{{ route('blog.single', $post->slug) }}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="col-lg-4">
            <aside class="right-sidebar">
                <div class="widget">
                    {!! Form::open(array('route' => 'queries.search', 'data-parsley-validate' => '', 'class'=>'form-search')) !!}
                        {!! Form::text('search', null, array('required', 'class'=>'form-control searchForm', 'placeholder'=> 'Search..')) !!}
                    {!! Form::close() !!}
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Categories</h5>
                    <ul class="cat">
                        @foreach($data['displayCategory'] as $category)
                            <li><a href="{{ route('catLists', $category->id) }}">{{ $category->name }}</a> ({{ $category->posts()->count() }})</li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="recent">
                        @foreach($data['popularPosts'] as $post)
                        <li>
                            <a class="pull-left" href="{{ route('blog.single', $post->slug) }}">
                                @if ($post->image === null) 
                                @else 
                                    <img class="media-object" src="{{ asset('images/' . $post->image) }}">
                                    @endif
                                </a>
                            <h6><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h6>
                            <p>
                                {{ substr(strip_tags($post->body), 0, 70) }}{{ strlen(strip_tags($post->body)) > 70 ? "..." : "" }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Popular tags</h5>
                    <ul class="tags">
                        @foreach ($data['tags'] as $tag)
                            <li><a href="{{ route('tagLists', $tag->id) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
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

