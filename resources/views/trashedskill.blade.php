@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Skills <a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>
                <b><a style="color:red;" href="{{ url('/candidate/deleteall/skill') }}">Delete All Permanently</a></b>
            <div class="table-responsive">
             <div class="table-responsive">
                     <table class="table table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th>Skill</th>
                          <th>Efficiency</th>
                          <th>Year of experience</th>
                          <th>Deleted On</th>
                          <th>Restore</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($skills_trashed_info as $skill)                            
                        <tr class="success">
                          <td>{{$skill->skill}}</td>
                          <td>{{$skill->efficiency}}</td>
                          <td>{{$skill->yoe}}</td>  
                          <td>{{$skill->deleted_at}}</td>
                          <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/skill/restoretrashed/'.$skill->id) }}">Restore</a></td>
                        </tr>                       
                        @endforeach                        
                      </tbody>
                    </table>
                  </div>
          </div>
        </div>
    </div>
</div>           
@endif
@endsection
