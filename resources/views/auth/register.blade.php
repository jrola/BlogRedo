@extends('main')

@section('title', '| Register')

@section('content')
	
	<div class="row">
		<div id="registerbox" style=" margin-top:5%;" class="mainbox col-md-6 col-md-offset-3">
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <div class="panel-title">Register</div>
	                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{ url('auth/login') }}">Sign In</a></div>
	            </div>  
	            <div class="panel-body" >
	            	{!! Form::open(array('class' => 'form-horizontal')) !!}

	                    <div class="form-group">
	                    	{{ Form::label('name', 'Name:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
	                        </div>
	                    </div>
	                                                   
	                    <div class="form-group">
	                    	{{ Form::label('email', 'Email:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::email('email', null, ['class' => 'form-control',  'placeholder' => 'Email Address']) }}
	                        </div>
	                    </div>
	                        
	                    <div class="form-group">
	                    	{{ Form::label('password', 'Password:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
	                        </div>
	                    </div>
	                        
	                    <div class="form-group">
	                    	{{ Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-md-3 control-label']) }}
	                        <div class="col-md-9">
	                        	{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
	                        </div>
	                    </div>

	                    <div class="form-group">                                    
	                        <div class="col-md-offset-3 col-md-9">
	                        	{{ Form::submit('Register', ['class' => 'btn btn-success', 'style' => 'float:right; padding-right: 20px; padding-left: 20px']) }}
	                        </div>
	                    </div>

	                {!! Form::close() !!}
	             </div>
	        </div>  
	    </div>
    </div>

@endsection