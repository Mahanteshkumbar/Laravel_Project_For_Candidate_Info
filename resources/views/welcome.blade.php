@extends('layouts.app')
@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @foreach($Image_path as $imgp)
                {{ Html::image($imgp->imagepath, 'logo',array( 'width' => 70, 'height' => 70, 'class' => 'img-circle' )) }}
            @endforeach
            
            @if(count($Image_path) == 0)
            <h3><a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/imageuplview') }}">Add Image</a></h3>
            @endif         

            @if(count($Image_path) > 0)            
                @foreach($Image_path as $imgp)
                <br>
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/imageupload/'.$imgp->id) }}"><i class="fa fa-pencil"></i></a>

                        <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/candidate/del/imageupload',$imgp->id]
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                        </p>
                @endforeach
            @endif
            <!-- <img src="{{url('images\1.png')}}" alt="..." class="img-circle"> -->
            
        </div>

        <div class="col-md-8">           
            <h1 style="display:inline-block;">{{ Auth::user()->name }}</h1>
            <!-- <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/profile/'. Auth::user()->id) }}"><i class="fa fa-pencil"></i></a> -->

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
                    <h1>Work Experience details
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experienceview') }}">Add New</a></h1>

                        <ul>
                            @foreach($experience_info as $exp)
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$exp->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/experience',$exp->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p> 
                                <p><b>Company Name:</b>{{$exp->Company_name}}</p> 
                                    <p><b>Start year:</b>{{$exp->Start_year}}</p>  
                                    <p><b>End year:</b> {{$exp->End_year}}</p> 
                                    <p><b>Designation:</b> {{$exp->Designation}}</p>  
                                    <p><b>Experience Summary:</b> {{$exp->Exp_summary}} </p>
                                                     
                            @endforeach     
                        </ul>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Education Details
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/educationview') }}">Add New</a></h1>
                    <ul>
                            @foreach($education_info as $edu)                                                
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$edu->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/education',$edu->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p> 
                                <p><b>name of university:</b> {{$edu->name_of_university}}</p>
                                <p><b>Course:</b>{{$edu->course}}</p>
                                <p><b>Aggregate:</b>{{$edu->aggregate}}</p>                                                  
                            @endforeach     
                        </ul>                                         
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <h1>Languages <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/languagesview') }}">Add New</a></h1>                       

                        <!-- {{$languages_info}} -->
                        <ul>
                            @foreach($languages_info as $lang)
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/languages/'.$lang->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/languages',$lang->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p>  
                                <p><b>Language:</b>{{$lang->Language}}</p>
                                <p><b>Level of fluency:</b>{{$lang->Level_of_fluency}} </p>                                                 
                            @endforeach     
                        </ul>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Skills <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skillview') }}">Add New</a></h1>

                     <ul>
                        @foreach($skills_info as $skill)                            
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skill/'.$skill->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/skill',$skill->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                            <p><b>Skill:</b>{{$skill->skill}}</p>
                            <p><b>Efficiency:</b>{{$skill->efficiency}}</p> 
                            <p><b>Year of experience:</b>{{$skill->yoe}}</p>                                                  
                        @endforeach     
                        </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Job Post <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpostview') }}">Add New</a></h1>



                     <ul>
                        @foreach($Jobpost_info as $jobpost)  
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpost/'.$jobpost->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/jobpost',$jobpost->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                                <p><b>Job_cmpny_name:</b>{{$jobpost->Job_cmpny_name}}</p>
                                <p><b>Job_title:</b>{{$jobpost->Job_title}}</p>
                                <p><b>Job_description:</b> {{$jobpost->Job_description}}</p>    
                                <p><b>Job_post_date:</b> {{$jobpost->Job_post_date}}</p>
                                <p><b>Job_expiry_date:</b> {{$jobpost->Job_expiry_date}}</p>
                                <p><b>job_salary:</b> {{$jobpost->job_salary}}</p>
                                <p><b>Employment_type:</b> {{$jobpost->Employment_type}}</p>
                                <p><b>Contract_type:</b> {{$jobpost->Contract_type}}</p>
                                <p><b>Industry:</b>  {{$jobpost->Industry}}</p>
                                <p><b>Function:</b>  {{$jobpost->Function}}</p>       
                                <p><b>Job_experience1:</b> {{$jobpost->Job_experience1}}</p> 
                                <p><b>Job_experience2:</b> {{$jobpost->Job_experience2}}</p> 
                                <p><b>Job_type:</b> {{$jobpost->Job_type}}</p> 
                                <p><b>Job_qualification:</b> {{$jobpost->Job_qualification}}</p>                                                  
                        @endforeach     
                        </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Hobby <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/hobbyview') }}">Add New</a></h1>

                    <ul>
                        @foreach($hobby_info as $hobby)
                              
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/hobby/'.$hobby->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/hobby',$hobby->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>

                                <p><b>Hobby :</b> {{$hobby->hname}}</p>
                                                  
                        @endforeach     
                    </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Awards <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/awardview') }}">Add New</a></h1>

                    <ul>
                        @foreach($award_info as $awds)                           
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/award/'.$awds->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/award',$awds->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>

                            <p><b>Award :</b> {{$awds->award}}</p> 
                            <p><b>Organisation :</b> {{$awds->org}}</p> 
                            <p><b>Year:</b> {{$awds->year}}</p>                                              
                        @endforeach     
                    </ul>

                </div>
            </div>
        </div>
 
        <div class="col-md-2">
            @foreach($File_path as $filep)
             <b>Uploaded Resume</b> : {{$filep->filepath}}            
            @endforeach
            
            @if(count($File_path) == 0)
            <h3><a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/fileuplview') }}">Add File</a></h3>            
            <!-- <img src="{{url('images\1.png')}}" alt="..." class="img-circle"> -->
            @endif         

            @if(count($File_path) > 0)            
                @foreach($File_path as $filep)
                <br>
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/fileupload/'.$filep->id) }}"><i class="fa fa-pencil"></i></a>

                        <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/candidate/del/fileupload',$filep->id]
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                        </p>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search Job</div>
                <div class="panel-body">
                    <h1><a href="{{url('/candidate/searchjobview')}}">Search Job</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
