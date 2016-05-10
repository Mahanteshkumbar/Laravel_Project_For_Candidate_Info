@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">  
<form action="" method="post" class="form-horizontal" role="form" data-parsley-validate>
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
</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection