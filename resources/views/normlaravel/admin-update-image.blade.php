<!DOCTYPE html>
<html lang="en">
<div class="">
@extends('layouts.headlines')

@section('page-title','Article Create')

@livewire('admin-nav-bars')


<!-- component -->
<!-- This is an example component -->
<div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
    <div class="flex flex-col items-center justify-center relative">
        <div id="partnerCard"class="bg-[#1c1c1c] text-gray-50 overflow-hidden rounded-md max-w-sm p-2 min-h-[500px] flex flex-col">
            <div class="grid grid-cols-4">
                <div class="p-4 pr-0 text-lg col-span-3">
                        <h4 class="font-bold">
                            Image Preview
                        </h4>
                </div>
            </div>
            <div class="flex items-center justify-center bg-[#2a2a2a] min-h-[200px]">
                <a class="flex items-center justify-center" href={partner.Link} target="_blank" rel="noreferrer noopener">                          
                	@foreach($artImage as $image)
                		<img src="{{ asset('files/'.$image->file) }}" alt="EasyCode"class="w-full object-cover"/>
                	@endforeach 
                </a>
            </div>
            <div class="mt-auto pl-4">
                <form name="add-articles" id="add-articles" method="POST" action="{{ route('admin-articles/updateImageProcess', ['id' => $id, 'artID' => $artID ]) }}" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                    <div class="px-6 py-4">
                        <div class="form-group">
                            <label for="article_featured_image">article_featured_image</label>
                            <input type="file" id="article_featured_image" name="article_featured_image" class="form-control" required="">
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

@extends('layouts.closing-tag')
</div>
</html>

