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
                  <th>Hobby</th>
                  <th>Deleted On</th>
                  <th>Restore</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hobby_trashed_info as $hobby)
                <tr class="success">
                  <td>{{$hobby->hname}}</td>
                  <td>{{$hobby->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/hobby/restoretrashed/'.$hobby->id) }}">Restore</a></td>
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
