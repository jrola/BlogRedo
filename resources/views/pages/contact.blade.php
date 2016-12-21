@extends('main')

@section('title', '| Contact')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <iframe
                    width="100%"
                    height="350"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDdGsLyDL2M3wkyhsw1XzX8ff-knIwcbEI
                    &q=Cumberland+RI" allowfullscreen>
                </iframe>
                
                {!! Form::open(['url' => 'contact', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                    {{ Form::label('email', 'Email:', ['class' => 'marginTop']) }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'email']) }}

                    {{ Form::label('subject', 'Subject:', ['class' => 'marginTop']) }}
                    {{ Form::text('subject', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('message', 'Message:', ['class' => 'marginTop']) }}
                    {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => '']) }}

                     {!! Form::submit('Send Message',array('class'=>'btn btn-primary btn-h1-spacing')) !!}

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