@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
		  	height: 500,
		  	theme: 'modern',
		  	plugins: 
		  	[
		    	'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		    	'searchreplace wordcount visualblocks visualchars code fullscreen',
		    	'insertdatetime media nonbreaking save table contextmenu directionality',
		    	'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		  	],
		  	toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  	toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		  	image_advtab: true,
		  	templates: 
		  	[
		    	{ title: 'Test template 1', content: 'Test 1' },
		    	{ title: 'Test template 2', content: 'Test 2' }
		  	],
		  	content_css: 
		  	[
		    	'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    	'//www.tinymce.com/css/codepen.min.css'
		  	]
 		});
	</script>

@endsection

@section('content')	

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('slug', 'Slug:', ['class' => 'marginTop']) }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

				{{ Form::label('category_id', 'Category:', ['class' => 'marginTop']) }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach

				</select>


				{{ Form::label('tags', 'Tags:', ['class' => 'marginTop']) }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

				</select>

				{{ Form::label('featured_image', 'Upload a Featured Image', ['class' => 'marginTop']) }}
				{{ Form::file('featured_image') }}

				{{ Form::label('body', "Post Body:") }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
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
