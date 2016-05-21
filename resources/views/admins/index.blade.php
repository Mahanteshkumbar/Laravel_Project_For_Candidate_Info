@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome Admin</div>
                <div class="panel-body">
                     @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    {{auth()->guard('admin')->user()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                                    