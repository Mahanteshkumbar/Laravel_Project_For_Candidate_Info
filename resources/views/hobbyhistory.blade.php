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
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @forelse ($logs as $log)
                            <div class="panel panel-default" v-repeat="log : logs">
                                <div class="panel-body" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $log->id }}" aria-expanded="false" aria-controls="collapseOne" class=" " >
                                        <i class="fa fa-btn fa-fw fa-bars"></i>
                                    </a>
                                    {{ $log->customMessage }}
                                    <span class="pull-right "> {{ $log->elapsed_time }} <i class="fa text-muted fa-clock-o"></i></span>
                                </div>
                                <div id="{{ $log->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>                                            	
	                                            @forelse ($log->customFields as $custom)
	                                                <tr>
	                                                    <td>{{ $custom }}</td>
	                                                </tr>
	                                            @empty
	                                                No details
	                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="panel panel-default" v-repeat="log : logs">
                                No logs
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop