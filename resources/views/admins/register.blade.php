@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
                        {!! csrf_field() !!}

                        <!-- <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}"> -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input class="form-control" name="name" placeholder="First Name" required="" type="text" data-parsley-id="4" value="{{ old('name') }}">
                                <!-- @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif -->
                            </div>                            
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">State</label>
                            <div class="col-md-6">
                                <input class="form-control" name="state" placeholder="State" type="text" required="" data-parsley-id="6" value="{{ old('state') }}">
                            </div>
                        </div>


                         <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <input class="form-control" name="city" type="text" data-parsley-id="6" required="" value="{{ old('city') }}">
                            </div>
                        </div>

                       <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" required="" value="{{ old('email') }}">
<!-- 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required="">
<!-- 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"> -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
<!-- 
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                                    