@if(session('success'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <strong>Well done!</strong> {{session('success')}}
			</div>
		</div>
	</div>
@elseif(session('error'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <strong>Error!</strong> {{session('error')}}
			</div>
		</div>
	</div>
@elseif(session('warning'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <strong>Warning!</strong> {{session('warning')}}
			</div>
		</div>
	</div>
@endif