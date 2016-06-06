@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body"> 

                     @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::model($hobby, ['method' => 'put','url' => ['/candidate/hobby', $hobby->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('Hobby') !!}
                            {!! Form::text('hname', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'hobby')) !!}
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