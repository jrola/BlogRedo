@extends('main')

@section('title', '| Forgot my Password')

@section('content')

	<div class="row">
		<div id="registerbox" style=" margin-top: 5%;" class="mainbox col-md-6 col-md-offset-3">
	        <div class="panel panel-info">
	        	

	            <div class="panel-heading">
	                <div class="panel-title">Reset Password</div>
	            </div>  
	            <div class="panel-body" >
	            	@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

	            	{!! Form::open(array('url' => 'password/email', 'method' => "POST", 'class' => 'form-horizontal')) !!}

	                    <div class="form-group">	
	                    	{{ Form::label('email', 'Email Address:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
	                        </div>
	                    </div>

	                    <div class="form-group">                                    
	                        <div class="col-md-offset-3 col-md-9">

	                        	{{ Form::submit('Reset Password', ['class' => 'btn btn-primary', 'style' => 'float:right; padding-right: 20px; padding-left: 20px']) }}
	                        </div>
	                    </div>

	                {!! Form::close() !!}
	             </div>
	        </div>  
	    </div>
    </div>

@endsection