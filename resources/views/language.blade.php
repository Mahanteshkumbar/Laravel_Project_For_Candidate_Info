@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Languages</div>
                <div class="panel-body">
                  {!! Form::open(['url'=>'candidate/languages']) !!}

                    <div class="form-group">
                        {!! Form::label('Language') !!}
                        {!! Form::text('Language', null, 
                            array('class'=>'form-control', 
                                  'placeholder'=>'Your name')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Level of Fluency') !!}
                        {!! Form::text('Level_of_fluency', null, 
                            array('class'=>'form-control', 
                                  'placeholder'=>'Your e-mail address')) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit('Save', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>

</div>
@endsection