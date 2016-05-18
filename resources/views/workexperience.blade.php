@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add new experience</div>
                <div class="panel-body"> 

                     @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    
                    {!! Form::open(['url'=>'candidate/experience']) !!}

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
                            {!! Form::submit('Add New!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Lists</h1>
             @foreach($experience_info as $exp)
                    <a  style="display:inline-block;padding:right:10px;" title="Click this to edit!" href="{{ url('/candidate/experience/'.$exp->id) }}"><i class="fa fa-pencil"></i></a>

                    <button type ="button" onclick="deleteExperience({{ $exp->id }})" id="Reco">Delete</button>

                   <!--  <a href="#" data-id="{!!$exp->id!!}" value="{!!$exp->id!!}" class="delete">Delete </a> -->

                    <p style="display:inline-block;padding:right:10px;">
                        {!! Form::open([
                        'method' => 'DELETE',
                        'id' => 'deleteProduct','url' => ['candidate/del/experience',$exp->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger deleteProduct','data-id' => $exp->id,'id' => 'btnDeleteProduct' ]) !!}
                    {!! Form::close() !!}
                    </p> 
                <p><b>Company Name:</b>{{$exp->Company_name}}</p> 
                <p><b>Start year:</b>{{$exp->Start_year}}</p>  
                <p><b>End year:</b> {{$exp->End_year}}</p> 
                <p><b>Designation:</b> {{$exp->Designation}}</p>  
                <p><b>Experience Summary:</b> {{$exp->Exp_summary}} </p>
                                     
            @endforeach   
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<script type="text/javascript">

function deleteExperience(id) {

     var url = 'del/experience'
        //var dataId = $('#btnDeleteProduct').attr('data-id');
         confirm("Press a button!");
        
        $.ajax({
            method: "DELETE",
            url: url + '/' + id,
            data: { "_token": "{{ csrf_token() }}" },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }

        });

}
   $('.deleteProduct').on('click',function(){
        //var dataId = $(this).data('ids');
        var url = 'candidate/del/experience'
        var dataId = $('#btnDeleteProduct').attr('data-id');
         confirm("Press a button!");
        
        $.ajax({
            method: "POST",
            url: url + '/' + dataId,
            data: inputData,
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }

        });
        return false;
    })
</script>
@endsection