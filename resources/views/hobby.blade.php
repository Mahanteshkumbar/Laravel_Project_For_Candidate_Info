@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Profile</div>
                <div class="panel-body"> 
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    {!! Form::open(['id'=>'register', 'url' => '/candidate/hobby']) !!}
                        <div class="form-group">
                            {!! Form::label('Hobby') !!}
                            {!! Form::text('hname', null, 
                                array('class'=>'form-control', 
                                      'placeholder'=>'hobby','id'=>'hname')) !!}
                        </div>                       
                        
                        <div class="form-group">
                            {!! Form::submit('Save!', 
                              array('class'=>'btn btn-primary','value'=>'Register')) !!}
                        </div>
                    {!! Form::close() !!}

                    <button class="btn btn-primary" id="getRequest">Get Request</button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <p id="getRequestData">{{$hobby_info}}</p>
            <p id="postRequestData"></p>            
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#getRequest').click(function(){
                $.get('getRequest',function(data){
                    $('#getRequestData').append(data);
                })
            })

            $('#register').submit(function(){
                var hname1 = $('#hname').val();
                console.log(hname1);

                $.post('hobby',{hname:hname1},function(data){
                    console.log(data); 
                    $('#postRequestData').html(data);
                })
            })

        })
    </script>
@endsection

