<div class="list-group">
    <a class="list-group-item active dissabled">
        <strong>Menu</strong>
    </a>
    <a href="/home" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span>  All student</a>
    <a href="/addstudent" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Add student</a>
</div>

<div class="well">
    <div class="row">
        <h2 class="text-center"><span class="glyphicon glyphicon-user" style="padding-right: 15px;">
        	@php
        		use App\Patient;
        		 $pat = Patient::all();
        		 $num = count($pat);
        	@endphp
        </span> {{ $num}}</h2>
        <h4 class="text-center">registered</h4>
    </div>
</div>
@include('includes.messages')