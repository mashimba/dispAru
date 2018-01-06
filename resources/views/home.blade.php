@extends('layouts.master')

@section('logout')
   @include('includes.sessions')
@endsection

@section('maincontent')
<div class="panel panel-primary">
    <div class="panel-heading panel-mod text-center panel-mod">
        <strong>All students</strong>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-11" style="margin: 10px 15px;">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                    <input type="text" class="form-control" id="search" placeholder="Search here...">
                </div>
            </div>
        </div>
        <div id="table" class="table-responsive table-full-width">
            @if(count($patients) > 0)
            <table id="allPatients" class="table table-bordered table-striped table-hover">
                <thead>                 
                    <tr>
                        <th class="text-center">reg no</th>
                        <th class="text-center">first name</th>
                        <th class="text-center">middle name</th>
                        <th class="text-center">last name</th>
                        <th class="text-center">programme</th>
                        <th class="text-center">nhif card no</th>
                        <th class="text-center">file no</th>
                        <th class="text-center">action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($patients as $patient)
                        <tr>
                            <td class="text-center"> {{$patient->registration_number}} </td>
                            <td class="text-center"> {{$patient->first_name }} </td>
                            <td class="text-center"> {{$patient->middle_name }} </td>
                            <td class="text-center"> {{$patient->last_name }} </td>
                            <td class="text-center"> {{$patient->programme_name }} </td>
                            <td class="text-center"> {{$patient->nhif_card_no }} </td>
                            <td class="text-center"> {{$patient->file_number }} </td>
                            <td class="text-center"><a href="patients/{{$patient->id}}/edit" class="btn btn-default"  data-toggle="tooltip" data-placement="left" title="Tooltip on left">Edit</a></td>
                        </tr>
                    @endforeach
                    @elseif(count($patients) == 0)
                        <div class="alert alert-danger">
                            <p>No patients available</p>
                        </div>
                    @endif
                    
                </tbody>
            </table>
        </div>
        <div id="pagination">
            <ul class="pagination pull-right" style="margin: 0px;">
                {{ $patients->links()}}
            </ul>    
        </div>
        <div id="noResults">
            
        </div>
    </div>                            
</div>
@endsection
