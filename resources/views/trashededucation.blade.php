@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Education <a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>
            <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
                <tr>
                  <th>name of university</th>
                  <th>Course</th>
                  <th>Aggregate</th>
                  <th>Deleted On</th>
                  <th>Restore</th>
                </tr>
              </thead>
              <tbody>
                @foreach($education_trashed_info as $edu)
                <tr class="success">
                  <td>{{$edu->name_of_university}}</td>
                  <td>{{$edu->course}}</td>
                  <td>{{$edu->aggregate}}</td>
                  <td>{{$edu->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/education/restoretrashed/'.$edu->id) }}">Restore</a></td>
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
