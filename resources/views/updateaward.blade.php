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
                   {!! Form::model($award, ['method' => 'put','url' => ['/candidate/award', $award->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('Award') !!}
                            {!! Form::text('award', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Organisation') !!}
                            {!! Form::text('org', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Organisation')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Year') !!}
                            {!! Form::date('year', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Year')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tag_List') !!}
                            {!! Form::select('tag_List[]', $tags, null, 
                                array('class'=>'form-control','multiple'=>'multiple')) !!}
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