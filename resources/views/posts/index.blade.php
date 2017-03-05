@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>All Posts</h1>
			<hr>
		</div>
	</div>

	<div id="posts">
		<div class="row">
			<div class="col-md-4">
				<input class="search form-control" placeholder="Search" />
			</div>
			<div class="col-md-2">
				<button class="sort btn btn-primary" data-sort="title">Sort by title</button>
			</div>
			<div class="col-md-2">
				<button class="sort btn btn-primary" data-sort="created_at">Sort by date created</button>	
			</div>
			<div class="col-md-4">
				<a href="{{ route('posts.create') }}" class="btn btn-block btn-primary btn-h1-spacing">Create New Post</a>
			</div>
		</div>
		
	  	<div class="row">	
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created At</th>
						<th></th>
					</thead>
					<tbody class="list">
						@foreach ($posts as $post)
							<tr>
								<td>{{ $post->id }}</th>
								<td class="title">{{ substr(strip_tags($post->title),0, 60) }}{{ strlen(strip_tags($post->title)) > 60 ? "..." : "" }}</td>
								<td class="body">{{ substr(strip_tags($post->body), 0, 60) }}{{ strlen(strip_tags($post->body)) > 60 ? "..." : "" }}</td>
								<td class="created_at">{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					<ul class="pagination"></ul>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    
@endsection
