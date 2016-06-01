@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">     
        <hr>          
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center" style="color:white;">Description of Job</div>
                    <div class="panel-body text-justify">                        
                        <p><b>Job_cmpny_name:</b>{{$jobLists->Job_cmpny_name}}</p>
                        <p><b>Location:</b>{{$jobLists->location}}</p>
                        <p><b>Job_title:</b>{{$jobLists->Job_title}}</p>
                        <hr>
                        <p><b>Job_description:</b> {{$jobLists->Job_description}}</p>    
                        <p><b>Job_post_date:</b> {{$jobLists->Job_post_date}}</p>
                        <p><b>Job_expiry_date:</b> {{$jobLists->Job_expiry_date}}</p>
                        <p><b>job_salary:</b> {{$jobLists->job_salary}}</p>
                        <hr>
                        <p><b>Employment_type:</b> {{$jobLists->Employment_type}}</p>
                        <p><b>Contract_type:</b> {{$jobLists->Contract_type}}</p>
                        <p><b>Industry:</b>  {{$jobLists->Industry}}</p>
                        <p><b>Function:</b>  {{$jobLists->Function}}</p>  
                        <hr>     
                        <p><b>Job_experience1:</b> {{$jobLists->Job_experience1}}</p> 
                        <p><b>Job_experience2:</b> {{$jobLists->Job_experience2}}</p> 
                        <p><b>Job_type:</b> {{$jobLists->Job_type}}</p> 
                        <p><b>Job_qualification:</b> {{$jobLists->Job_qualification}}</p>
                        <hr> 
                        <p><a class="btn btn-primary" >Apply</a></p>
                    </div>
                </div>
            </div>    
        <hr>
    </div>
</div>
@endsection
