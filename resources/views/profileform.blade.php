@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">  
                <p>{{$candidate_details}}</p>                  
                     <form class="form-horizontal" role="form" method="PUT" action="{{ url('/candidate/profile/'.Auth::user()->id) }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input class="form-control" name="name" placeholder="First Name" required="" type="text" data-parsley-id="4" value="{{ old('name') }}">
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input class="form-control" name="lname" placeholder="Last Name" type="text" data-parsley-id="6" required="" value="{{ old('lname') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Name</label>
                            <div class="col-md-6">
                                <input class="form-control" name="uname" type="text" data-parsley-id="6" value="{{ old('uname') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mobile Number</label>
                            <div class="col-md-6">
                                <input class="form-control" name="mnum" type="text" data-parsley-id="6" required="" value="{{ old('mnum') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-6">
                                <input class="form-control" name="dob" placeholder="DOB" type="date" required="" value="{{ old('dob') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                 <select class="form-postjob form-control" id="form-status" name="status" required="" data-parsley-id="20" value="{{ old('status') }}">
                                    <option selected="">Fresher</option>
                                    <option>Working</option>
                                    <option>Working On Notice-Period</option>
                                    <option>Not Working</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Country</label>
                            <div class="col-md-6">
                                <select class="form-postjob form-control" id="form-country" name="country" data-parsley-id="22" value="{{ old('country') }}">
                                    <option selected="">
                                        India
                                    </option>
                                </select>                                
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

                         <div class="form-group">
                            <label class="col-md-4 control-label">Aadhar Card Number</label>
                            <div class="col-md-6">
                                <input class="form-control" name="addrno" type="text" data-parsley-id="6" value="{{ old('addrno') }}">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" required="" value="{{ old('email') }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Passport Id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="passportid" value="{{ old('passportid') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Duration of alerts</label>
                            <div class="col-md-6">
                                <select class="form-postjob form-control" id="form-job-alert" name="alerts" data-parsley-id="32" value="{{ old('alerts') }}">
                                    <option selected="">
                                        daily
                                    </option>
                                    <option>
                                        weekly
                                    </option>
                                    <option>
                                        2 weeks
                                    </option>
                                    <option>
                                        monthly
                                    </option>
                                </select>
                            </div>
                        </div>                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Save Changes
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