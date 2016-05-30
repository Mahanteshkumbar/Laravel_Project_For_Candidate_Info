@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
             <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Advanced Job Search</div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'candidate/advancejobsearch']) !!}
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
                            {!! Form::label('Salary') !!}
                            {!! Form::text('job_salary', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'job_salary')) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('Contract type') !!}
                            {!! Form::text('Contract_type', null, 
                                array(
                                'class'=>'form-control', 
                                      'placeholder'=>'Contract_type')) !!}
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
            <div class="panel panel-primary">
                <div class="panel-heading">Search Job</div>
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
            <p><b>Location:</b>{{$jobpost->location}}</p>                          
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