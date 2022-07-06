@extends('layouts.headlines')

@section('page-title','SOIS | Edit System Assets')

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
			        <h2>Update News</h2>
			    </div>
            </div>

<div class="flex flex-wrap flex-row">
	@if(session('status'))
	  <div class="alert alert-success">
	      {{ session('status') }}
	  </div>
	@endif	
</div>


	<div class=" col-span-6 max-w-lg rounded overflow-hidden shadow-lg">
		<form name="add-articles" id="add-articles" method="post" action="{{ route('admin-system-assets-type.update', $sasset->asset_type_id ) }}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
			<div class="px-6 py-4">
				@foreach($selectedAsset as $selectAsset)
				<div class="form-group">
					<label for="type">Type :</label>
					<input type="text" id="type" name="type" placeholder= "{{$selectAsset->type}}" class="form-control" >
				</div>
				<div class="form-group">
					<label for="asset_type_description">Asset Type Description : </label>
					<input type="text" id="asset_type_description" name="asset_type_description" placeholder="{{$selectAsset->asset_type_description}}" class="form-control" >
				</div>
				@endforeach
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