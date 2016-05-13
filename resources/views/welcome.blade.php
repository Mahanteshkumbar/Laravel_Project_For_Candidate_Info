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
                    <h1>Work Experience details
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experienceview') }}">Add New</a></h1>

                        <ul>
                            @foreach($experience_info as $exp)
                                <li>{{$exp->Company_name}} : {{$exp->Start_year}} : {{$exp->End_year}} : {{$exp->Designation}} : {{$exp->Exp_summary}} : 
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$exp->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/languages',$exp->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p>
                                </li>                       
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
                                <li>{{$edu->name_of_university}} : {{$edu->course}} : {{$edu->aggregate}} :  
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$edu->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/education',$edu->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p>
                                </li>                       
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
                                <li>{{$lang->Language}} : {{$lang->Level_of_fluency}} : 
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/languages/'.$lang->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/languages',$lang->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p>
                                </li>                       
                            @endforeach     
                        </ul>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Skills <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skillview') }}">Add New</a></h1>

                     <ul>
                        @foreach($skills_info as $skill)
                            <li>{{$skill->skill}} : {{$skill->efficiency}} : {{$skill->yoe}} : 
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skill/'.$skill->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/skill',$skill->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                            </li>                       
                        @endforeach     
                        </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Job Post <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpostview') }}">Add New</a></h1>



                     <ul>
                        @foreach($Jobpost_info as $jobpost)
                            <li>
                                'Job_title', {{$jobpost->Job_title}}
                                'Job_description', {{$jobpost->Job_description}}     
                                'Job_post_date', {{$jobpost->Job_post_date}}
                                'Job_expiry_date', {{$jobpost->Job_expiry_date}}
                                'job_salary', {{$jobpost->job_salary}}
                                'Employment_type', {{$jobpost->Employment_type}}
                                'Contract_type', {{$jobpost->Contract_type}}
                                'Industry',  {{$jobpost->Industry}}
                                'Function',  {{$jobpost->Function}}       
                                'Job_experience1', {{$jobpost->Job_experience1}}
                                'Job_experience2', {{$jobpost->Job_experience2}}
                                'Job_type', {{$jobpost->Job_type}}
                                'Job_qualification' {{$jobpost->Job_qualification}}

                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpost/'.$jobpost->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/jobpost',$jobpost->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                            </li>                       
                        @endforeach     
                        </ul>

                </div>
            </div>
        </div>
 
        <div class="col-md-2">
            @foreach($File_path as $filep)
             <b>Added</b> : {{$filep->filepath}}            
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
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
