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
                    {!! Form::model($experience, ['method' => 'put','url' => ['/candidate/experience', $experience->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('Company name') !!}
                            {!! Form::text('Company_name', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Company_name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Start year') !!}
                            {!! Form::date('Start_year', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Start_year')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('End year') !!}
                            {!! Form::date('End_year', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'End_year')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Designation') !!}
                            {!! Form::text('Designation', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Designation')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Exp summary') !!}
                            {!! Form::textarea('Exp_summary', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Exp_summary')) !!}
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