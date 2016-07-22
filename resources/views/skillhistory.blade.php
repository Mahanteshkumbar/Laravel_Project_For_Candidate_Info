@extends('layouts.app')
@section('content')
	<h1>Hobby History</h1>
	<h4>{{$logs}}</h4>

	   <!-- Teams Are Disabled Or User Is On Team -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-btn fa-fw fa-file-text-o"></i> Logs </div>

                <div class="panel-body">
                    <!-- {{$logs}} -->
                    @foreach($logs as $history )
                        <li>{{ $history->userResponsible()->name}} changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop