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

                    <p><span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y', strtotime($post->created_at)) }}</p>

                    <a href="{{ route('blog.single', $post->slug) }}">
                    @if ($post->image === null) 
                    @else 
                        <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" />
                    @endif
                    </a>
                    
                    <p class="bodyPost">{{ substr(strip_tags($post->body), 0, 295) }}{{ strlen(strip_tags($post->body)) > 295 ? "..." : "" }}</p>

                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                    
                    <div class="socialIcons">

                        <a class="facebook" data-toggle="tooltip" href="http://www.facebook.com/sharer.php?u={{ route('blog.single', $post->slug) }}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Facebook"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>    
                    
                        <a class="twitter" data-toggle="tooltip" href="http://twitter.com/share?url={{ route('blog.single', $post->slug) }}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Twitter"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>

                        <a class="googleplus" data-toggle="tooltip" href="https://plus.google.com/share?url={{ route('blog.single', $post->slug) }}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Google+"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>

                        <a class="pinterest" data-toggle="tooltip" href="http://pinterest.com/pin/create/button/?url={{ route('blog.single', $post->slug) }}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Pinterest"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>

                        <a class="linkedin" data-toggle="tooltip" href="http://www.linkedin.com/shareArticle?url={{ route('blog.single', $post->slug) }}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Linkedin"><i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i></a>

                    </div>     
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
                        <p><a href="{{ route('catLists', $category->id) }}">{{ $category->name }}</a><span class="categoryListSpan">({{ $category->posts()->count() }})</span></p>
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