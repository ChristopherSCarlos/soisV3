@extends('layouts.headlines')

@section('page-title','SOIS|Organization View')

@livewire('admin-nav-bars')

  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
    @foreach($displayOrganizationData as $orgData)
    	<div class="col-span-12">
		        <h2>Update {{$orgData->organization_name}}'s Data</h2>
    	</div>
    	<div class="col-span-1">
    		<a href="{{route('organizations')}}">
				<x-jet-button>
				    {{ __('Go Back') }}
				</x-jet-button>
			</a>
    	</div>
	@endforeach
</div>
<div class="grid grid-cols-12">
	<div class="col-span-3">
		<div class="max-w-sm rounded overflow-hidden shadow-lg">
			@foreach($displayOrganizationLogo as $imageData)
		  		<img width="w-full" src="{{ asset('/files/' . $imageData->file) }}"/>
			@endforeach
		  	<div class="px-6 py-4">
				@foreach($displayOrganizationData as $orgData)
		  	  	<div class="font-bold text-xl mb-2">{{$orgData->organization_name}}'s Logo</div>
		  	</div>
		  	<div class="px-6 pt-4 pb-2">
		  	 	<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
		  	 		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateLogo">
					    {{__('Update Logo')}}
					</button>
		  	 	</span>
		  	</div>
			@endforeach
		</div>
	</div>
	<div class="col-span-9">
		<div >
			@if($displayOrganizationBannerChecker != 0)
				@foreach($displayOrganizationBanner as $orgBanner)
				<div class="flex justify-center align-items" style="height:40%;">
					<img class="h-7" src="{{ asset('/files/' . $orgBanner->file) }}"/>
				</div>
				@endforeach
			@else
				<div class="flex justify-center align-items" style="height:40%;">
					<p>Image Not found</p>
				</div>
			@endif
		</div>
			@foreach($displayOrganizationData as $orgData)
		<div class="flex flex-col">
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Name:</p>
        			</div>
        			<div class="col-span-6">
        				<p>{{$orgData->organization_name}}</p>
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Acronym:</p>
        			</div>
        			<div class="col-span-6">
        				<p>{{$orgData->organization_acronym}}</p>
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Tagline:</p>
        			</div>
        			<div class="col-span-6">
        				<p>{{$orgData->organization_details}}</p>
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Type:</p>
        			</div>
        			<div class="col-span-6">
        				@foreach($displayOrganizationType as $orgType)
        					<p>{{$orgType->organization_type}}</p>
						@endforeach
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Slug:</p>
        			</div>
        			<div class="col-span-6">
        				<a href="{{ url($orgData->organization_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
        					<p>{{$orgData->organization_slug}}</p>
						</a>
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Primary Color:</p>
        			</div>
        			<div class="col-span-6">
        				<div class="h-20 w-full" style="background: {{$orgData->organization_primary_color}};"></div>
        			</div>
        		</div>
        		<div class="grid grid-cols-12">
        			<div class="col-span-6">
        				<p>Organization Secondary Color:</p>
        			</div>
        			<div class="col-span-6">
        				<div class="h-20 w-full" style="background: {{$orgData->organization_secondary_color}};"></div>
        			</div>
        		</div>
		</div>
		<div class="flex flex-col">
			<div class="flex flex-row">
				<a href="{{ route('organization.edit', $orgData->organization_id) }}">
					<x-jet-button >
					    {{__('Update')}}
					</x-jet-button>
			    </a>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateBanner">
				    {{__('Update Banner')}}
				</button>
			</div>
		</div>
			@endforeach
	</div>
</div>



<!--===================================================
=            Update Banner Section comment            =
====================================================-->
    <div class="modal fade" id="updateBanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @csrf
                {{ csrf_field() }}
                @foreach($displayOrganizationData as $orgData)
                    <form name="add-role" id="add-role" method="post" action="{{ route('organization/updateBanner', $orgData->organization_id ) }}" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change {{$orgData->organization_name}}'s Image Banner </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col p-5">
                                <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4">
										<x-jet-label for="Organization_banner" value="{{ __('organization logo') }}" />
										<x-jet-input name="organization_banner" id="organization_banner" class="form-control block mt-1 w-full" type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 btn btn-primary" type="button submit">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>


<!--====  End of Update Banner Section comment  ====-->


<!--=================================================
=            Update Logo Section comment            =
==================================================-->
    <div class="modal fade" id="updateLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @csrf
                {{ csrf_field() }}
                @foreach($displayOrganizationData as $orgData)
                    <form name="add-role" id="add-role" method="post" action="{{ route('organization/updateLogo', $orgData->organization_id ) }}" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change {{$orgData->organization_name}}'s Image Banner </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col p-5">
                                <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4">
										<x-jet-label for="Organization_logo" value="{{ __('organization logo') }}" />
										<x-jet-input name="organization_logo" id="organization_logo" class="form-control block mt-1 w-full" type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 btn btn-primary" type="button submit">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

<!--====  End of Update Logo Section comment  ====-->

<!--=========================================================
=            Delete Organization Section comment            =
==========================================================-->
    <div class="modal fade" id="deleteOrg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @csrf
                {{ csrf_field() }}
                @foreach($displayOrganizationData as $orgData)
                    <form name="add-role" id="add-role" method="post" action="{{ route('organization.destroy', $orgData->organization_id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change {{$orgData->organization_name}}'s Image Banner </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex flex-col p-5">
                                <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                	  {{ __('Are you sure you want to delete your page? Once your page is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your page.') }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 btn btn-primary" type="button submit">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>


<!--====  End of Delete Organization Section comment  ====-->


@extends('layouts.closing-tag')

