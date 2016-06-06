@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Welcome Admin</div>
                <div class="panel-body">                    
                    <p>{{auth()->guard('admin')->user()}} </p>


                    <h1 style="color:green;">** Registered Users List **</h1>   
                    <p><b style="color:red;">{{$registeredUser}}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                                    