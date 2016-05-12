@extends('layouts.app')
@section('content')

<div class="col-md-8"> 
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

  <!-- <div class="form-group">
      {!! Form::label('Your Message') !!}
      {!! Form::textarea('message', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your message')) !!}
  </div> -->

  <div class="form-group">
      {!! Form::submit('Save', 
        array('class'=>'btn btn-primary')) !!}
  </div>
{!! Form::close() !!}

</div>
@endsection