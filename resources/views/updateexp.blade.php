@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body"> 
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    {!! Form::model($task, ['method' => 'put','url' => ['/candidate/experience', $task->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('Company name') !!}
                            {!! Form::text('Company_name', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Company_name')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Start year') !!}
                            {!! Form::date('Start_year', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Start_year')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('End year') !!}
                            {!! Form::date('End_year', \Carbon\Carbon::now(), 
                                array('class'=>'form-control', 
                                      'placeholder'=>'End_year')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Designation') !!}
                            {!! Form::text('Designation', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Designation')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Exp summary') !!}
                            {!! Form::textarea('Exp_summary', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'Exp_summary')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}
<!-- <form action="" method="post" class="form-horizontal" role="form" data-parsley-validate>
    <div class="form-group">
        <label class="control-label col-lg-2 col-sm-2" for="company">Company Name :</label>
        <div class="col-lg-6 col-sm-6">
            <input type="text" class="form-control" name="company" placeholder="Company Name" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="work-period">Working Period :</label>
        <div class="col-lg-3 col-sm-3">          
            <input type="text" class="form-control" name="start_year" placeholder="Start Year" required>
        </div>
        <div class="col-lg-3 col-sm-3">          
            <input type="text" class="form-control" name="end_year" placeholder="End Year" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="designation">Designation :</label>
        <div class="col-lg-6 col-sm-6">          
            <input type="text" class="form-control" name="designation" placeholder="Designation" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="yoe">Experience Summary :</label>
        <div class="col-lg-6 col-sm-6">          
            <textarea class="form-control" name="exp_sum" placeholder="Experience Summary" data-parsley-length="[20,500]"></textarea>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-6 col-lg-offset-2 col-lg-6">
            <button type="submit" id="save-work-history" class="btn btn-primary">Save</button>
            <button type="button" id="cancel-work-history" class="btn btn-danger">Cancel </button>
        </div>
    </div>
</form> -->
</div>
            </div>
        </div>
    </div>
</div>
@endsection