@extends('main')

@section('title', '| Forgot my Password')

@section('content')

	<div class="row">
		<div id="registerbox" style=" margin-top:5%;" class="mainbox col-md-6 col-md-offset-3">
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <div class="panel-title">Reset Password</div>
	            </div>  
	            <div class="panel-body" >
	            	{!! Form::open(array('url' => 'password/reset', 'method' => "POST", 'class' => 'form-horizontal')) !!}
	            		{{ Form::hidden('token', $token) }}
	                                                   
	                    <div class="form-group">
	                    	{{ Form::label('email', 'Email Address:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::email('email', $email, ['class' => 'form-control',  'placeholder' => 'Email Address']) }}
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	{{ Form::label('password', 'New Password:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']) }}
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	{{ Form::label('password_confirmation', 'Confirm New Password:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm New Password']) }}
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