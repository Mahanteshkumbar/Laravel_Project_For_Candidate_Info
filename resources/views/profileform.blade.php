@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">  
                <!-- <p>{{$task}}</p>    -->
                    {!! Form::model($task, ['method' => 'put','url' => ['/candidate/profile', $task->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('First Name') !!}
                                {!! Form::text('name', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'name')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Last Name') !!}
                                {!! Form::text('lname', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'lname')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('User Name') !!}
                                {!! Form::text('uname', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'uname')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Mobile Number') !!}
                                {!! Form::text('mnum', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'mnum')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('DOB') !!}
                                {!! Form::date('dob', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'dob')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Status') !!}
                                {!! Form::select('status', ['Fresher'=>'Fresher','Working'=>'Working','Working-On-Notice-Period'=>'Working On Notice-Period','Not Working'], 'status', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Country') !!}
                                {!! Form::text('country', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'Country')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('State') !!}
                                {!! Form::text('state', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'State')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('City') !!}
                                {!! Form::text('city', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'City')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Aadhar Card Number') !!}
                                {!! Form::text('addrno', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'Aadhar Card Number')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('E-Mail Address') !!}
                                {!! Form::email('email', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'E-Mail Address')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Passport Id') !!}
                                {!! Form::text('passportid', null, 
                                    array('class'=>'form-control', 
                                          'placeholder'=>'Passport Id')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Status') !!}
                                {!! Form::select('alerts', ['dialy','weekly','weekly','2 weeks','monthly'], 'alerts', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Update!', 
                                  array('class'=>'btn btn-primary')) !!}
                            </div>
                    {!! Form::close() !!}               
                     <!-- <form class="form-horizontal" role="form" method="PUT" action="{{ url('/candidate/profile/'.Auth::user()->id) }}">
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
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection