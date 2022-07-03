@extends('layouts.headlines')

@section('page-title','SOIS|Create Gate Sub Link')

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
		<form name="add-articles" id="add-articles" method="POST" action="{{route('admin-sub-links.store')}}">
		@csrf
		{{ csrf_field() }}
			<div class="px-6 py-4">
				<div class="form-group">
					<label for="sub_name">sub_name</label>
					<input type="text" id="sub_name" name="sub_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="sub_description">sub_description</label>
					<input type="text" id="sub_description" name="sub_description" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="sub_link">sub_link</label>
					<input type="text" id="sub_link" name="sub_link" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="sub_under_for">Sub under for:</label>
  					<select name="sub_under_for" id="sub_under_for" class="form-control" required="">
  					  <option hidden>Select SOIS Type</option>
  					  @foreach($soislinks as $links)
  					  	<option value="{{$links->sois_links_id}}">{{$links->link_name}}</option>
  					  @endforeach
  					</select>
				</div>
				<div class="form-group">
					<label for="role_id">Select Link for Role:</label>
  					<select name="role_id" id="role_id" class="form-control" required="">
  					  <option hidden>Select Link for Role</option>
  					  @foreach($roleList as $eoles)
  					  	<option value="{{$eoles->role_id}}">{{$eoles->role}}</option>
  					  @endforeach
  					</select>
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

