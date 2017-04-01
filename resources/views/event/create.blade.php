@extends('event.layout.master')


@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/admin/calander') }}">Home</a></li>
			<li><a href="{{ route('event/list') }}">Events</a></li>
			<li class="active">Add new event</li>
		</ol>
	</div>
</div>

@include('message')

<div class="row">
	<div class="col-lg-6">
		
		<form action="{{ route('event/save') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group @if($errors->has('register_nb')) has-error has-feedback @endif">
				<label for="name">Enter Doctor register Number and Find Doctor</label>
				<input type="text" class="form-control" name="register_nb" id="search" placeholder="E.g 2345" value="{{ old('register_nb') }}">
				@if ($errors->has('register_nb'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('register_nb') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('doctor_name')) has-error has-feedback @endif">
				<label for="title">Doctor Name</label>
				<input type="text" class="form-control" name="doctor_name" id="name" placeholder="Doctor Name" readonly="readonly" value="{{ old('doctor_name') }}">
				@if ($errors->has('doctor_name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('doctor_name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('doctor_id')) has-error has-feedback @endif">
				<label for="title">Doctor ID</label>
				<input type="text" class="form-control" name="doctor_id" id="id" placeholder="Doctor Identity Number" readonly="readonly" value="{{ old('doctor_id') }}">
				@if ($errors->has('doctor_id'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('doctor_id') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('patient_token')) has-error @endif">
				<label for="time">Number Of Patient's Tokens</label>
				<div class="input-group">
					<select name="patient_token">
						<option value=""></option>
						<option value="50">50</option>
						<option value="60">60</option>
						<option value="70">70</option>
						<option value="80">80</option>
						<option value="90">90</option>
						<option value="100">100</option>
						<option value="110">110</option>
						<option value="120">120</option>
						<option value="130">130</option>
						<option value="140">140</option>
					</select>

				</div>
				@if ($errors->has('patient_token'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('patient_token') }}
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
		"minDate": moment('<?php echo date('Y-m-d G')?>'),
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

$('#search').on('keyup',function () {
	$value=$(this).val();
	$.ajax({
		method: 'GET',
		url: '{{URL::to('addDoctorShedule')}}',
		data: {search:$value},
		success:function (data) {
			console.log(data);
			$('#name').val("Dr" +" " +data.first_name + " " + data.last_name );
			$('#id').val(data.id);
		}
	});
})



</script>
@endsection
