@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Languages</div>
                <div class="panel-body"> 
                  {!! Form::model($language, ['method' => 'put','url' => ['/candidate/languages', $language->id]]) !!}

                  <div class="form-group">
                      {!! Form::label('Language') !!}
                      {!! Form::text('Language', null, 
                          array('class'=>'form-control', 
                                'placeholder'=>'Languages')) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('Level of Fluency') !!}
                      {!! Form::text('Level_of_fluency', null, 
                          array('class'=>'form-control', 
                                'placeholder'=>'Level_of_fluency')) !!}
                  </div>

                  {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
</div>
@endsection