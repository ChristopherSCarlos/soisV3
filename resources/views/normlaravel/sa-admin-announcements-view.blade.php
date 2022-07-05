@extends('layouts.headlines')

@section('page-title','SOIS|View Announcement')

@livewire('admin-nav-bars')
<style>
table th, table td{
font-size:20px;
text-align: center;
}
tbody tr:nth-child(even) {
background: #eee;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<div class="py-12 pt-8">
    <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
			<div class="p-6">
			     <div class="flex items-center justify-center flex-col">
			        @foreach($announcement_data as $data)
			            <div>
			                <p class="text-4x1 text-bold">
			                	{{$data->announcement_title}}
			                </p>
			            </div>
			        <div>
			    		<p class="text-gray-700 text-base mb-4">
			    		  	<?php echo htmlspecialchars_decode(stripslashes($data->announcement_content));  ?>
			    		</p>
			        </div>
			        @endforeach
			     </div> 
			</div>
	        <hr>
			@foreach($announcement_data as $data)
	        	<div class="flex items-center justify-center align-items">
	        		<a href="{{ route('announcement.edit',$data->announcements_id) }}">
            	        <x-jet-button>
            	            {{__('Update Announcements')}}
            	        </x-jet-button>
            	    </a>
            	    <a href="{{ route('announcement/delete',$data->announcements_id) }}">
                        <x-jet-danger-button>
                            {{__('Delete')}}
                        </x-jet-danger-button>
                    </a>
	        	</div>
			@endforeach
        </div>
    </div>
</div>




@extends('layouts.closing-tag')

