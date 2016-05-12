@extends('layouts.app')
@section('content')
<div class="col-md-8"> 
  {!! Form::model($task, ['method' => 'put','url' => ['/candidate/languages', $task->id]]) !!}

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

  {!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}
</div>
@endsection