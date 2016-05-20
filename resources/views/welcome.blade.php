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
                        <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Company Name</th>
                              <th>Start year</th>
                              <th>End year</th>
                              <th>Designation</th>
                              <th>Experience Summary</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($experience_info as $exp)
                            <tr class="success">
                              <td>{{$exp->Company_name}}</td>
                              <td>{{$exp->Start_year}}</td>
                              <td>{{$exp->End_year}}</td>
                              <td>{{$exp->Designation}}</td>
                              <td>{{$exp->Exp_summary}}</td>
                              <td>
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$exp->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/experience',$exp->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p> 
                               </td>
                            </tr>  
                            @endforeach                          
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Education Details
                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/educationview') }}">Add New</a></h1>
                   <div class="table-responsive">
                         <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>name of university</th>
                              <th>Course</th>
                              <th>Aggregate</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($education_info as $edu)
                            <tr class="success">
                              <td>{{$edu->name_of_university}}</td>
                              <td>{{$edu->course}}</td>
                              <td>{{$edu->aggregate}}</td>
                              <td>
                                 <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$edu->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/education',$edu->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p> 
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                                        
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <h1>Languages <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/languagesview') }}">Add New</a></h1>                       

                        <div class="table-responsive">
                         <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Level of fluency</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($languages_info as $lang)
                                <tr class="success">
                                    <td>{{$lang->Language}}</td>
                                    <td>{{$lang->Level_of_fluency}}</td>
                                    <td>
                                        <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/languages/'.$lang->id) }}"><i class="fa fa-pencil"></i></a>

                                        <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                            'method' => 'DELETE',
                                            'url' => ['/candidate/del/languages',$lang->id]
                                        ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </p>  
                                    </td>
                                </tr>  
                                @endforeach                          
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Skills <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skillview') }}">Add New</a></h1>
                   <div class="table-responsive">
                     <table class="table table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th>Skill</th>
                          <th>Efficiency</th>
                          <th>Year of experience</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($skills_info as $skill)                            
                        <tr class="success">
                          <td>{{$skill->skill}}</td>
                          <td>{{$skill->efficiency}}</td>
                          <td>{{$skill->yoe}}</td>
                          <td>
                            <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/skill/'.$skill->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/skill',$skill->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                           </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Job Post <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpostview') }}">Add New</a></h1>
                        <div class="table-responsive">
                         <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th>Job_cmpny_name</th>
                                <th>Job_title</th>
                                <th>Job_description</th>
                                <th>Job_post_date</th>
                                <th>Job_expiry_date</th>
                                <th>job_salary</th>
                                <th>Employment_type</th>
                                <th>Contract_type</th>
                                <th>Industry</th>
                                <th>Function   </th>
                                <th>Job_experience1 </th>
                                <th>Job_experience2 </th>
                                <th>Job_type</th>
                                <th>Job_qualification</th>
                                <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($Jobpost_info as $jobpost)
                            <tr class="success">
                              <td>{{$jobpost->Job_cmpny_name}}</td>
                                <td>{{$jobpost->Job_title}}</td>
                                <td> {{$jobpost->Job_description}}</td>    
                                <td>{{$jobpost->Job_post_date}}</td>
                                <td>{{$jobpost->Job_expiry_date}}</td>
                                <td>{{$jobpost->job_salary}}</td>
                                <td>{{$jobpost->Employment_type}}</td>
                                <td>{{$jobpost->Contract_type}}</td>
                                <td>{{$jobpost->Industry}}</td>
                                <td>{{$jobpost->Function}}</td>       
                                <td>{{$jobpost->Job_experience1}}</td> 
                                <td>{{$jobpost->Job_experience2}}</td> 
                                <td>{{$jobpost->Job_type}}</td> 
                                <td>{{$jobpost->Job_qualification}}</td>
                                <td>
                                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/jobpost/'.$jobpost->id) }}"><i class="fa fa-pencil"></i></a>

                                    <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/candidate/del/jobpost',$jobpost->id]
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </p>

                                </td>
                            </tr> 
                            @endforeach                           
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Hobby <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/hobbyview') }}">Add New</a></h1>
                    <div class="table-responsive">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Hobby</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($hobby_info as $hobby)
                        <tr class="success">
                          <td>{{$hobby->hname}}</td>
                          <td><a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/hobby/'.$hobby->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/hobby',$hobby->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h1>Awards <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/awardview') }}">Add New</a></h1>

                    <div class="table-responsive">
                     <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Award</th>
                              <th>Organisation</th>
                              <th>Year</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($award_info as $awds)
                            <tr class="success">
                              <td>{{$awds->award}}</td>
                              <td>{{$awds->org}}</td>
                              <td>{{$awds->year}}</td>
                              <td>
                                <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/award/'.$awds->id) }}"><i class="fa fa-pencil"></i></a>

                                <p style="display:inline-block;padding:right:10px;">{!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/candidate/del/award',$awds->id]
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                </p>

                              </td> 
                            </tr> 
                            @endforeach                           
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="col-md-2">
            @foreach($File_path as $filep)
             <p><b>Uploaded Resume</b></p> 
             <a style="color:blue" href="{{url('/file/download/'.$filep->id)}}">{{$filep->filepath}}</a>            
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
    <div class="col-md-4">
      <h3><a href="{{url('/candidate/searchjobview')}}">Search Job</a></h3>
      <h1><a href="{{url('/dashboard')}}">DI(Dependency Ejection)</a></h1>
    </div>
  </div>
</div>
@endsection
