@extends('layouts.master')

@include('includes.modal')

@section('logout')
	@include('includes.sessions')
@endsection
@section('maincontent')
<div class="panel panel-primary">
	<div class="panel-heading text-center panel-mod"><strong>Edit student</strong></div>
	<div class="panel-body">
        {!! Form::open(['action'=>['PatientsController@update', $patient->id],'method' => 'POST']) !!}
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        {{Form::label('fname', 'First name')}}
                        {{Form::text('first_name', $patient->first_name, ['class' => 'form-control', 'required'])}}
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        {{Form::label('mname', 'Middle name')}}
                        {{Form::text('middle_name', $patient->middle_name,['class' => 'form-control', 'required'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{Form::label('lname', 'Last name')}}
                        {{Form::text('last_name', $patient->last_name,['class' => 'form-control', 'required'])}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('registration', 'Registration Number')}}
                        {{Form::text('reg_no', $patient->registration_number, ['class'=> 'form-control', 'placeholder' => 'eg 7601/t.2015', 'id'=>'reg_no_input', 'required'])}}   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('cname','Course Name')}}
                        {{Form::text('course_name', $patient->programme_name, ['class'=>'form-control', 'required'])}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('nhif', 'NHIF Card Number')}}
                        {{Form::text('nhif_card_no', $patient->nhif_card_no, ['class'=>'form-control', 'id' => 'nhif_input', 'required'])}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('file', 'File Number')}}
                        {{Form::text('file_no', $patient->file_number, ['class'=>'form-control', 'id' => 'file_input', 'required'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    {!! Form::hidden('_method', 'PUT')!!}
                    {{Form::submit('Save', ['class'=>'btn btn-success btn-block'])}}
                    
                </div>
                
                <div class="col-md-3">
                    <a href="../../home" title="Cancel" class="btn btn-primary btn-block">Cancel</a>
                </div>
        {!! Form::close() !!}
        
        {!! Form::open(['action' => ['PatientsController@destroy', $patient->id],'method' => 'POST']) !!}       
                <div class="col-md-3">
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-block', 'id' => 'btn-del', 'data-value' => $patient->id])!!}
                    
                </div>
            </div>
        {!! Form::close() !!}
        {{-- <form action="" method="POST"> --}}
            {{-- <div class="col-md-3">
                <button class="btn btn-danger btn-block" id="btn-del" data-value={{$patient->id}}>Delete</button>
            </div> --}}
        {{-- </form> --}}
            
        
	</div>
</div>
@endsection