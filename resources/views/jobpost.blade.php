@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Jobs</div>
                <div class="panel-body"> 
                  <!--   @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif -->   

                    {!! Form::open(['url'=>'candidate/jobpost']) !!}
                        <div class="form-group">
                            {!! Form::label('Company Name') !!}
                            {!! Form::text('Job_cmpny_name', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Company Name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Location') !!}
                            {!! Form::text('location', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Company Name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job title') !!}
                            {!! Form::text('Job_title', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_title')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job description') !!}
                            {!! Form::text('Job_description', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_description')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job post date') !!}
                            {!! Form::date('Job_post_date', \Carbon\Carbon::now(), 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_post_date')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job expiry date') !!}
                            {!! Form::date('Job_expiry_date', \Carbon\Carbon::now(), 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_expiry_date')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('job salary') !!}
                            {!! Form::text('job_salary', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'job_salary')) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('Employment type') !!}
                            {!! Form::text('Employment_type', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Employment_type')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Contract type') !!}
                            {!! Form::text('Contract_type', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Contract_type')) !!}
                        </div>
       
                        <div class="form-group">
                            {!! Form::label('Industry') !!}
                            {!! Form::text('Industry', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Industry')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Function') !!}
                            {!! Form::text('Function', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Function')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job experience1') !!}
                            {!! Form::text('Job_experience1', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_experience1')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job experience2') !!}
                            {!! Form::text('Job_experience2', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_experience2')) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Job type') !!}
                            {!! Form::text('Job_type', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_type')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Job qualification') !!}
                            {!! Form::text('Job_qualification', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Job_qualification')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection