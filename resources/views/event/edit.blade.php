@extends('event.layout.master')

@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/admin/calander') }}">Home</a></li>
			<li><a href="{{ route('event/list') }}">Events</a></li>
			<li class="active">Edit - {{ $event->title }}</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">

		<form action="{{ url('events/' . $event->id) }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT" />

			<div class="form-group @if($errors->has('doctor_name')) has-error has-feedback @endif">
				<label for="title">Doctor Name</label>
				<input type="text" class="form-control" name="doctor_name" id="name" placeholder="" readonly="readonly" value="{{$event->doctor_name}}">

				@if ($errors->has('doctor_name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('doctor_name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('doctor_id')) has-error has-feedback @endif">
				<label for="title">Doctor ID</label>
				<input type="text" class="form-control" name="doctor_id" id="id" placeholder="" readonly="readonly" value="{{$event->doctor_id}}">
				@if ($errors->has('doctor_id'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('doctor_id') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Time</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" placeholder="Select your time" value="{{ old('time') }}">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>
@endsection

@section('js')
<script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@endsection