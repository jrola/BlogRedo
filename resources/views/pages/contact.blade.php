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
                <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d7889.40621095499!2d-70.23299216136742!3d8.624475075086659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d8.626995899999999!2d-70.2301559!5e0!3m2!1ses-419!2sve!4v1456756695234" style="border:0" allowfullscreen="" frameborder="0" height="300" width="100%"></iframe>
                
                {!! Form::open(['url' => 'contact', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                    {{ csrf_field() }}
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'email']) }}

                    {{ Form::label('subject', 'Subject:') }}
                    {{ Form::text('subject', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('message', 'Message:') }}
                    {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => '']) }}

                     {!! Form::submit('Send Message',array('class'=>'btn btn-primary btn-h1-spacing ')) !!}

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