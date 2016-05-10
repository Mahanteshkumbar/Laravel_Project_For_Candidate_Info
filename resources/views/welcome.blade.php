@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h1>Side {{ Auth::user()->id }}</h1>
            <!-- <img src="{{URL::asset('img/user-pic.jpg')}}" alt="..." class="img-circle"> -->

        </div>

        <div class="col-md-8">           
            <h1 style="display:inline-block;">{{ Auth::user()->name }}</h1>
            <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/profile/'. Auth::user()->id) }}"><i class="fa fa-pencil"></i></a>

            <div class="row">
                <div class="col-md-6">
                    <!-- <h1>{{ $candidate_details }}</h1> -->
                    <p><b>Current Location:</b> {{$candidate_details->city}} </p>
                    <p><b>Designation:</b> {{$candidate_details->status}}</p>
                    <p><b>Date of Birth:</b> {{$candidate_details->dob}}</p>
                   <!--  •   Current Designation: Not Mentioned
                    •   Current Company: Not Mentioned
                    •   Current Location: Belgaum
                    •   Preferred Location: Bengaluru / Bangalore, Belgaum
                    •   Functional Area: IT Software - Application Programming / Maintenance
                    •   Role: Software Developer
                    •   Industry:IT-Software/Software Services
                    •   Date of Birth: Jul 6, 1990
                    •   Gender: Male
                    •   Total Experience: 1 Year(s) 2 Month(s)
                    •   Annual Salary: Rs. 1 lakh(s)
                    •   Highest Degree: UG Education [B.Tech/B.E.]
                    •   Phone: 8792227920 (Verified)
                    •   Email: mahantesh.kumbar9@gmail.com (Verified)
                    •   Permanent Address: Gangadhar nagar shindoli
                    •   Hometown/City: Belagavi
                    •   Pin Code:590001
                    •   Marital Status: Single/unmarried
                        Key Skills: Angular material,Angular Js,bootstrap3,css3,html5,NodeJs(npm,bower,grunt),PHP,Slim Framework,Respect Validation,GulpJs,MySQL -->


                </div>

                <div class="col-md-6">
                      <p><b>Email:</b> {{$candidate_details->email}}</p>
                      <p><b>Mobile Number:</b>{{$candidate_details->mnum}}</p>
                      <p><b>Last Updated:</b>{{$candidate_details->updated_at}}</p>
                      <p><b>State:</b>{{$candidate_details->state}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Work Experience details</h1>
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experienceview') }}"><i class="fa fa-pencil"></i></a>
                    
                </div>
            </div>
        </div>
 
        <div class="col-md-2">
            <h1>Side</h1>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
