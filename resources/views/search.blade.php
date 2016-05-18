@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
             <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Advanced Job Search</div>
                <div class="panel-body"> 
                  <!--   @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif -->   

                    {!! Form::open(['url'=>'candidate/searchjob']) !!}
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
                            {!! Form::submit('Advanced Search', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
    </div>
        <div class="col-md-9">
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

    <div class="row">
        @foreach($jobList as $jobpost)  
        <div class="col-md-4">
            <h3 style="color:green;">Here are some matching jobs!</h3>
            <p><b>Job_cmpny_name:</b>{{$jobpost->Job_cmpny_name}}</p>                          
            <p><b>Job_title:</b>{{$jobpost->Job_title}}</p>
            <p><b>Job_description:</b> {{$jobpost->Job_description}}</p>    
            <p><b>Job_post_date:</b> {{$jobpost->Job_post_date}}</p>
            <p><b>Job_expiry_date:</b> {{$jobpost->Job_expiry_date}}</p>
            <p><b>job_salary:</b> {{$jobpost->job_salary}}</p>
            <p><b>Employment_type:</b> {{$jobpost->Employment_type}}</p>
            <p><b>Contract_type:</b> {{$jobpost->Contract_type}}</p>
            <p><b>Industry:</b>  {{$jobpost->Industry}}</p>
            <p><b>Function:</b>  {{$jobpost->Function}}</p>       
            <p><b>Job_experience1:</b> {{$jobpost->Job_experience1}}</p> 
            <p><b>Job_experience2:</b> {{$jobpost->Job_experience2}}</p> 
            <p><b>Job_type:</b> {{$jobpost->Job_type}}</p> 
            <p><b>Job_qualification:</b> {{$jobpost->Job_qualification}}</p> 
        </div>
        @endforeach
    </div>
</div>
@endsection