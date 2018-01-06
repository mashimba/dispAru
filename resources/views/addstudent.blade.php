@extends('layouts.master')

@section('logout')
	@include('includes.sessions')
@endsection
@section('maincontent')
<div class="panel panel-primary">
	<div class="panel-heading text-center panel-mod"><strong>Add student </strong></div>
	<div class="panel-body">
		{!! Form::open(['action'=>'PatientsController@store','method' => 'POST']) !!}
		    <div class="row">
		    	
		    	<div class="col-md-4">
		    		<div class="form-group">
			    		{{Form::label('first_name', 'First name')}}
			    		{{Form::text('first_name', '',['class' => 'form-control', 'required'])}}
			    	</div>
		    	</div>
		    	
		    	<div class="col-md-4">
		    		<div class="form-group">
			    		{{Form::label('middle_name', 'Middle name')}}
			    		{{Form::text('middle_name', '',['class' => 'form-control', 'required'])}}
			    	</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
			    		{{Form::label('last_name', 'Last name')}}
			    		{{Form::text('last_name', '',['class' => 'form-control', 'required'])}}
			    	</div>
		    	</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-6">
		    		<div class="form-group">
			    		{{Form::label('registration', 'Registration Number')}}
			    		{{Form::text('reg_no', '', ['class'=> 'form-control', 'placeholder' => 'eg 7601/t.2015', 'id'=>'reg_no_input', 'required'])}}	
		    		</div>
		    	</div>
				<div class="col-md-6">
					<div class="form-group">
						{{Form::label('cname','Course Name')}}
						{{Form::text('course_name', '', ['class'=>'form-control', 'required'])}}
					</div>
				</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-6">
		    		<div class="form-group">
		    			{{Form::label('nhif', 'NHIF Card Number')}}
		    			{{Form::text('nhif_card_no', '', ['class'=>'form-control', 'id' => 'nhif_input', 'required'])}}
		    		</div>
		    	</div>
		    	<div class="col-md-6">
		    		<div class="form-group">
		    			{{Form::label('file', 'File Number')}}
		    			{{Form::text('file_no', '', ['class'=>'form-control', 'id' => 'file_input', 'required'])}}
		    		</div>
		    	</div>
		    	<div class="col-md-6 col-md-offset-3">
		    		{{Form::submit('Add patient', ['class'=>'btn btn-primary btn-block'])}}
		    	</div>
		    </div>
		{!! Form::close() !!}		
	</div>
</div>
@endsection