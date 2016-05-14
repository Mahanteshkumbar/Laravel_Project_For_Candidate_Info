@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Profile</div>
                <div class="panel-body"> 

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::open(['url'=>'candidate/searchjob']) !!}
                        <div class="form-group">
                            {!! Form::label('Search Jobs') !!}
                            {!! Form::text('keywords', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Key wrods')) !!}
                        </div>                       
                        
                        <div class="form-group">
                            {!! Form::submit('Search!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection