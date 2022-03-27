@extends('layouts.headlines')

@section('page-title','SOIS|Organization Creation')

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

<div class="grid grid-cols-12">
	<div class="col-span-6">
		@foreach($displayOrganizationData as $orgData)
			<p>name: {{$orgData->organization_name}}</p>
		@endforeach
	</div>
	<div class="col-span-6"></div>
</div>


<div class="py-12">
	<div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
	    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
			<div class="grid grid-cols-12">
			    @foreach($displayOrganizationData as $orgData)
			    	<div class="col-span-12">
					        <h2>Update {{$orgData->organization_name}}'s Data</h2>
			    	</div>
			    	<div class="col-span-1">
			    		<a href="{{route('organization.show', $orgData->organization_id)}}">
							<x-jet-button>
							    {{ __('Go Back') }}
							</x-jet-button>
						</a>
			    	</div>
				@endforeach
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
		@csrf
		{{ csrf_field() }}
			@foreach($displayOrganizationData as $orgData)
		<form name="edit-organization" id="edit-organization" method="POST" action="{{route('organization.update', $orgData->organization_id)}}">
		@csrf
		@method('PUT')
			<div class="px-6 py-4">
            	<div class="mt-4">
            	    <x-jet-label for="organization_name" value="{{ __('Organization name') }}: {{$orgData->organization_name}}" />
            	    <x-jet-input name="organization_name" id="organization_name" class="form-control block mt-1 w-full" type="text" />
            	</div>
            	<div class="mt-4">
            	    <x-jet-label for="organization_acronym" value="{{ __('Organization name') }}: {{$orgData->organization_acronym}}" />
            	    <x-jet-input name="organization_acronym" id="organization_acronym" class="form-control block mt-1 w-full" type="text" />
            	</div>
            	<div class="mt-4">
            	    <x-jet-label for="organization_details" value="{{ __('Organization details') }}: {{$orgData->organization_details}}" />
            	    <x-jet-input name="organization_details" id="organization_details" class="form-control block mt-1 w-full" type="text" />
            	</div>
            	<div class="mt-4">
            	    <select name="organization_type_id" class="form-control block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            	            <option default hidden>Choose Organization Type</option>
            	            <option value="1">Academic Organization</option>
            	            <option value="2">Non-Academic Organization</option>
            	    </select>
            	</div>
            	<div class="mt-4">
            	    <x-jet-label for="organization_primary_color" value="{{ __('organization primary color') }}: {{$orgData->organization_primary_color}}" />
            	    <x-jet-input name="organization_primary_color" id="organization_primary_color" class="form-control block mt-1 w-full" value="{{$orgData->organization_primary_color}}" type="color" />
            	</div>
            	<div class="mt-4">
            	    <x-jet-label for="organization_secondary_color" value="{{ __('organization secondary color') }}: {{$orgData->organization_secondary_color}}" />
            	    <x-jet-input name="organization_secondary_color" id="organization_secondary_color" class="form-control block mt-1 w-full" value="{{$orgData->organization_secondary_color}}" type="color" />
            	</div>
	  		</div>
	  		<div class="px-6 pt-4 pb-2">
				<button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" type="submit" class="btn btn-primary">Submit</button>
	  		</div>
		</form>
            @endforeach
	</div>
</div>







        </div>
    </div>
</div>











@extends('layouts.closing-tag')

