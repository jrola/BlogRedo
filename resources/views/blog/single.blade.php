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
			<div class="fb-share-button" data-href="http://icloudpicture.com/nature/winter-trees-nature-snow-wallpaper" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
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