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

                    {!! Form::model($skill, ['method' => 'put','url' => ['/candidate/skill', $skill->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('Skill') !!}
                            {!! Form::text('skill', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'skill')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Efficiency') !!}
                            {!! Form::text('efficiency', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'efficiency')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Year of experience') !!}
                            {!! Form::date('yoe', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'yoe')) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Save!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection