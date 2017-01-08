@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-12 postContainer">
			<h2>{{ $post->title }}</h2>
			<p>
             	<span class="glyphicon glyphicon-time"></span> Published: {{ date('M j, Y g:i a', strtotime($post->created_at)) }}
             </p>
			@if ($post->image === null) 
			@else 
				<img src="{{ asset('images/' . $post->image) }}" class="blogImageSingle" />
			@endif
			
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
			
			<div class="socialIcons">
                      
	            <a class="facebook" data-toggle="tooltip" href="http://www.facebook.com/sharer.php?u=http://holomatic-soratemplates.blogspot.in/2016/03/full-width-post-without-sidebar.html&amp;title=Full Width Post Without Sidebar" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Facebook"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>   
	            <a class="twitter" data-toggle="tooltip" href="http://twitter.com/share?url=http://holomatic-soratemplates.blogspot.in/2016/03/full-width-post-without-sidebar.html&amp;title=Full Width Post Without Sidebar" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Twitter"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>

	            <a class="googleplus" data-toggle="tooltip" href="https://plus.google.com/share?url=http://holomatic-soratemplates.blogspot.in/2016/03/full-width-post-without-sidebar.html&amp;title=Full Width Post Without Sidebar" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Google+"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>

	            <a class="pinterest" data-toggle="tooltip" href="http://pinterest.com/pin/create/button/?url=http://holomatic-soratemplates.blogspot.in/2016/03/full-width-post-without-sidebar.html&amp;media=https://1.bp.blogspot.com/-dQBN2UxiXqU/Vupjn7UQgdI/AAAAAAAADY8/y49Bi2v9urM2FcwQqqIA7OmWntqajKusg/s1600/woman-1150067_960_720.jpg&amp;description=Teste Lorem Ipsum is simply dummy text of the printing and typesetting  industry. Lorem Ipsum has be..." onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Pinterest"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>

	            <a class="linkedin" data-toggle="tooltip" href="http://www.linkedin.com/shareArticle?url=http://holomatic-soratemplates.blogspot.in/2016/03/full-width-post-without-sidebar.html&amp;title=Full Width Post Without Sidebar" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank" title="" data-original-title="Share on Linkedin"><i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i></a>
  
           	</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img class="author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=retro" }}">
						<div class="author-name">
							<p>By<span style="color:#0ea6f2;"> {{ $comment->name }}</span><span class="commentSpan">|</span>
							{{ date('F d, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>

					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>

				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'data-parsley-validate' => '',]) }}
				<div class="row">
					<h4>Leave a comment</h4>
					<div class="form-group">
						{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name', 'required' => '']) }}
					</div>

					<div class="form-group">
						{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => '', 'data-parsley-type' => 'email']) }}
					</div>

					<div class="form-group">
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Message', 'required' => '']) }}

						{{ Form::submit('Post Comment', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection