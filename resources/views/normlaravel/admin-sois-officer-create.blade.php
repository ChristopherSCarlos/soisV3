@extends('layouts.headlines')

@section('page-title','SOIS|Add Officer')

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
        <form name="add-articles" id="add-articles" method="POST" action="{{route('admin-officers.store')}}">
        @csrf
        {{ csrf_field() }}
            <div class="px-6 py-4">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="suffix">Suffix</label>
                    <input type="text" id="suffix" name="suffix" class="form-control">
                </div>

                <div>
                    <label for="organization_id">{{ __('Organization') }}</label>
                    <select name="organization_id" id="organization_id" class="form-control block leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required="">
                    <!-- <option value="" selected hidden>Choose Organization</option> -->
                    <option hidden disabled selected>Choose Organization</option>
                        @foreach($getOrganization as $orgs)
                            <option value="{{$orgs->organization_id}}">{{$orgs->organization_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="position_title_id">{{ __('Position Title') }}</label>
                    <select name="position_title_id" id="position_title_id" class="form-control block leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required="">
                    <!-- <option value="" selected hidden>Choose Position Title</option> -->
                    <option hidden>Choose Position</option>
                        @foreach($getPositionTitles as $postitle)
                            <option value="{{$postitle->position_title_id}}">{{$postitle->position_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="term_end">Term End</label>
                    <input type="date" id="term_end" name="term_end" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="term_start">Term Start</label>
                    <input type="date" id="term_start" name="term_start" class="form-control" required="">
                </div>
               <!--  <div class="form-group">
                    <label for="officer_signature">Officer Signature</label>
                    <input type="file" id="officer_signature" name="officer_signature" class="form-control" required="">
                </div> -->
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