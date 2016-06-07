@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Restore Language <a class="navbar-brand" href="{{ url('/') }}">
                    Go back
                </a></h1>

                <b><a style="color:red;" href="{{ url('/candidate/deleteall/languages') }}">Delete All Permanently</a></b>
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
                @foreach($language_trashed_info as $lang)
                <tr class="success">
                  <td>{{$lang->Language}}</td>
                  <td>{{$lang->Level_of_fluency}}</td>
                  <td>{{$lang->deleted_at}}</td>
                  <td><a  style="display:inline-block;padding:right:10px;" title="Click restore trashed values!" href="{{ url('/candidate/languages/restoretrashed/'.$lang->id) }}">Restore</a></td>
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
