@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Jobpost <a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>
                <b><a style="color:red;" href="{{ url('/candidate/deleteall/jobpost') }}">Delete All Permanently</a></b>
            <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Job_cmpny_name</th>
                  <th>Job_title</th>
                  <th>Job_description</th>
                  <th>Job_post_date</th>
                  <th>Job_expiry_date</th>
                  <th>job_salary</th>
                  <th>Employment_type</th>
                  <th>Contract_type</th>
                  <th>Industry</th>
                  <th>Function   </th>
                  <th>Job_experience1 </th>
                  <th>Job_experience2 </th>
                  <th>Job_type</th>
                  <th>Job_qualification</th>                  
                  <th>Deleted On</th>
                  <th>Restore</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jobpost_trashed_info as $jobpost)
                <tr class="success">
                  <td>{{$jobpost->Job_cmpny_name}}</td>
                  <td>{{$jobpost->Job_title}}</td>
                  <td> {{$jobpost->Job_description}}</td>    
                  <td>{{$jobpost->Job_post_date}}</td>
                  <td>{{$jobpost->Job_expiry_date}}</td>
                  <td>{{$jobpost->job_salary}}</td>
                  <td>{{$jobpost->Employment_type}}</td>
                  <td>{{$jobpost->Contract_type}}</td>
                  <td>{{$jobpost->Industry}}</td>
                  <td>{{$jobpost->Function}}</td>       
                  <td>{{$jobpost->Job_experience1}}</td> 
                  <td>{{$jobpost->Job_experience2}}</td> 
                  <td>{{$jobpost->Job_type}}</td> 
                  <td>{{$jobpost->Job_qualification}}</td>                  
                  <td>{{$jobpost->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/jobpost/restoretrashed/'.$jobpost->id) }}">Restore</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
    </div>
</div>           
@endif
@endsection
