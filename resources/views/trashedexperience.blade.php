@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Experience<a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>
            <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Start year</th>
                  <th>End year</th>
                  <th>Designation</th>
                  <th>Experience Summary</th>
                  <th>Deleted On</th>
                  <th>Restore</th>
                </tr>
              </thead>
              <tbody>
                @foreach($experience_trashed_info as $exp)
                <tr class="success">
                  <td>{{$exp->Company_name}}</td>
                  <td>{{$exp->Start_year}}</td>
                  <td>{{$exp->End_year}}</td>
                  <td>{{$exp->Designation}}</td>
                  <td>{{$exp->Exp_summary}}</td>
                  <td>{{$exp->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/experience/restoretrashed/'.$exp->id) }}">Restore</a></td>
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
