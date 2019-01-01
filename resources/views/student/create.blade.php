@extends('studentapp.layout')

@section('content')

@include('session.success')

<div class="card">
  <h5 class="card-header"> Add Student Record</h5>
  <div class="row">	
		<div class="col-sm-6">
			<div class="card-body">
			  	<form method="post" action="{{route('student.store')}}">
			  		{{ csrf_field() }}
				  	<div class="form-group">
					    <label>Student Name</label>
					    <input type="text" class="form-control" name="student_name" placeholder="Enter Student Name">
					 </div>
					 <div class="form-group">
					    <label>Student Email</label>
					    <input type="text" class="form-control" name="student_email" placeholder="Enter Student Email">
					 </div>
					 <div class="form-group">
					    <label>Student Roll</label>
					    <input type="text" class="form-control" name="student_roll" placeholder="Enter Student Roll">
					 </div>
					 <div class="form-group">
					    <label>Student Address</label>
					    <textarea class="form-control" placeholder="Enter Student Address" name="student_address"></textarea>
					 </div>

					 <button type="submit" class="btn btn-primary">Save</button>
			  		
				</form>

		  	</div>
		</div>
		<div class="col-sm-6">
		
		@if($errors->any())

			@foreach($errors->all() as $error)
				<li class="text-danger">{{$error}}</li> 
			@endforeach

		@endif

		</div>

  </div>	

</div>
	
@endsection