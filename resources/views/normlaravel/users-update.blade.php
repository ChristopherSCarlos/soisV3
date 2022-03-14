@extends('layouts.headlines')

@section('page-title','Update User')

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
		@csrf
		{{ csrf_field() }}
		@foreach($displayUserSelectedData as $user)
		<form name="add-users" id="add-users" method="post" action="{{ route('users.update', $user->user_id ) }}">
			@csrf
			@method('PUT')
			<div class="mt-4">
                <label for="first_name" >{{ __('First name') }} : {{$user->first_name}}</label>
				<input name="first_name" id="first_name" class="form-control block mt-1 w-full" type="text" autofocus >
			</div>
			<div class="mt-4">
                <label for="middle_name" value="">{{ __('Middle Name') }} : {{$user->middle_name}}</label>
                <input name="middle_name" id="middle_name" class="form-control block mt-1 w-full" type="text"  autofocus />
            </div>
            <div class="mt-4">
                <label for="last_name" value="">{{ __('last name') }} : {{$user->last_name}}</label>
                <input name="last_name" id="last_name" class="form-control block mt-1 w-full" type="text"  autofocus />
            </div>
            <div class="mt-4">
                <label for="email" value="">{{ __('email') }} : {{$user->email}}</label>
                <input name="email" id="email" class="form-control block mt-1 w-full" type="email"  autofocus />
            </div>
            <div class="mt-4">
                <label value="">{{ __('Course') }}</label>
                <select name="course_id" id="course_id"  class="form-control block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($displayCourseDromDBForUpdateSelect as $selectedCouse)
                                <option default value="{{$selectedCouse->course_id}}">{{$selectedCouse->course_name}}</option>
                            @endforeach
                            @foreach($displayCourseDromDB as $courses)
                                <option value="{{$courses->course_id}}">{{$courses->course_name}}</option>
                            @endforeach
                </select>
            </div>
            <div class="mt-4">
                <label value="">{{ __('Gender') }}</label>
                <select name="gender_id" id="gender_id"  class="form-control block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($displayGenderDromDBForUpdateSelect as $selectedGender)
                                <option default value="{{$selectedGender->gender_id}}">{{$selectedGender->gender}}</option>
                            @endforeach
                            @foreach($displayGenderDromDB as $genders)
                                <option value="{{$genders->gender_id}}">{{$genders->gender}}</option>
                            @endforeach
                </select>
            </div>
            <div class="mt-4">
                <label for="date_of_birth" value="">{{ __('Birth Date') }} : {!! htmlspecialchars_decode(date('j F Y', strtotime($user->date_of_birth))) !!}</label>
                <input name="model"  id="date_of_birth" class="form-control block mt-1 w-full" type="date"/>
            </div>
            <div class="mt-4">
                <label for="address" value="">{{ __('address') }} : {{$user->address}}</label>
                <input name="address" id="address" class="form-control block mt-1 w-full" type="text"  autofocus />
            </div>
            <div class="mt-4">
                <label for="mobile_number" value="">{{ __('Mobile Number') }} : {{$user->mobile_number}}</label>
                <input name="mobile_number" id="mobile_number" class="form-control block mt-1 w-full" type="text"  autofocus />
            </div>
            <div class="mt-4">
                <label for="student_number" value="">{{ __('student_number') }} : {{$user->student_number}}</label>
                <input name="student_number" id="student_number" class="form-control block mt-1 w-full" type="text"  autofocus />
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

