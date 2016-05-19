@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3><a href="{{url('/candidate/searchjobview')}}">Search Job</a></h3>

         @if(count($jobList)>0)                   
            <h3 style="color:green;">Here are some matching jobs!</h3>
            @foreach($jobList as $jobpost)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <h1>All right..</h1> 
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
                        <p><a class="btn btn-primary" >Apply</a></p>
                        <p><a class="btn btn-default" href="{{url('/jobview/'.$jobpost->id)}}">View</a></p>                    
                </div>
            </div>
        </div>
           @endforeach
        @endif

        @if(count($jobList)==0)
            <h3 style="color:red;">Sorry no matching jobs</h3>
        @endif
    </div>
</div>
@endsection
