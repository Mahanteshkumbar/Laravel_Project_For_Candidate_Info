@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body"> 
                    <h1>Upload form</h1>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    {!! Form::open(['url'=>'/candidate/fileupload','method'=>'POST', 'files'=>true]) !!}

                    <div class="form-group">                      
                        {!! Form::label('File') !!}
                        {!! Form::file('image', null) !!} 
                    </div>
                  {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection