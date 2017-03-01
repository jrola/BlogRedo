@extends('main')

@section('title', '| Login')

@section('content')
	
	<div class="row">
	    <div id="loginbox" style="margin-top:15%; margin-bottom: 15%;" class="mainbox col-md-6  col-md-offset-3">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Login</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px">
                        <a href="{{ url('password/reset') }}">Forgot password?</a>
                    </div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    {!! Form::open(array('class' => 'form-horizontal')) !!}   
             
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username or email']) }}                                        
                        </div>
            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
                        </div>
            
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                {{ Form::submit('Login', ['class' => 'btn btn-success', 'style' => 'float:right; padding-right: 20px; padding-left: 20px']) }}          
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                    <a href="{{ url('auth/register') }}">
                                        Register Here
                                    </a>
                                </div>
                            </div>
                        </div>    
        
                    {!! Form::close() !!}    
                </div>                     
            </div>  
        </div>	
	</div>

@endsection