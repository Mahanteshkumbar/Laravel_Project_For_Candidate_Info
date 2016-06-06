@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body"> 
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    {!! Form::model($education,['method' => 'put','url' => ['/candidate/education', $education->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('name_of_university') !!}
                            {!! Form::text('name_of_university', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'name_of_university')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('course') !!}
                            {!! Form::text('course', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'course')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Aggregate') !!}
                            {!! Form::text('aggregate', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'course')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection