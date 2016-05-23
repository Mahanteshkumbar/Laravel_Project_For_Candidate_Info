@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Hobby <a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>
            <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Award</th>
                  <th>Organisation</th>
                  <th>Year</th>
                  <th>Deleted On</th>
                  <th>Restore</th>
                </tr>
              </thead>
              <tbody>
                @foreach($award_trashed_info as $awds)
                <tr class="success">
                  <td>{{$awds->award}}</td>
                  <td>{{$awds->org}}</td>
                  <td>{{$awds->year}}</td>
                  <td>{{$awds->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/award/restoretrashed/'.$awds->id) }}">Restore</a></td>
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
