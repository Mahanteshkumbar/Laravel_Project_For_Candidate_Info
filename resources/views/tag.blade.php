@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Tag</div>
                <div class="panel-body"> 
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::open(['url' => '/candidate/tag']) !!}
                        <div class="form-group">
                            {!! Form::label('Add new tag') !!}
                            {!! Form::text('Name', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Tag')) !!}
                        </div>                       
                        
                        <div class="form-group">
                            {!! Form::submit('Save!', 
                              array('class'=>'btn btn-primary','value'=>'Register')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

