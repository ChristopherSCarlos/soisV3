@extends('layouts.headlines')

@section('page-title','test')

@livewire('admin-nav-bars')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<style>
    .modal-backdrop {
      z-index: -1;
    }
</style>


<div class="py-12">
	<div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
	    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
			<div class="grid grid-cols-12">
			    <div class="col-span-12">
			        <h2>Create News</h2>
			    </div>
			    <div class="col-span-1">
					<x-jet-secondary-button class="m-2">
					    {{ __('Go Back') }}
					</x-jet-secondary-button>
			    </div>
            </div>

<div class="flex flex-wrap flex-row">
	@if(session('status'))
	  <div class="alert alert-success">
	      {{ session('status') }}
	  </div>
	@endif	
</div>


<div class="flex flex-col p-5">
	<div class="max-w-lg rounded overflow-hidden shadow-lg">
		<form name="add-articles" id="add-articles" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
		@csrf
		{{ csrf_field() }}
			<div class="px-6 py-4">
				<div class="form-group">
					<label for="first_name">first_name</label>
					<input type="text" id="first_name" name="first_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="last_name">last_name</label>
					<input type="text" id="last_name" name="last_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="middle_name">middle_name</label>
					<input type="text" id="middle_name" name="middle_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="date_of_birth">date_of_birth</label>
					<input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="mobile_number">mobile_number</label>
					<input type="number" id="mobile_number" name="mobile_number" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="address">address</label>
					<input type="text" id="address" name="address" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="email">email</label>
					<input type="email" id="email" name="email" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="password">password</label>
					<input type="password" id="password" name="password" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="student_number">student_number</label>
					<input type="text" id="student_number" name="student_number" class="form-control" required="">
				</div>
	  		</div>
	  		<div class="px-6 pt-4 pb-2">
				<button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" type="submit" class="btn btn-primary">Submit</button>
	  		</div>
		</form>
	</div>
</div>







        </div>
    </div>
</div>











@extends('layouts.closing-tag')

